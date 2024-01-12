<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreeRequest;
use App\Models\Tree;
use App\Services\HumanService;
use App\Services\HumanTreeService;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trees = Tree::all();
        return view('app.tree.index', [
            'trees' => $trees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.tree.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TreeRequest $request)
    {
        Tree::create($request->validated());
        return redirect()->route('trees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tree $tree)
    {
        return view('app.tree.show', compact('tree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tree $tree)
    {
        return view('app.tree.edit', compact('tree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TreeRequest $request, Tree $tree)
    {
        $tree->update($request->validated());
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
