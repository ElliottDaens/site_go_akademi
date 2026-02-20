<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjetController as AdminProjetController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;

// Servir les assets Vite (build/) quand Herd/Valet ne les sert pas en statique
Route::get('/build/{path}', function (string $path) {
    $fullPath = public_path('build/' . $path);
    if (!File::exists($fullPath) || !File::isFile($fullPath)) {
        abort(404);
    }
    $mime = match (strtolower(File::extension($fullPath))) {
        'css' => 'text/css',
        'js' => 'application/javascript',
        'map' => 'application/json',
        default => File::mimeType($fullPath),
    };
    return response()->file($fullPath, ['Content-Type' => $mime]);
})->where('path', '.*');

// Routes de test des pages d'erreur custom
Route::get('/erreur-400', fn () => abort(400));
Route::get('/erreur-401', fn () => abort(401));
Route::get('/erreur-402', fn () => abort(402));
Route::get('/erreur-403', fn () => abort(403));
Route::get('/erreur-404', fn () => abort(404));
Route::get('/erreur-405', fn () => abort(405));
Route::get('/erreur-408', fn () => abort(408));
Route::get('/erreur-409', fn () => abort(409));
Route::get('/erreur-419', fn () => abort(419));
Route::get('/erreur-429', fn () => abort(429));
Route::get('/erreur-500', fn () => abort(500));
Route::get('/erreur-503', fn () => abort(503));

// Pages principales (front)
Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/projets', [PortfolioController::class, 'projets'])->name('projets');
Route::get('/cv', [PortfolioController::class, 'cv'])->name('cv');
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');

// Admin — Login (sans middleware)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Admin — Protégé, routes explicites style laravel-wmi-4
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/donnees', [DashboardController::class, 'donnees'])->name('donnees');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Projets
    Route::get('/projets', [AdminProjetController::class, 'index'])->name('projets.index');
    Route::get('/projets/afficher/{projet}', [AdminProjetController::class, 'show'])->name('projets.show');
    Route::get('/projets/ajouter', [AdminProjetController::class, 'create'])->name('projets.create');
    Route::post('/projets/ajouter', [AdminProjetController::class, 'store'])->name('projets.store');
    Route::get('/projets/modifier/{projet}', [AdminProjetController::class, 'edit'])->name('projets.edit');
    Route::put('/projets/modifier/{projet}', [AdminProjetController::class, 'update'])->name('projets.update');
    Route::get('/projets/supprimer/{projet}', [AdminProjetController::class, 'delete'])->name('projets.delete');
    Route::delete('/projets/supprimer/{projet}', [AdminProjetController::class, 'destroy'])->name('projets.destroy');

    // Contacts (index, afficher, supprimer uniquement)
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/afficher/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::get('/contacts/supprimer/{contact}', [AdminContactController::class, 'delete'])->name('contacts.delete');
    Route::delete('/contacts/supprimer/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Expériences
    Route::get('/experiences', [AdminExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/afficher/{experience}', [AdminExperienceController::class, 'show'])->name('experiences.show');
    Route::get('/experiences/ajouter', [AdminExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences/ajouter', [AdminExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/modifier/{experience}', [AdminExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/modifier/{experience}', [AdminExperienceController::class, 'update'])->name('experiences.update');
    Route::get('/experiences/supprimer/{experience}', [AdminExperienceController::class, 'delete'])->name('experiences.delete');
    Route::delete('/experiences/supprimer/{experience}', [AdminExperienceController::class, 'destroy'])->name('experiences.destroy');

    // Formations
    Route::get('/formations', [AdminFormationController::class, 'index'])->name('formations.index');
    Route::get('/formations/afficher/{formation}', [AdminFormationController::class, 'show'])->name('formations.show');
    Route::get('/formations/ajouter', [AdminFormationController::class, 'create'])->name('formations.create');
    Route::post('/formations/ajouter', [AdminFormationController::class, 'store'])->name('formations.store');
    Route::get('/formations/modifier/{formation}', [AdminFormationController::class, 'edit'])->name('formations.edit');
    Route::put('/formations/modifier/{formation}', [AdminFormationController::class, 'update'])->name('formations.update');
    Route::get('/formations/supprimer/{formation}', [AdminFormationController::class, 'delete'])->name('formations.delete');
    Route::delete('/formations/supprimer/{formation}', [AdminFormationController::class, 'destroy'])->name('formations.destroy');
});
