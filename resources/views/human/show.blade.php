@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($human->getAttributes() as $key => $value)
            <tr>
                <th>{{ $key }}</th>
                <td>{{ $value }}</td>
            </tr>
            <tr>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col nav">
            <a href="{{ route('humans.edit', $human->id) }}" class="btn btn-outline-primary nav-item m-1">Изменить</a>
            <form method="POST" action="{{ route("humans.destroy", $human->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger m-1">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
