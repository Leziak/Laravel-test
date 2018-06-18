<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Hero;
use \App\Emergency;

class HeroController extends Controller
{

    public function index()
    {
        $heroes = Hero::orderBy('name', 'asc')->get();

        $view = view('hero/index');

        $view->heroes = $heroes;

        return $view;
    }

    public function show($hero_slug)
    {
        $hero = Hero::where('slug', $hero_slug)->first();

        if (!$hero) {
            abort(404, 'Hero not found');
        }

        $view = view('hero/show');
        $view->hero = $hero;
        return $view;
    }

    public function store(Request $request)
    {
        $emergency = Emergency::create([
        "hero_id" => null,
        "user_id" => $request->null,
        "subject" => $request->input('subject'),
        "description" => $request->input('description')
    ]);

        return redirect()->back();
    }

}
