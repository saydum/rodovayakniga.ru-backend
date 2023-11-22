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
                    <a href="{{ route("rod.show", $rod->id) }}"
                       class="btn btn-outline-success">
                        Открыть
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
