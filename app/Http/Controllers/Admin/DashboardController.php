<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Projet;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projetsCount' => Projet::count(),
            'contactsCount' => Contact::count(),
            'experiencesCount' => Experience::count(),
            'formationsCount' => Formation::count(),
        ]);
    }

    /**
     * Résumé de toutes les tables (données BDD) avec liens liste + créer.
     */
    public function donnees()
    {
        $tables = [
            [
                'name' => 'projets',
                'label' => 'Projets',
                'count' => Projet::count(),
                'index' => route('admin.projets.index'),
                'create' => route('admin.projets.create'),
            ],
            [
                'name' => 'contacts',
                'label' => 'Contacts',
                'count' => Contact::count(),
                'index' => route('admin.contacts.index'),
                'create' => null,
            ],
            [
                'name' => 'experiences',
                'label' => 'Expériences',
                'count' => Experience::count(),
                'index' => route('admin.experiences.index'),
                'create' => route('admin.experiences.create'),
            ],
            [
                'name' => 'formations',
                'label' => 'Formations',
                'count' => Formation::count(),
                'index' => route('admin.formations.index'),
                'create' => route('admin.formations.create'),
            ],
        ];

        return view('admin.donnees', compact('tables'));
    }
}
