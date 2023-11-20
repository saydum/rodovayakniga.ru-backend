@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">rodovayakniga.ru</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        🔥Добро пожаловать на сервис для составления РОДового Древа🔥
                        <br>
                        Составляйте РОДовое древо с Родственниками или с единомышленниками, чтобы в итоге получить РОДовую книгу.
                    </p>
                        <a href="{{ route("rodovayakniga.create") }}" class="btn btn-outline-success">Начать</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
