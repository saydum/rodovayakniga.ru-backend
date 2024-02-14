@extends('app.layout')

@section('content')

    <x-errors/>

    <form
        action="{{ route("humans.store") }}"
        method="POST"
        enctype="multipart/form-data"
        class="p-2"
    >
        @csrf

        <div class="row g-3 pt-4">
            <h5>Имя Отчество Фамилия</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="surname" placeholder="Отчество" aria-label="Отчество">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" aria-label="Фамилия">
            </div>
        </div>

        <div class="row g-3 pt-4">

            <div class="col">
                <label class="pb-1">РОДовое Древо</label>
                <select class="form-select" aria-label="РОДовое Древо" name="rod_id">
                    <option value="" selected>Не выбран</option>
                    @foreach ($rods as $rod)
                        <option value="{{ $rod->id }}">{{ $rod->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="location_birth" class="pb-1">Место рождения</label>
                <input type="text" class="form-control" name="location_birth" id="location_birth">
            </div>
            <div class="col">
                <label for="data_birth" class="pb-1">Дата рождения</label>
                <input type="date" class="form-control" name="data_birth" id="data_birth">
            </div>
        </div>

        {{-- Связь --}}
        <div class="row g-3 pt-4">

            @isset($mans)
                <div class="col">
                    <label>Отец</label>
                    <select class="form-select" aria-label="РОД" name="father_id">
                        <option value="0" selected>Не выбран</option>
                        @foreach($mans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->surname . " " . $human->lastname}}</option>
                        @endforeach
                    </select>
                </div>
            @endisset

            @isset($womans)
                <div class="col">
                    <label>Мать</label>
                    <select class="form-select" aria-label="РОД" name="mather_id">
                        <option value="0" selected>не выбран</option>
                        @foreach($womans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->surname . " " . $human->lastname}}</option>
                        @endforeach
                    </select>
                </div>
            @endisset
        </div>

        <div class="row g-3 pt-4">

            <div class="col mb-3">
                <label for="location_birth" class="pb-1">Пол</label>
                <select class="form-select" aria-label="Пол" name="gender">
                    <option value="" selected>Не выбран</option>
                    <option value="man">Мужской</option>
                    <option value="woman">Женский</option>
                </select>
            </div>

            <div class="col mb-3">
                <div class="col">
                    <label for="nationality" class="pb-1">Национальность</label>
                    <input type="text" class="form-control" name="nationality" id="nationality">
                </div>
            </div>
        </div>

        <div class="row g-3 pt-3">
            <div class="col-3 mb-3">
                <label for="profile_photo">Фотография</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Добавить</button>
    </form>
@endsection
