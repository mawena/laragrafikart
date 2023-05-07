@extends('base')

@section('title', 'Modifier un article')

@section('content')
    @include('blog.form', ['title' => "Modifiction de l'article $post->title"])
@endsection
