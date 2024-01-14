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

    <form action="{{ route("humans.update", $human->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3 pt-4">
            <h5>И.О.Ф</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя"
                       value="{{ $human->name }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="o_name" placeholder="Отчество" aria-label="Отчество"
                       value="{{ $human->o_name }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="f_name" placeholder="Фамилия" aria-label="Фамилия"
                       value="{{ $human->f_name }}">
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
                    <input type="text" class="form-control" name="nationality" id="nationality"
                           value="{{ $human->nationality }}">
                </div>
            </div>
        </div>

        <div class="row g-3 pt-3">
            <div class="col mb-3">
                <label for="profile_photo">Фотография: {{ $human->image }}</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            {{--            <div class="col mb-3">--}}
            {{--                <label for="files">Сканы документов, Фотографии и т. д.</label>--}}
            {{--                <input type="file" class="form-control" name="files" id="files" multiple>--}}
            {{--            </div>--}}
        </div>

        <div class="row g-3 pt-3 pb-3">
            <div class="col">
                <label for="myeditorinstance">Биография</label>
                <textarea id="myeditorinstance" name="text" class="form-control">{{ $human->text }}</textarea>
            </div>
        </div>

        <div class="accordion card" id="accordionExample">

            <div class="row">
                <div class="py-4 text-center">
                    <p type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-arrow-down"></i>
                        <span class="text-success">Добавить остальные данные</span>
                        <i class="bi bi-arrow-down"></i>
                    </p>
                </div>
            </div>


            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="row g-3">
                        <div class="col">
                            <label for="location_birth" class="pb-1">Место рождения</label>
                            <input type="text" class="form-control" name="location_birth" id="location_birth"
                                   value="{{ $human->location_birth }}">
                        </div>
                        <div class="col">
                            <label for="data_birth" class="pb-1">Дата рождения</label>
                            <input type="date" class="form-control" name="data_birth" id="data_birth">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="height" class="pb-1">Рост</label>
                            <input type="number" class="form-control" name="height" id="height"
                                   value="{{ $human->height }}">
                        </div>
                        <div class="col">
                            <label for="eye_color" class="pb-1">Цвет глаз</label>
                            <input type="text" class="form-control" name="eye_color" id="eye_color"
                                   value="{{ $human->eye_color }}">
                        </div>
                        <div class="col">
                            <label for="hair_color" class="pb-1">Цвет волос</label>
                            <input type="text" class="form-control" name="hair_color" id="hair_color"
                                   value="{{ $human->hair_color }}">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-success mt-4">Изменить</button>
    </form>

    @include('app.components.head.tinymce-config')
@endsection
