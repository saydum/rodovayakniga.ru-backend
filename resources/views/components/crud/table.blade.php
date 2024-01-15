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
                    @empty(!$value)
                        <th scope="col">
                            <a
                                class="nav-link"
                                href="{{ route($modelName.".show", $model->id) }}">
                                {{ $value }}
                            </a>
                        </th>

                    @endempty
                @endforeach

                @isset($actionButtons)
                    <th class="text-end">
                        @foreach($actionButtons as $btn)
                            <a
                                href="{{ route($btn['route'], $model->id) }}"
                                class="btn btn-outline-{{ $btn['color'] }} btn-sm btn-rounded"
                            >
                                <i class="bi bi-{{ $btn['icon'] }}"></i>
                            </a>
                        @endforeach
                    </th>
                @endisset
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

