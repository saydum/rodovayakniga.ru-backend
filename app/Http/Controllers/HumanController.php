<?php

namespace App\Http\Controllers;

use App\Http\Requests\HumanRequest;
use App\Services\HumanService;
use App\Services\RodService;

class HumanController extends Controller
{
    protected HumanService $humanService;
    protected RodService $rodService;

    /**
     * @param HumanService $humanService
     * @param RodService $rodService
     */
    public function __construct(
        HumanService $humanService,
        RodService $rodService,
    )
    {
        $this->humanService = $humanService;
        $this->rodService = $rodService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humans = $this->humanService->getAll();
        return view('human.index', [
            'humans' => $humans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $humans = $this->humanService->getAll();

        $womans = $humans->where('gender', '=', 'woman');
        $mans = $humans->where('gender', '=', 'man');

        $rods = $this->rodService->getAll();

        return view('human.add', [
            'rods' => $rods,
            'mans' => $mans,
            'womans' => $womans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HumanRequest $request)
    {
        $this->humanService->create($request->validated());
        return redirect()
                    ->route('humans.index')
                    ->with('success', 'Успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $human = $this->humanService->getById($id);
        return view('human.show', [
            'human' => $human,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $humans = $this->humanService->getAll();
        $human = $this->humanService->getById($id);

        $womans = $humans->where('gender', '=', 'woman');
        $mans = $humans->where('gender', '=', 'man');

        $father = $human->father;
        $mother = $human->mother;

        $rods = $this->rodService->getAll();

        return view('human.edit', [
            'human' => $human,
            'mans' => $mans,
            'womans' => $womans,
            'father' => $father,
            'mother' => $mother,
            'rods' => $rods,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, HumanRequest $request)
    {
        $this->humanService->update($id, $request->validated());
        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно обнавлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->humanService->delete($id);
        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно удален.');
    }
}
