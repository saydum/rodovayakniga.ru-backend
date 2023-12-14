@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app/css/tree.css') }}">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tree">

                    @include('layouts.embed.link-back')

                    @isset($im)
                        <ul>
                            <li>
                                {{-- 1 --}}
                                <div class="tree_card">
                                    <a href="{{ route('humans.show', $im->id) }}">
                                        <img class="img-fluid" src="{{ asset($im->image) }}">
                                        <p class=""> {{ $im->name. " " .  $im->o_name . " " . $im->f_name}}</p>
                                    </a>
                                </div>
                                @include('tree.modal')
                                {{-- E1--}}
                                <ul>
                                    @isset($father)
                                        <li>
                                            <div class="tree_card">
                                                <a href="{{ route('humans.show', $father->id) }}">
                                                    <img class="img-fluid" src="{{ asset($father->image) }}">
                                                    <p>{{ $father->name . " " . $father->o_name . " " . $father->f_name }}</p>
                                                </a>
                                            </div>
                                            <ul>
                                                @isset($fatherGrandfather)
                                                    <li>
                                                        <div class="tree_card">
                                                            <a href="{{ route('humans.show', $fatherGrandfather->id) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset($fatherGrandfather->image) }}"/>
                                                                <p>{{ $fatherGrandfather->name }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($fatherGrandmother)
                                                    <li>
                                                        <div class="tree_card">
                                                            <a href="{{ route('humans.show', $fatherGrandmother->id) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset($fatherGrandmother->image) }}">
                                                                <p>{{ $fatherGrandmother->name }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    @isset($mather)
                                        <li>
                                            <div class="tree_card">
                                                <a href="{{ route('humans.show', $mather->id) }}">
                                                    <img class="img-fluid" src="{{ asset($mather->image) }}">
                                                    <p>{{ $mather->name . " " . $mather->o_name . " " . $mather->f_name }}</p>
                                                </a>
                                            </div>
                                            <ul>
                                                @isset($matherGrandfather)
                                                    <li>
                                                        <div class="tree_card">
                                                            <a href="{{ route('humans.show', $matherGrandfather->id) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset($matherGrandfather->image) }}">
                                                                <p>{{ $matherGrandfather->name }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($matherGrandmother)
                                                    <li>
                                                        <div class="tree_card">
                                                            <a href="{{ route('humans.show', $matherGrandmother->id) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset($matherGrandmother->image) }}">
                                                                <p> {{ $matherGrandmother->name }}</p>
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
@endsection
