@extends('app.layout')

@section('content')
    <div class="mb-4">
        <a href="{{ route("humans.create") }}" class="btn btn-outline-success">
            Добавить человека
        </a>
    </div>

    @if(count($humans) !== 0)
        <table class="table align-middle mb-0 bg-white table-hover">
            <thead class="bg-light">
            <tr>
                <th>Имя Отчество Фамилия</th>
                <th>Национальность</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($humans as $human)

                <tr class="rounded m-3">
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
                                <p class="text-muted mb-0">Дата рождения: {{ date('d.m.Y', strtotime($human->data_birth)) }}</p>
                                <p class="text-muted mb-0">Поколение: {{ $human->generation }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $human->nationality }}
                    </td>
                    <td>
                        <a href="{{ route("humans.show", $human->id) }}" type="button" class="btn btn-outline-primary btn-sm btn-rounded">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('humans.edit', $human->id) }}" class="btn btn-outline-warning btn-sm btn-rounded">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <a href="{{ route('rodovoe-drevo.show', $human->id) }}" class="btn btn-success btn-sm btn-rounded">
                            <i class="bi bi-arrows-fullscreen"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection
