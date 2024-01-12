@extends('layouts.app')

@section('content')
    <div class="card-title mt-3 d-flex ">
        <h3 class="flex-grow-1">РОДовое Дрвео</h3>
        <a class="btn btn-success flex-grow-0" href="{{ route("trees.create") }}">
            Добавить
        </a>
    </div>

    @if(count($trees) !== 0)
        <table class="table align-middle mb-0 bg-white table-hover">
            <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($trees as $tree)
                    <tr class="rounded m-3">
                        <td>
                            {{ $tree->id }}
                        </td>
                        <td>
                            {{ $tree->name }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route("trees.show", $tree->id) }}" type="button"
                               class="btn btn-outline-primary btn-sm btn-rounded">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('trees.edit', $tree->id) }}"
                               class="btn btn-outline-warning btn-sm btn-rounded">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
