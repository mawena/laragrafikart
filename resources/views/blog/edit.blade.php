@extends('base')

@section('title', 'Modifier un article')

@section('content')
    <h1>Modifiction de l'article {{ $post->title }}</h1>
    @include('blog.form')
@endsection
