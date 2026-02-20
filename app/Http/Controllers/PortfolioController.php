<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Projet;
use App\Http\Requests\StoreContactRequest;

class PortfolioController extends Controller
{
    public function home()
    {
        $projets_preview = Projet::where('visible', true)->orderBy('ordre')->orderBy('id', 'desc')->take(3)->get();
        $projets_count = Projet::where('visible', true)->count();

        return view('home', compact('projets_preview', 'projets_count'));
    }

    public function about()
    {
        $experiences = Experience::orderBy('ordre')->orderBy('date_debut', 'desc')->get();
        $formations = Formation::orderBy('ordre')->orderBy('date_debut', 'desc')->get();

        return view('about', compact('experiences', 'formations'));
    }

    public function projets()
    {
        $projets = Projet::where('visible', true)->orderBy('ordre')->orderBy('id', 'desc')->get();

        return view('projets', compact('projets'));
    }

    public function cv()
    {
        $experiences = Experience::orderBy('ordre')->orderBy('date_debut', 'desc')->get();
        $formations = Formation::orderBy('ordre')->orderBy('date_debut', 'desc')->get();

        return view('cv', compact('experiences', 'formations'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(StoreContactRequest $request)
    {
        $validated = $request->validated();
        Contact::create($validated);

        return redirect()->route('contact')->with('success',
            'Merci ' . $validated['name'] . ' ! Votre message a bien été envoyé. Je vous répondrai rapidement.');
    }
}
