@extends('layouts.web')

@section('content')
    @include('web.blog.css')

    <section id="blog">
        <div class="container">
            <div class="row">

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        {{ $post->title }}
                    </div>
                    <div class="panel-body">
                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection