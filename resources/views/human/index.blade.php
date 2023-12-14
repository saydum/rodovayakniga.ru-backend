@extends('layouts.app')

@section('content')
    <div class="mb-4">
        @isset($rod)
        <a href="{{ route("rod.humans.add", $rod->id) }}" class="btn btn-success">
            Добавить человека
        </a>
        @endisset
    </div>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Имя Отчество Фамилия</th>
            <th>РОД</th>
            <th>Национальность</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($humans as $human)

            <tr class="rounded hover-shadow m-3">
                <td>
                    <div class="d-flex align-items-center">
                        <img
                            src="{{ asset($human->image) }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                        />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">
                                {{ $human->name . " " . $human->f_name . " " . $human->o_name}}
                            </p>
                            <p class="text-muted mb-0">Дата рождения: {{ $human->data_birth }}</p>
                            <p class="text-muted mb-0">Поколение: {{ $human->generation }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    @if(isset($human->rod->name))
                        <p class="fw-normal mb-1">{{ $human->rod->name }}</p>
                    @endif
                </td>
                <td>
                    {{ $human->nationality }}
                </td>
                <td>
                    <a href="{{ route("humans.show", $human->id) }}" type="button" class="btn btn-outline-success btn-sm btn-rounded">
                        Открыть
                    </a>

                    <a href="{{ route('humans.edit', $human->id) }}" class="btn btn-outline-warning btn-sm btn-rounded">
                        Изменить
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
