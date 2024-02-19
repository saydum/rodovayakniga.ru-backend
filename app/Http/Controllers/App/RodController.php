<?php

namespace App\Http\Controllers\App;

use App\Models\Rod;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rod\RodRequest;

class RodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rods = Auth::user()->rods;

        return view('app.rod.index', [
            'rods' => $rods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.rod.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RodRequest $request)
    {
        Rod::create($request->validated());
        return redirect()->route('rods.index')->with('Успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rod $rod)
    {
        $rodHumans = $rod->humans()->get();
        return view('app.human.index', [
            'humans' => $rodHumans
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rod $rod)
    {
        return view('app.rod.edit', compact('rod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RodRequest $request, Rod $rod)
    {
        $rod->update($request->validated());
        return redirect()->route('rods.index')->with('Успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rod $rod)
    {
        $rod->delete();
        return redirect()->route('rods.index')->with('Успешно удален!');
    }
}
