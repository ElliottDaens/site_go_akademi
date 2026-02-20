<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::orderBy('ordre')->orderBy('date_debut', 'desc')->paginate(15);

        return view('admin.formations.index', compact('formations'));
    }

    public function create()
    {
        return view('admin.formations.create');
    }

    public function store(StoreFormationRequest $request)
    {
        $validated = $request->validated();
        $validated['ordre'] = $validated['ordre'] ?? 0;

        Formation::create($validated);

        return redirect()
            ->route('admin.formations.index')
            ->with('success', 'La formation a bien été ajoutée.');
    }

    public function show(Formation $formation)
    {
        return view('admin.formations.show', compact('formation'));
    }

    public function edit(Formation $formation)
    {
        return view('admin.formations.edit', compact('formation'));
    }

    public function update(StoreFormationRequest $request, Formation $formation)
    {
        $validated = $request->validated();
        $validated['ordre'] = $validated['ordre'] ?? 0;

        $formation->update($validated);

        return redirect()
            ->route('admin.formations.show', $formation)
            ->with('success', 'La formation a bien été modifiée.');
    }

    /**
     * Affiche la page de confirmation de suppression.
     */
    public function delete(Formation $formation)
    {
        return view('admin.formations.delete', compact('formation'));
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()
            ->route('admin.formations.index')
            ->with('success', 'La formation a bien été supprimée.');
    }
}
