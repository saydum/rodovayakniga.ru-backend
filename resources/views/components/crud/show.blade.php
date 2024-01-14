@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($model->getAttributes() as $key => $value)
            <tr>
                <th>{{ $key }}</th>
                <td>{{ $value }}</td>
            </tr>
            <tr>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
