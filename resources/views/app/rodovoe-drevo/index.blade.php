@extends('app.layout')

@section('title', 'РОДовое Древо ' . $human->name)

@section('content')
    @include('app.rodovoe-drevo.js.copy-link')


    <div class="pb-3">
        <x-go-back-btn routeName="humans.index"/>
    </div>

    <link rel="stylesheet" href="{{ asset('app-files/css/tree.css') }}">

    <div class="container container-tree">

        <div class="row justify-content-center">
            <div class="col">
                @auth()

                    <div class="row justify-content-end">
                        <div class="col-sm-2 float-end">
                            <div class="position-absolute notif" id="liveAlertPlaceholder"></div>
                        </div>
                    </div>

                    <div class="copyLink">
                        <button id="copyButton" class="btn btn-outline-success float-end">
                            <i class="bi bi-copy"></i>
                        </button>
                            <div class="mt-3">
                                @isset($shareHuman)
                                <input type="text" hidden="hidden" id="copyText" class="form-control"
                                       value="https://rodovayakniga.ru/rodovoe-drevo/{{ $human->id }}/{{ $shareHuman->link }}"
                                       readonly>
                                @endisset
                            </div>
                    </div>
                @endauth
            </div>
        </div>


        <div class="row">
            <div class="col">

                <div class="tree">
                    @isset($human)
                        @include('app.rodovoe-drevo.js.show-model', ['human' => $human])

                        <ul class="tree_ul">
                            <li class="tree_li">
                                {{-- 1 --}}
                                <div class="tree_card">
                                    <a
                                        href="javascript:void(0);"
                                        data-mdb-ripple-init
                                        data-mdb-modal-init
                                        data-mdb-target="#show-info-modal"
                                        onclick="getHumanByIdInShowModal({{ $human }})"
                                    >
                                        <img class="img-fluid" src="{{ asset($human->image) }}">
                                        <p class=""> {{ $human->name. " " .  $human->surname . " " . $human->lastname}}</p>
                                    </a>
                                </div>
                                {{-- Отец--}}
                                <ul class="tree_ul">
                                    @isset($father)
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    href="javascript:void(0);"
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                    onclick="getHumanByIdInShowModal({{ $father }})"
                                                >
                                                    <img class="img-fluid" src="{{ asset($father->image) }}">
                                                    <p>{{ $father->name . " " . $father->surname . " " . $father->lastname }}</p>

                                                </a>
                                            </div>

                                            <ul class="tree_ul">
                                                @isset($fatherGrandFather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="javascript:void(0);"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                                onclick="getHumanByIdInShowModal({{ $fatherGrandFather }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandFather->image) }}"/>
                                                                <p>{{ $fatherGrandFather->name . " " . $fatherGrandFather->surname . " " . $fatherGrandFather->lastname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset

                                                @isset($fatherGrandMother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="javascript:void(0);"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                                onclick="getHumanByIdInShowModal({{ $fatherGrandMother }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandMother->image) }}">
                                                                <p>{{ $fatherGrandMother->name . " " . $fatherGrandMother->surname . " " . $fatherGrandMother->lastname }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    {{--Мать    --}}
                                    @isset($mother)
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    href="javascript:void(0);"
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                    onclick="getHumanByIdInShowModal({{ $mother }})"
                                                >
                                                    <img class="img-fluid" src="{{ asset($mother->image) }}">
                                                    <p>{{ $mother->name . " " . $mother->surname . " " . $mother->lastname }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($matherGrandFather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="javascript:void(0);"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                                onclick="getHumanByIdInShowModal({{ $matherGrandFather }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($matherGrandFather->image) }}">
                                                                <p>{{ $matherGrandFather->name . " " . $matherGrandFather->surname . " " . $matherGrandFather->lastname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($matherGrandMother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="javascript:void(0);"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                                onclick="getHumanByIdInShowModal({{ $matherGrandMother }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($matherGrandMother->image) }}">
                                                                <p>{{ $matherGrandMother->name . " " . $matherGrandMother->surname . " " . $matherGrandMother->lastname }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset
                                </ul>
                            </li>
                        </ul>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    @include('app.rodovoe-drevo.modal')

@endsection
