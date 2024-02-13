<?php

namespace App\Http\Controllers\App;

use App\Models\Rod;
use App\Actions\User\AuthUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rod\RodRequest;

class RodController extends Controller
{
    private const string MAIN_ROUTE = 'rods.index';

    /**
     * Display a listing of the resource.
     */
    public function index(AuthUser $user)
    {

        $rods = $user->handle()->rods;

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
        return redirect()->route(self::MAIN_ROUTE)->with('Успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rod $rod)
    {
        return view('app.rod.show', compact('rod'));
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
        return redirect()->route(self::MAIN_ROUTE)->with('Успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rod $rod)
    {
        $rod->delete();
        return redirect()->route(self::MAIN_ROUTE)->with('Успешно удален!');
    }
}
