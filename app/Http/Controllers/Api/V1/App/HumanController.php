<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Human\HumanRequest;
use App\Models\Human;
use App\Models\Rodovayakniga;
use App\Traits\ImageUpload;
use ErrorException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HumanController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humans = Human::simplePaginate(25);
        return view('app.human.index', [
            'humans' => $humans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Rodovayakniga|null $rod
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(Rodovayakniga $rod = null)
    {
        $rods = Auth::user()->rods;

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

        Human::create($validateData);

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
        /*@TODO РОДственики видны всем!*/
        $rods = Auth::user()->rods;
        $humans = Human::all();

        return view('app.human.edit', [
            'rods' => $rods,
            'human' => $human,
            'humans' => $humans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HumanRequest $request, Human $human)
    {
        /*@TODO 1) Вывести в отдельный Exception  2) Вывести логику в сервис класс*/
        $validatedData = $this->imageUpload($request);
        try {
            if ($validatedData) {
                $human->update($validatedData);
            } else {
                $human->update($request->validated());
            }
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно обнавлен.');
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
