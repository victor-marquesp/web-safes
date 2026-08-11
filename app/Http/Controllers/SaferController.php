<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Safer;
use Illuminate\Http\Request;

class SaferController extends Controller {

    public function index() {
        
        $safers = Safer::all();

        return view('safer.index', compact('safers'));
    }

    public function create()
    {
        $animals = Animal::all();

        return view('safer.create', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Safer $safer)
    {
        return view('safer.show', compact('safer'));
    }

    public function edit(Safer $safer)
    {
        return view('safer.edit', compact('safer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Safer $safer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Safer $safer)
    {
        //
    }
}
