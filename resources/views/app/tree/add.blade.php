@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route("trees.store") }}" method="POST">
        @csrf

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="row g-3 pt-4">
            <h5>Название РОДового Древа</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4 mb-4">Добавить</button>
    </form>
@endsection
