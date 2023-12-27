@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('app-files/css/tree.css') }}">

    <div class="container">

        <div class="row float-end">
            <div class="col-sm-2 p-3">
                <div class="position-absolute" id="liveAlertPlaceholder"></div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tree">

                    @auth()
                        @include('layouts.embed.link-back')
                        <button id="copyButton" class="btn btn-outline-success float-end">
                            <i class="bi bi-copy"></i>
                        </button>
                        <div class="mt-3">
                            <input type="text" hidden="hidden" id="copyText" class="form-control" value="http://127.0.0.1:8000/app/{{$im->id}}/{{$treeLink}}" readonly>
                        </div>
                    @endauth

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

            const appendAlert = (message, type) => {
                const wrapper = document.createElement('div');
                wrapper.innerHTML = `
                <div class="alert alert-${type} alert-dismissible" role="alert">
                    <div>${message}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
                alertPlaceholder.innerHTML = ''; // Очищаем содержимое placeholder'а перед добавлением нового сообщения
                alertPlaceholder.append(wrapper);
            };

            const alertTrigger = document.getElementById('copyButton');
            if (alertTrigger) {
                alertTrigger.addEventListener('click', () => {
                    const copyText = document.getElementById('copyText');
                    copyText.select();

                    try {
                        const successful = document.execCommand('copy');
                        const message = successful ? 'Успешно скопировано' : 'Не удалось скопировать';
                        appendAlert(message, successful ? 'success' : 'danger');
                        copyTextFunc();
                    } catch (err) {
                        appendAlert('Ошибка при копировании', 'danger');
                    }
                });
            }

            function copyTextFunc() {
                const input = document.getElementById('copyText');
                input.select();

                navigator.clipboard.writeText(input.value)
                    .then(() => {
                    })
                    .catch(err => {
                        console.error('Ошибка копирования: ', err);
                    });
            }
        });
    </script>
@endsection
