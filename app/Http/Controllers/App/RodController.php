<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rod\RodRequest;
use App\Models\Rod;
use App\Traits\RedirectToIndex;

class RodController extends Controller
{
    use RedirectToIndex;

    private const string MAIN_ROUTE = 'rods.index';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.rod.index');
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
        Rod::created($request->validated());
        return $this->redirect(self::MAIN_ROUTE,'Успешно создан!');
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
        return $this->redirect(self::MAIN_ROUTE,'Успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rod $rod)
    {
        $rod->delete();
        return $this->redirect(self::MAIN_ROUTE,'Успешно удален!');
    }
}