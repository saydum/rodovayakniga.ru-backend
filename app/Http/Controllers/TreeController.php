<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use App\Http\Requests\TreeRequest;

class TreeController extends Controller
{
    public function __construct
    (
        public readonly string $title = "РОДовое древо",
        public readonly string $modelName = "trees",
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trees = Tree::paginate(15);
        return view('components.crud.table', [
            'models' => $trees,
            'title' => $this->title,
            'modelName' => $this->modelName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.crud.add', [
            'title' => $this->title,
            'modelName' => $this->modelName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'title' => $this->title,
            'modelName' => $this->modelName,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tree $tree)
    {
        return view('components.crud.show', [
            'model' => $tree,
            'title' => $this->title,
            'modelName' => $this->modelName,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tree $model)
    {
        return view('components.crud.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TreeRequest $request, Tree $model)
    {
        $model->update($request->validated());
        return redirect()->route('trees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tree $tree)
    {
        $tree->delete();
        return redirect()->route('trees.index');
    }
}
