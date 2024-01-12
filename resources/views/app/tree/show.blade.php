@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-hover">
        <thead>
            <tr>Name</tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $tree->name }}</td>
            </tr>
        </tbody>
    </table>

    <div class="row p-2">
        <div class="col nav">
            <a href="{{ route('trees.edit', $tree->id) }}" class="btn btn-outline-primary nav-item m-1">Изменить</a>
            <form method="POST" action="{{ route("trees.destroy", $tree->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger m-1">
                    <i class="bi bi-trash3"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
