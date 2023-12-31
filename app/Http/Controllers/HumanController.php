<?php

namespace App\Http\Controllers;

use App\Services\HumanService;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\HumanRequest;
use ErrorException;

class HumanController extends Controller
{
    use ImageUploadTrait;

    protected HumanService $humanService;

    /**
     * @param HumanService $humanService
     */
    public function __construct(
        HumanService $humanService,
    )
    {
        $this->humanService = $humanService;
        $this->middleware('auth');
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
//        $humans = $this->humanService->getById($id);
//
//        $mans = $humans->humans->where('gender', '=', 'man');
//        $womans = $humans->humans->where('gender', '=', 'woman');

        return view('human.add', [
//            'mans' => $mans,
//            'womans' => $womans,
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

        $mans = $humans->where('gender', '=', 'man');
        $womans = $humans->where('gender', '=', 'woman');

        $father = $human->father;
        $mather = $human->mather;


        return view('human.edit', [
            'human' => $human,
            'humans' => $humans,
            'father' => $father,
            'mather' => $mather,
            'mans' => $mans,
            'womans' => $womans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, HumanRequest $request)
    {
        $validatedData=$this->imageUpload($request);

        try {
            if ($validatedData['image']) {
                $this->humanService->update($id, $validatedData);
            } else {
                $this->humanService->update($id, $request->validated());
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
    public function destroy(int $id)
    {
        $this->humanService->delete($id);
        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно удален.');
    }
}
