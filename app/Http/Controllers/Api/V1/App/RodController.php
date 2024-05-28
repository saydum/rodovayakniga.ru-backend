<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rod\RodRequest;
use App\Models\Rod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class RodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
//        $rods = Auth::user()->rods;
        $rods = Rod::all();
        return response()->json($rods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RodRequest $request): RedirectResponse
    {
        Rod::create($request->validated());
        return redirect()
            ->route('rods.index')
            ->with('Успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rod $rod): JsonResponse
    {
//        $rodHumans = $rod->with('humans')->simplePaginate(25);
        return response()->json($rod);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RodRequest $request, Rod $rod)
    {
        $rod->update($request->validated());
        return redirect()->route('rods.index')->with('Успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rod $rod)
    {
        $rod->delete();
        return redirect()->route('rods.index')->with('Успешно удален!');
    }
}
