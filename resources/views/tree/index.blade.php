@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app/css/tree.css') }}">

    <div class="container">
        <div class="row">
            <div class="tree">
                <ul>
                    <li>
                        <a href="#">
                            <img src="{{ $human->image }}">
                            <span>{{ $human->name }}</span>
                        </a>

                        <ul>
                            <li>
                                <a href="#">
                                    <img src="images/2.jpg">
                                    <span>{{ $human->father->name }}</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="images/3.jpg">
                                            <span>
                                                {{ $humans->find($human->father->id)->father->name }}
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/4.jpg"><span>
                                                {{ $humans->find($human->father->id)->mather->name }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/5.jpg">
                                    <span>{{ $human->mather->name }}</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#"><img src="images/6.jpg">
                                            <span>{{ $humans->find($human->mather->id)->father->name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="images/7.jpg">
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
