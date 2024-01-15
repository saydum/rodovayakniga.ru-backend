<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use App\Http\Requests\TreeRequest;
use App\Services\TreeService;

class TreeController extends Controller
{
    public function __construct(
        public readonly TreeService $treeService
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
        return view('components.crud.add', [
            'title' => $this->treeService->title,
            'modelName' => $this->treeService->modelName,
        ]);
    }

    public function store(TreeRequest $request)
    {
        Tree::create($request->validated());
        return redirect()->route('trees.index');
    }

    public function showHumans(Tree $tree)
    {
        $treeHumans = $tree->humans()->get();
        return view('components.crud.show', [
            'model' => $treeHumans,
            'title' => $this->treeService->title,
            'modelName' => $this->treeService->modelName,
        ]);
    }

    public function show(Tree $tree)
    {
        return view('components.crud.show', [
            'model' => $tree,
            'title' => $this->treeService->title,
            'modelName' => $this->treeService->modelName,
        ]);
    }

    public function edit(Tree $model)
    {
        return view('components.crud.edit', compact('model'));
    }

    public function update(TreeRequest $request, Tree $model)
    {
        $model->update($request->validated());
        return redirect()->route('trees.index');
    }

    public function destroy(Tree $tree)
    {
        $tree->delete();
        return redirect()->route('trees.index');
    }
}
