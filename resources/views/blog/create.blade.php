@extends('base')

@section('title', 'Créer un article')

@section('content')
    @include('blog.form', ['title' => "Création d'un article"])
@endsection
