<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('ordre')->orderBy('date_debut', 'desc')->paginate(15);

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(StoreExperienceRequest $request)
    {
        $validated = $request->validated();
        $validated['en_cours'] = $request->boolean('en_cours');
        $validated['ordre'] = $validated['ordre'] ?? 0;

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'L\'expérience a bien été ajoutée.');
    }

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(StoreExperienceRequest $request, Experience $experience)
    {
        $validated = $request->validated();
        $validated['en_cours'] = $request->boolean('en_cours');
        $validated['ordre'] = $validated['ordre'] ?? 0;

        $experience->update($validated);

        return redirect()
            ->route('admin.experiences.show', $experience)
            ->with('success', 'L\'expérience a bien été modifiée.');
    }

    /**
     * Affiche la page de confirmation de suppression.
     */
    public function delete(Experience $experience)
    {
        return view('admin.experiences.delete', compact('experience'));
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'L\'expérience a bien été supprimée.');
    }
}
