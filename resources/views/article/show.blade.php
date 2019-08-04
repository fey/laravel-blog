@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>{{$article->name}}</h1>
                <small>Category: {{ $article->category->name }}</small>
                <hr>
                <!-- <small>{{ $article->tags->pluck('name')->implode(', ')}}</small> -->
                <small>Tags:
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('article.tag', $tag) }}">{{ $tag->name }}</a>
                    @endforeach
                </small>
                <hr>
                <div>{{$article->body}}</div>
            </div>
        </div>
    </div>

@endsection
