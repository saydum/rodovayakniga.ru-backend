@extends('layouts.web')

@section('content')
    @include('web.blog.css')

    <section id="blog">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset("storage/" . $post->image) }}"
                             alt="{{ $post->title }}">
                        <div class="caption">
                            <h3 class="title">{{ $post->title }}</h3>
{{--                            <p>...</p>--}}
                            <p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link" role="button">
                                    Читать
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection