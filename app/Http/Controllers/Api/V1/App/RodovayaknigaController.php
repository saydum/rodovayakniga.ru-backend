<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rodovayakniga\RodovayaknigaRequest;
use App\Models\Rodovayakniga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class RodovayaknigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
//        $rods = Auth::user()->rods;
        $rods = Rodovayakniga::all();
        return response()->json($rods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RodovayaknigaRequest $request): RedirectResponse
    {
        Rodovayakniga::create($request->validated());
        return redirect()
            ->route('rods.index')
            ->with('Успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rodovayakniga $rod): JsonResponse
    {
//        $rodHumans = $rod->with('humans')->simplePaginate(25);
        return response()->json($rod);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RodovayaknigaRequest $request, Rodovayakniga $rod)
    {
        $rod->update($request->validated());
        return redirect()->route('rods.index')->with('Успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rodovayakniga $rod)
    {
        $rod->delete();
        return redirect()->route('rods.index')->with('Успешно удален!');
    }
}
