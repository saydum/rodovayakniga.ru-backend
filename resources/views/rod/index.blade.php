@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <div class="mb-4">
            <a href="{{ route("rod.create") }}" class="btn btn-success">Добавить</a>
        </div>
        <thead>
        <tr>
            <th>РОД</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rods as $rod)
            <tr>
                <td>{{ $rod->name }}</td>
                <td class="text-center d-flex justify-content-end">
                    <a href="{{ route("rod.humans.index", $rod->id) }}"
                       class="btn btn-outline-success btn-sm btn-rounded" style="margin-right: 5px">
                        Открыть
                    </a>

                    <a href="{{ route("rod.humans.tree", $rod->id) }}"
                       class="btn btn-success btn-sm btn-rounded">
                        Древа РОДа
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
