@extends('app.layout')

@section('content')
    <x-errors />

    <form action="{{ route("rods.store") }}" method="POST">
        @csrf

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <div class="row g-3 pt-4">
            <h5>Название РОДового Древа</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name">
            </div>
        </div>

        <button type="submit" class="btn btn-outline-success mt-4 mb-4">Добавить</button>
    </form>
@endsection
