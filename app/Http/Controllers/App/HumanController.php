<?php

namespace App\Http\Controllers\App;

use App\Models\Rod;
use App\Models\Human;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Human\HumanRequest;

class HumanController extends Controller
{
    use ImageUploadTrait;
    private const string MAIN_ROUTE = 'rods.index';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humans = Human::all();
        return view('app.human.index', [
            'humans' => $humans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Rod $rod = null)
    {
        $rods = Rod::with('user')->get();
        return view('app.human.add', [
            'rod' => $rod,
            'rods' => $rods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HumanRequest $request)
    {
        $validateData = $this->imageUpload($request);

        Human::created($validateData);

        return redirect()->route('humans.index')->with('Успешно создан!');
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
        return redirect()->route('humans.index')->with('Успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        $human->delete();
        return redirect()->route('humans.index')->with('Успешно удален!');
    }
}
