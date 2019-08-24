@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <h1>{{$article->name}}</h1>
                <small>Category: {{ $article->category->name }}</small>
                <hr>
                <div>@markdown($article->body)</div>
                <hr>
                <small>Tags:
                    @foreach ($article->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </small>
                <hr>
            </div>
        </div>
    </div>

@endsection
