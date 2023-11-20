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

    <form method="POST" action="{{ route("rod.update", $rod->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="rod">РОД:</label>
            <input type="text" class="form-control" name="name" id="rod" value="{{ $rod->name }}">
        </div>

        <input type="number" hidden="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
