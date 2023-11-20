@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($rod->getAttributes() as $key => $value)
            <tr>
                <th>{{ $key }}</th>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col nav">
            <a href="{{ route("rod.edit", $rod->id) }}"
               class="btn btn-outline-primary nav-item m-1">Изменить</a>
            <form method="POST" action="{{ route("rod.destroy", $rod->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-outline-danger nav-item m-1" value="Удалить">
            </form>
        </div>
    </div>
@endsection
