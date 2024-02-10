<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Services\HumanService;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\HumanRequest;
use App\Models\HumanTreeJoin;
use App\Models\Rod;
use ErrorException;

class HumanController extends Controller
{
    use ImageUploadTrait;

    protected HumanService $humanService;

    public function __construct(
        HumanService $humanService,
    )
    {
        $this->humanService = $humanService;
        $this->middleware('auth');
    }

    public function index()
    {
        $humans = $this->humanService->getAll();
        return view('app.human.index', [
            'humans' => $humans,
        ]);
    }

    public function create(Rod $tree = null)
    {
//        $humans = $this->humanService->getById($id);
//
//        $mans = $humans->humans->where('gender', '=', 'man');
//        $womans = $humans->humans->where('gender', '=', 'woman');

        $trees = Rod::all();

        return view('app.human.add', [
            'tree' => $tree,
            'trees' => $trees,
//            'mans' => $mans,
//            'womans' => $womans,
        ]);
    }

    public function store(HumanRequest $request)
    {
        $validatedData = $this->imageUpload($request);
        $human = $this->humanService->create($validatedData);

//        HumanTreeJoin::create([
//            'human_id' => $human->id,
//            'tree_id' => $request->input('tree_id'),
//        ]);

        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно создан.');
    }

    public function show(Human $human)
    {
        return view('app.human.show', [
            'human' => $human,
        ]);
    }

    public function edit(Human $human)
    {

        $humans = $this->humanService->getAll();
        $human = $this->humanService->getById($human->id);

        $mans = $humans->where('gender', '=', 'man');
        $womans = $humans->where('gender', '=', 'woman');

        $father = $human->father;
        $mather = $human->mather;

        $generations = [
            0 => $human->generation,
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16
        ];

        $trees = Rod::all();

        return view('app.human.edit', [
            'human' => $human,
            'humans' => $humans,
            'father' => $father,
            'mather' => $mather,
            'mans' => $mans,
            'womans' => $womans,
            'generations' => $generations,
            'trees' => $trees,
        ]);
    }

    public function update(int $id, HumanRequest $request)
    {
        $validatedData = $this->imageUpload($request);
        try {
            if ($validatedData) {
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

    public function destroy(int $id)
    {
        $this->humanService->delete($id);
        return redirect()
            ->route('humans.index')
            ->with('success', 'Успешно удален.');
    }
}
