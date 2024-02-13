<?php

namespace App\Http\Controllers\App;

use App\Models\Rod;
use App\Models\Human;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Actions\User\AuthUserAction;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Human\HumanRequest;
use Illuminate\Contracts\Foundation\Application;

use ErrorException;

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
     * @param Rod|null $rod
     * @param AuthUserAction $authUserAction
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(Rod $rod = null, AuthUserAction $authUserAction)
    {
        $rods = $authUserAction->handle()->rods;

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
    public function edit(Human $human, AuthUserAction $authUserAction)
    {
        /*@TODO 1) Вывести логику в сервис класс*/
        $rods = $authUserAction->handle()->rods;
        $humans = Human::all();

        $generations = [
            0 => $human->generation,
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16
        ];

        return view('app.human.edit', [
            'rods' => $rods,
            'human' => $human,
            'humans' => $humans,
            'generations' => $generations
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
