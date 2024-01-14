@extends('layouts.app')

@section('content')
    <div class="card-title mt-3 d-flex ">
        <h3 class="flex-grow-1">
            {{ $title }}
        </h3>
        <a
            class="btn btn-success flex-grow-0"
            href="{{ route($modelName.".create") }}"
        >
            Добавить
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <tbody>
        @foreach($models as $model)
            <tr>

                @foreach($model->getAttributes() as $key => $value)

                        <th scope="col">
                            <a
                                class="nav-link"
                                href="{{ route($modelName.".show", $model->id) }}">
                                {{ $value }}
                            </a>
                        </th>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

