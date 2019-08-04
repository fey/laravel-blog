@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>{{$article->name}}</h1>
                <small>Category - {{ $article->category->name }}</small>
                <small>Tags - {{ $article->tags->pluck('name')->implode(', ') ?? '' }}</small>
                <div>{{$article->body}}</div>
            </div>
        </div>
    </div>

@endsection
