<?php

namespace App\Http\Controllers\App;

use App\Models\Human;
use App\Traits\RedirectToIndex;
use App\Http\Controllers\Controller;
use App\Http\Requests\Human\HumanRequest;

class HumanController extends Controller
{
    use RedirectToIndex;
    private const string MAIN_ROUTE = 'rods.index';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.human.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.human.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HumanRequest $request)
    {
        Human::created($request->validated());
        return $this->redirect('humans.index', 'Успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        return view('app.human.show', compact('human'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human)
    {
        return view('app.human.update', compact('human'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HumanRequest $request, Human $human)
    {
        $human->update($request->validated());
        return $this->redirect('humans.index', 'Успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        $human->delete();
        return $this->redirect('humans.index', 'Успешно удален!');
    }
}
