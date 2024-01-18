<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use App\Http\Requests\TreeRequest;
use App\Services\HumanService;
use App\Services\TreeService;

class TreeController extends Controller
{
    public function __construct(
        public readonly TreeService $treeService,
        public readonly HumanService $humanService,
    )
    {}

    public function index()
    {
        $trees = Tree::paginate(15);
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

    public function store(TreeRequest $request)
    {
        Tree::create($request->validated());
        return redirect()->route('trees.index');
    }

    public function show(Tree $tree)
    {
        $treeHumans = $tree->humans()->get();
        return view('components.crud.table', [
            'models' => $treeHumans,
            'title' => $this->treeService->title . " -> " . $this->humanService->title,
            'modelName' => $this->humanService->modelName,
        ]);
    }

    public function edit(Tree $tree)
    {
        return view('app.tree.edit', compact('tree'));
    }

    public function update(TreeRequest $request, Tree $tree)
    {
        $tree->update($request->validated());
        return redirect()->route('trees.index');
    }

    public function destroy(Tree $tree)
    {
        $tree->delete();
        return redirect()->route('trees.index');
    }
}
