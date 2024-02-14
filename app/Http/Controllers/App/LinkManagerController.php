<?php

namespace App\Http\Controllers\App;

use App\Models\Link;
use App\Http\Controllers\Controller;

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
