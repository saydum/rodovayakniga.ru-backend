<?php

namespace App\Http\Controllers;

use App\Models\Rod;
use App\Http\Requests\RodRequest;
use App\Services\HumanService;
use App\Services\TreeService;

class RodController extends Controller
{
    public function __construct(
        public readonly TreeService $treeService,
        public readonly HumanService $humanService,
    )
    {}

    public function index()
    {
        $trees = Rod::paginate(15);
        return view('components.crud.table', [
            'models' => $trees,
            'title' => $this->treeService->title,
            'modelName' => $this->treeService->modelName,
            'actionButtons' => $this->treeService->actionButtons,
        ]);
    }

    public function create()
    {
        return view('app.tree.add', [
            'title' => $this->treeService->title,
            'modelName' => $this->treeService->modelName,
        ]);
    }

    public function store(RodRequest $request)
    {
        Rod::create($request->validated());
        return redirect()->route('trees.index');
    }

    public function show(Rod $tree)
    {
        $treeHumans = $tree->humans()->get();
        return view('app.human.index', [
            'humans' => $treeHumans,
        ]);
    }

    public function edit(Rod $tree)
    {
        return view('app.tree.edit', compact('tree'));
    }

    public function update(RodRequest $request, Rod $tree)
    {
        $tree->update($request->validated());
        return redirect()->route('trees.index');
    }

    public function destroy(Rod $tree)
    {
        $tree->delete();
        return redirect()->route('trees.index');
    }
}
