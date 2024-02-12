@extends('app.layout')

@section('content')

    <div class="pb-3">
        <x-go-back-btn routeName="humans.index" />
    </div>

    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($human->getAttributes() as $key => $value)
            <tr>
                <th>{{ $key }}</th>
                @if($key === 'image')
                    <td>
                        <img class="mt-3 rounded" src="{{ asset($value) }}" width="120" height="120" alt="{{ $value }}">
                    </td>
                @else
                    <td>{{ $value }}</td>
                @endif
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
                    <i class="bi bi-trash3"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
