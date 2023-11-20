<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodRequest;
use App\Models\Rod;

class RodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rods = Rod::all();
        return view('rod.index', [
            'rods' => $rods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rod.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RodRequest $request)
    {
        Rod::create($request->validated());
        return redirect()
                    ->route('rod.index')
                    ->with('success', 'Успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rod $rod)
    {
        return view('rod.show', [
            'rod' => $rod,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rod $rod)
    {
        return view('rod.edit', [
            'rod' => $rod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RodRequest $request, Rod $rod)
    {
        $rod->update($request->validated());
        return redirect()
            ->route('rod.index')
            ->with('success', 'Успешно обнавлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rod $rod)
    {
        $rod->delete();
        return redirect()
            ->route('rod.index')
            ->with('success', 'Успешно удален.');
    }
}
