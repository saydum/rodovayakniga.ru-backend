@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app/css/tree.css') }}">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tree">
                    @isset($im)
                        <ul>
                            <li>
                                {{-- 1 --}}
                                <a href="#">
                                    <img src="{{ asset($im->image) }}">
                                    <span> {{ $im->name. " " .  $im->o_name . " " . $im->f_name}}</span>
                                </a>
                                {{-- E1--}}
                                <ul>
                                    @isset($father)
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset($father->image) }}">
                                                <span>{{ $father->name . " " . $father->o_name . " " . $father->f_name }}</span>
                                            </a>
                                            <ul>
                                                @isset($fatherGrandfather)
                                                    <li>
                                                        <a href="#">
                                                            <img
                                                                src="{{ asset($fatherGrandfather->image) }}"/>
                                                            <span>{{ $fatherGrandfather->name }}</span>
                                                        </a>
                                                    </li>
                                                @endisset
                                                @isset($fatherGrandmother)
                                                    <li>
                                                        <a href="#">
                                                            <img
                                                                src="{{ asset($fatherGrandmother->image) }}">
                                                            <span>{{ $fatherGrandmother->name }}</span>
                                                        </a>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    @isset($mather)
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset($mather->image) }}">
                                                <span>{{ $mather->name . " " . $mather->o_name . " " . $mather->f_name }}</span>
                                            </a>
                                            <ul>
                                                @isset($matherGrandfather)
                                                    <li>
                                                        <a href="#">
                                                            <img
                                                                src="{{ asset($matherGrandfather->image) }}">
                                                            <span>{{ $matherGrandfather->name }}</span>
                                                        </a>
                                                    </li>
                                                @endisset
                                                @isset($matherGrandmother)
                                                    <li>
                                                        <a href="#">
                                                            <img
                                                                src="{{ asset($matherGrandmother->image) }}">
                                                            <span> {{ $matherGrandmother->name }}</span>
                                                        </a>
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
