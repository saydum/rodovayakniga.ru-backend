@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app-files/css/tree.css') }}">

    <div class="container container-tree">

        <div class="row">
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
                        @isset($treeLink->link)
                            <div class="mt-3">
                                <input type="text" hidden="hidden" id="copyText" class="form-control"
                                       value="https://rodovayakniga.ru/app/{{$human->id}}/{{$treeLink->link}}" readonly>
                            </div>
                        @endisset
                    </div>
                @endauth
            </div>
        </div>


        <div class="row">
            <div class="col">

                <div class="tree">
                    @isset($human)
                        @include('app.tree.show_info_modal', ['human' => $human])

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
                                        <p class=""> {{ $human->name. " " .  $human->o_name . " " . $human->f_name}}</p>
                                    </a>
                                </div>
                                {{-- E1--}}
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
                                                    <p>{{ $father->name . " " . $father->o_name . " " . $father->f_name }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($fatherGrandfather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                    href="javascript:void(0);"
                                                                    data-mdb-ripple-init
                                                                    data-mdb-modal-init
                                                                    data-mdb-target="#show-info-modal"
                                                                    onclick="getHumanByIdInShowModal({{ $fatherGrandfather }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandfather->image) }}"/>
                                                                <p>{{ $fatherGrandfather->name . " " . $fatherGrandfather->o_name . " " . $fatherGrandfather->f_name }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($fatherGrandmother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                    href="javascript:void(0);"
                                                                    data-mdb-ripple-init
                                                                    data-mdb-modal-init
                                                                    data-mdb-target="#show-info-modal"
                                                                    onclick="getHumanByIdInShowModal({{ $fatherGrandmother }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandmother->image) }}">
                                                                <p>{{ $fatherGrandmother->name . " " . $fatherGrandmother->o_name . " " . $fatherGrandmother->f_name }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    @isset($mather)
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                        href="javascript:void(0);"
                                                        data-mdb-ripple-init
                                                        data-mdb-modal-init
                                                        data-mdb-target="#show-info-modal"
                                                        onclick="getHumanByIdInShowModal({{ $mather }})"
                                                >
                                                    <img class="img-fluid" src="{{ asset($mather->image) }}">
                                                    <p>{{ $mather->name . " " . $mather->o_name . " " . $mather->f_name }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($matherGrandfather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                    href="javascript:void(0);"
                                                                    data-mdb-ripple-init
                                                                    data-mdb-modal-init
                                                                    data-mdb-target="#show-info-modal"
                                                                    onclick="getHumanByIdInShowModal({{ $matherGrandfather }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($matherGrandfather->image) }}">
                                                                <p>{{ $matherGrandfather->name . " " . $matherGrandfather->o_name . " " . $matherGrandfather->f_name }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($matherGrandmother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                    href="javascript:void(0);"
                                                                    data-mdb-ripple-init
                                                                    data-mdb-modal-init
                                                                    data-mdb-target="#show-info-modal"
                                                                    onclick="getHumanByIdInShowModal({{ $matherGrandmother }})"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($matherGrandmother->image) }}">
                                                                <p>{{ $matherGrandmother->name . " " . $matherGrandmother->o_name . " " . $matherGrandmother->f_name }}</p>
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

    @include('app.tree.show_info_modal')

    @include('app.tree.js')

@endsection
