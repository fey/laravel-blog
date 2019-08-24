@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-md-10">
                <h1>Список тэгов</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Name</th>
                            <th>Count articles</th>
                            <th scope="col">
                                <a href="{{ route('tags.create') }}">Create new</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>
                                    <a href="{{ route('tags.show', $tag) }}">{{$tag->name}}</a>
                                </td>
                                <td>
                                    {{ $tag->slug }}
                                </td>
                                <td>
                                    {{ $tag->articles->count() }}
                                </td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag) }}">Edit</a>
                                    <a href="{{ route('tags.destroy', $tag) }}" data-confirm="Вы уверены?" data-method="delete"
                                                                                                                    rel="nofollow">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$tags->links()}}
            </div>
        </div>
    </div>

    <div>
        <div>
    @endsection
