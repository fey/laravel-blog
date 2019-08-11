@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-md-10">
                    <h1>Список статей</h1>
                    <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</td>
                                    <th scope="col">Name</td>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>
                                            <a href="{{ route('article.show', $article) }}">{{$article->name}}</a>
                                        </td>
                                        <td>
                                            {{ $article->user->name ?? 'anon' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('article.edit', $article) }}">Edit</a>
                                            <a href="{{ route('article.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$articles->links()}}
            </div>
        </div>
    </div>

    <div>

    <div>
@endsection
