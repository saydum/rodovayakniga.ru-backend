@extends('app.layout')

@section('content')
    <div class="mb-4">
        <a href="{{ route("rods.create") }}" class="btn btn-outline-success">
            Добавить РОД
        </a>
    </div>

    <table class="table align-middle mb-0 bg-white table-hover">
        <thead class="bg-light">
        <tr>
            <th>Имя</th>
            <th class="text-end" >Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rods as $rod)

            <tr class="rounded m-3">
                <td>
                    {{ $rod->name }}
                </td>
                <td class="text-end">
                    <a href="{{ route("rods.show", $rod->id) }}" type="button"
                       class="btn btn-outline-primary btn-sm btn-rounded">
                        <i class="bi bi-eye"></i>
                    </a>

                    <a href="{{ route('rods.edit', $rod->id) }}" class="btn btn-outline-warning btn-sm btn-rounded">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
