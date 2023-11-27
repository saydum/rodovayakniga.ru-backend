<?php

namespace App\Http\Controllers;

use App\Services\RodService;
use App\Services\HumanService;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\HumanRequest;

class HumanController extends Controller
{
    use ImageUploadTrait;

    protected RodService $rodService;
    protected HumanService $humanService;

    /**
     * @param RodService $rodService
     * @param HumanService $humanService
     */
    public function __construct(
        RodService $rodService,
        HumanService $humanService,
    )
    {
        $this->rodService = $rodService;
        $this->humanService = $humanService;
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
        $rods = $this->rodService->getAll();
        $humans = $this->humanService->getAll();

        $mans = $humans->where('gender', '=', 'man');
        $womans = $humans->where('gender', '=', 'woman');

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
        $validatedData = $this->imageUpload($request);
        $this->humanService->create($validatedData);

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

//        $womans = $humans->where('gender', '=', 'woman');
//        $mans = $humans->where('gender', '=', 'man');

        $father = $human->father;
        $mather = $human->mather;

        $rods = $this->rodService->getAll();

        return view('human.edit', [
            'human' => $human,
            'humans' => $humans,
            'father' => $father,
            'mather' => $mather,
            'rods' => $rods,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, HumanRequest $request)
    {
        if ($request->input('image') !== null) {
            $validatedData = $this->imageUpload($request);
            $this->humanService->update($id, $validatedData);
        } else {
            $this->humanService->update($id, $request->validated());
        }

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
