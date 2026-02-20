<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::orderBy('ordre')->orderBy('id', 'desc')->paginate(15);

        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        return view('admin.projets.create');
    }

    public function store(StoreProjetRequest $request)
    {
        $validated = $request->validated();
        $validated['visible'] = $request->boolean('visible');
        $validated['ordre'] = $validated['ordre'] ?? 0;

        Projet::create($validated);

        return redirect()
            ->route('admin.projets.index')
            ->with('success', 'Le projet a bien été ajouté.');
    }

    public function show(Projet $projet)
    {
        return view('admin.projets.show', compact('projet'));
    }

    public function edit(Projet $projet)
    {
        return view('admin.projets.edit', compact('projet'));
    }

    public function update(StoreProjetRequest $request, Projet $projet)
    {
        $validated = $request->validated();
        $validated['visible'] = $request->boolean('visible');
        $validated['ordre'] = $validated['ordre'] ?? 0;

        $projet->update($validated);

        return redirect()
            ->route('admin.projets.show', $projet)
            ->with('success', 'Le projet a bien été modifié.');
    }

    /**
     * Affiche la page de confirmation de suppression.
     */
    public function delete(Projet $projet)
    {
        return view('admin.projets.delete', compact('projet'));
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();

        return redirect()
            ->route('admin.projets.index')
            ->with('success', 'Le projet a bien été supprimé.');
    }
}
