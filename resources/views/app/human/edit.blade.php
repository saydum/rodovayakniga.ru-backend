@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route("humans.update", $human->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="p-2"
    >
        @csrf
        @method('PUT')

        <div class="row g-3 pt-4">
            <h5>Имя Отчество Фамилия</h5>
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Имя"
                    aria-label="Имя"
                    value="{{ $human->name }}">
            </div>
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    name="o_name"
                    placeholder="Отчество"
                    aria-label="Отчество"
                    value="{{ $human->o_name }}">
            </div>
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    name="f_name"
                    placeholder="Фамилия"
                    aria-label="Фамилия"
                    value="{{ $human->f_name }}">
            </div>
        </div>

        <div class="row g-3 pt-4">

            <div class="col">
                <label>РОДовое Древо</label>
                <select class="form-select" aria-label="РОДовое Древо" name="tree_id">
                    <option value="" selected>Не выбран</option>
                    @foreach ($trees as $tree)
                        <option value="{{ $tree->id }}">{{ $tree->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="location_birth" class="pb-1">Место рождения</label>
                <input
                    type="text"
                    class="form-control"
                    name="location_birth"
                    id="location_birth"
                    value="{{ $human->location_birth }}"
                >
            </div>
            <div class="col">
                <label for="data_birth" class="pb-1">Дата рождения</label>
                <input
                    type="date"
                    class="form-control"
                    name="data_birth"
                    id="data_birth"
                    value="{{ $human->data_birth }}"
                >
            </div>
        </div>

        {{-- Связь --}}
        <div class="row g-3 pt-4">

            <div class="col mb-3">
                <label>Отец</label>
                <select class="form-select" aria-label="Отец" name="father_id">
                    @if($father)
                        <option value="{{ $father->id }}" selected>
                            {{ $father->name . " " . $father->o_name . " " . $father->f_name }}
                        </option>
                    @else
                        <option value="">
                            Не выбран
                        </option>
                    @endif

                    @foreach($humans as $human)
                        <option
                            value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label>Мать</label>
                <select class="form-select" aria-label="Мать" name="mather_id">
                    @if($mather)
                        <option value="{{ $mather->id }}" selected>
                            {{ $mather->name . " " . $mather->o_name . " " . $mather->f_name }}
                        </option>
                    @else
                        <option value="">
                            Не выбран
                        </option>
                    @endif

                    @foreach($humans as $human)
                        <option
                            value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row g-3 pt-4">
            <div class="col mb-3">
                <label for="location_birth" class="pb-1">Пол</label>
                <select class="form-select" aria-label="Пол" name="gender">
                    <option value="{{ $human->gender }}" selected>{{ $human->gender }}</option>
                    <option value="man">Мужской</option>
                    <option value="woman">Женский</option>
                </select>
            </div>

            <div class="col mb-3">
                <label>Поколения</label>
                <select id="generation" class="form-select" aria-label="Поколения" name="generation">
                    @foreach($generations as $key => $generation)
                        <option value="{{ $generation }}" @selected(old('generation') == $generation)>
                            {{ $generation }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <div class="col">
                    <label for="nationality" class="pb-1">Национальность</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nationality"
                        id="nationality"
                        value="{{ $human->nationality }}"
                    >
                </div>
            </div>
        </div>

        <div class="row g-3 pt-3">
            <div class="col-4 mb-3">
                <label for="profile_photo">Фотография</label>
                <input type="file" class="form-control" name="image" id="image">
                @empty(!$human->image)
                    <img src="{{ asset($human->image) }}" width="120" height="120" alt="{{ $human->name }}">
                @endempty
            </div>
        </div>

        <div class="row g-3 pt-3 pb-3">
            <div class="col">
                <label for="myeditorinstance">
                    Биография
                </label>
                <textarea id="myeditorinstance" name="text" class="form-control">{{ $human->text }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Добавить</button>
    </form>

    @include('components.head.tinymce-config')
@endsection
