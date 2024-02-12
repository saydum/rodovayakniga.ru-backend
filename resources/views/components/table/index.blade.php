@extends('layouts.app')

@section('content')

    <x-table.header routeName="index.humans">
        Добавить человека
    </x-table.header>

    @if(count($humans) !== 0)
        <table class="table align-middle mb-0 bg-white table-hover">
            <thead class="bg-light">
                <x-table.tr>
                    <x-table.th>Заголовоок</x-table.th>
                </x-table.tr>
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

                        <a href="{{ route('rod-humans.tree', $human->id) }}" class="btn btn-success btn-sm btn-rounded">
                            <i class="bi bi-arrows-fullscreen"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection
