<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Controllers\Controller;
use App\Models\Link;

class LinkManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        return view('app.link.index', [
            'links' => $links,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('app.link.show', [
            'link' => $link,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('Успешно удален!');
    }
}
