@extends('app.layout')

@section('title', $link->human->name)

@section('content')

    <div class="pb-3">
        <x-go-back-btn routeName="rods.index" />
    </div>

    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($link->getAttributes() as $key => $value)
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
            <form method="POST" action="{{ route("links.destroy", $link->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger m-3">
                    <i class="bi bi-trash3"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
