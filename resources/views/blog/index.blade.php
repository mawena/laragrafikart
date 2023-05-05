@extends('base')

@section('title', $title)

@section('content')
    <h1>Mon blog</h1>
    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
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
                <a href="{{ route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id]) }}"
                    class="btn btn-primary">Lire plus ...</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
