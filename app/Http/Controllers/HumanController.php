<?php

namespace App\Http\Controllers;

use App\Http\Requests\HumanRequest;
use App\Models\Human;
use App\Models\Rod;
use Illuminate\Support\Facades\Storage;


class HumanController extends Controller
{
    public function index()
    {
        $humans = Human::all();
        return view('human.index', compact('humans'));
    }

    public function show(Human $human)
    {
        return view('human.show', compact('human'));
    }

    public function create()
    {
        $humans = Human::all();

        $womans = $humans->where('gender', '=', 'woman');
        $mans = $humans->where('gender', '=', 'man');

        $rods = Rod::all();
        return view('human.add', [
            'rods' => $rods,
            'mans' => $mans,
            'womans' => $womans,
        ]);
    }

    public function store(HumanRequest $request)
    {
        $input = $request->validated();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $human = Human::create($input);
        $human->father_id = $request->input('father_id');
        $human->mather_id = $request->input('mather_id');
        $human->save();

        return redirect()->route('humans.index')->with('success', 'Успешно добавлен.');
    }

    public function edit(Human $human)
    {
        $humans = Human::all();

        $father = $humans->where('father_id', '=', $human->father_id);
        $mather = $humans->where('mather_id', '=', $human->mather_id);

        $womans = $humans->where('gender', '=', 'woman');
        $mans = $humans->where('gender', '=', 'man');


        $rods = Rod::all();

        return view('human.edit', [
            'human' => $human,
            'rods' => $rods,
            'mans' => $mans,
            'womans' => $womans,
            'father' => $father,
            'mather' => $mather,
        ]);
    }
    public function update(Human $human, HumanRequest $request)
    {
        $input = $request->validated();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $human->update($input);
        return redirect()->route('humans.index')->with('success', 'Успешно обнавлен.');
    }
    public function destroy(Human $human)
    {
        if($human->image){
            Storage::delete('public/images/' . $human->image);
        }
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'Успешно удалено.');
    }
}
