@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app/css/tree.css') }}">

    <div class="container">
        <div class="row">
            <div class="tree">
                <ul>
                    <li>
                        <a href="#">
                            <img src="{{ asset($human->image) }}">
                            <span>{{ $human->name }}</span>
                        </a>

                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ asset($human->father->image) }}">
                                    <span>{{ $human->father->name }}</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset($humans->find($human->father->id)->father->image) }}">
                                            <span>
                                                {{ $humans->find($human->father->id)->father->name }}
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            @isset($humans->find($human->father->id)->mather->image)
                                                <img src="{{ asset($humans->find($human->father->id)->mather->image) }}">
                                            @endisset
                                            <span>
                                                {{ $humans->find($human->father->id)->mather->name }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset($human->mather->image) }}">
                                    <span>{{ $human->mather->name }}</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset($humans->find($human->mather->id)->father->image) }}">
                                            <span>{{ $humans->find($human->mather->id)->father->name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset($humans->find($human->mather->id)->mather->image) }}">
                                            <span> {{ $humans->find($human->mather->id)->mather->name }}</span>
                                        </a>
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="images/7.jpg">--}}
{{--                                                    <span>Hello</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="images/7.jpg">--}}
{{--                                                    <span>Hey</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
