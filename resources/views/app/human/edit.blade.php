@extends('app.layout')

@section('title', 'Изменить ' . $human->name)

@section('content')

    <x-errors/>

    <div class="pb-3">
        <x-go-back-btn routeName="humans.index"/>
    </div>

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
                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя"
                       value="{{ $human->name }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="surname" placeholder="Отчество" aria-label="Отчество"
                       value="{{ $human->surname }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" aria-label="Фамилия"
                       value="{{ $human->lastname }}">
            </div>
        </div>

        <div class="row g-3 pt-4">

            <div class="col">
                <label class="pb-1">РОДовое Древо</label>
                <select class="form-select" aria-label="РОДовое Древо" name="rod_id">
                    @isset($rod)
                        <option value="{{ $rod->id }}">{{ $rod->name }}</option>
                    @else
                        <option value="" selected>Не выбран</option>
                        @foreach ($rods as $rod)
                            <option value="{{ $rod->id }}">{{ $rod->name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>

            <div class="col">
                <label for="location_birth" class="pb-1">Место рождения</label>
                <input type="text" class="form-control" name="location_birth" id="location_birth"
                       value="{{ $human->location_birth }}">
            </div>
            <div class="col">
                <label for="data_birth" class="pb-1">Дата рождения</label>
                <input type="date" class="form-control" name="data_birth" id="data_birth"
                       value="{{ $human->date_birth }}">
            </div>
        </div>

        {{-- Связь --}}
        <div class="row g-3 pt-4">

            <div class="col mb-3">
                <label>Отец</label>
                <select class="form-select" aria-label="Отец" name="father_id">
                    @if($human->father)
                        <option value="{{ $human->father->id }}" selected>
                            {{ $human->father->name . " " . $human->father->surname . " " . $human->father->lastname }}
                        </option>
                    @else
                        <option value="">
                            Не выбран
                        </option>
                    @endif

                    @foreach($humans as $human)
                        <option
                            value="{{ $human->id }}">{{ $human->name . " " . $human->surname . " " . $human->lastname}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label>Мать</label>
                <select class="form-select" aria-label="Мать" name="mather_id">
                    @if($human->mather)
                        <option value="{{ $human->mather->id }}" selected>
                            {{ $human->mather->name . " " . $human->mather->surname . " " . $human->mather->lastname }}
                        </option>
                    @else
                        <option value="">
                            Не выбран
                        </option>
                    @endif

                    @foreach($humans as $human)
                        <option
                            value="{{ $human->id }}">{{ $human->name . " " . $human->surname . " " . $human->lastname}}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row g-3 pt-3">

            <div class="col mb-3">
                <div class="col">
                    <label for="nationality">Национальность</label>
                    <input type="text" class="form-control" name="nationality" id="nationality"
                           value="{{ $human->nationality }}">
                </div>
            </div>

            <div class="col mb-3">
                <label for="profile_photo">Фотография</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="col mb-3">
                <label>Видимость в глобальном поиске</label>
                <select class="form-select" name="global_search" aria-label="Открыть доступ к глобальному поиску">
                    {{--@TODO нужно вставить деф значение--}}
                    <option value="0">Закрыт</option>
                    <option value="1">Открыть</option>
                </select>
            </div>

        </div>

        <button type="submit" class="btn btn-success mt-4">Изменить</button>
    </form>
@endsection
