@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Retour</a>
            <a href="{{ route('blog.update', ['post' => $post->id]) }}" class="btn btn-primary">Editer</a>
        </p>
    </article>

@endsection
