<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Human;
use App\Services\Link\ShareLinkService;
use App\Services\RodovoeDrevo\RodovoeDrevoService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
        public RodovoeDrevoService $rodovoeDrevoService,
        public ShareLinkService $shareLinkService,
    ) {

    }

    public function show(Human $human)
    {
        /*
         * @TODO Проблема в быборге данных
         * Нужно корректно получить данные и вывести
        */
        /*
         * я
         * 1) $human->name
         *
         * Родители
         * 1) $human->father->name
         * 2) $human->mother->name
         *
         * Дедушка и Бабушка
         * 1) $human->father->father()->first()->name
         * 2) $human->father->mother()->first()->name
         *
         * 3) $human->mother->father()->first()->name
         * 4) $human->mother->mother()->first()->name
         *
         * Пра Дедушка и Бабушка
         *
         * */

        $father = $human->father;
        $mother = $human->mother;

        $fatherGrandFather = $father->father;
        $fatherGrandMother = $father->mother;


        $matherGrandFather = $mother->father;
        $matherGrandMother = $mother->mother;


        return view('app.rodovoe-drevo.index', [
            'human' => $human,

            'father' => $father,
            'mother' => $mother,

            'fatherGrandFather' =>  $fatherGrandFather,
            'fatherGrandMother' =>  $fatherGrandMother,

            'matherGrandFather' =>  $matherGrandFather,
            'matherGrandMother' =>  $matherGrandMother,

            'shareHuman' => $this->shareLinkService->get($human),
        ]);
    }

}
