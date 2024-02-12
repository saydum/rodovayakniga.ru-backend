@extends('layouts.app')

@section('content')
    <x-errors />

    <form action="{{ route("rods.update", $rod->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $rod->parent_user_id }}">

        <div class="row g-3 pt-4">
            <h5>Название РОДового Древа</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" aria-label="Name" value="{{ $tree->name }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4 mb-4">Изменить</button>
    </form>
@endsection
