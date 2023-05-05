@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p class="small">
            @if ($post->category)
                Catégorie : <strong>{{ $post->category?->name }}</strong>
                @if (!$post->tags->isEmpty())
                    ,
                @endif
            @endif
            @if (!$post->tags->isEmpty())
                Tags :
                @foreach ($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            @endif
        </p>
        <p>{{ $post->content }}</p>
        <p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Retour</a>
            <a href="{{ route('blog.update', ['post' => $post->id]) }}" class="btn btn-primary">Editer</a>
        </p>
    </article>

@endsection
