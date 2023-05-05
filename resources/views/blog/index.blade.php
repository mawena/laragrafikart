@extends('base')

@section('title', 'Acceuil du blog')

@section('content')
    <h1>Mon blog</h1>
    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>
                <a href="{{ route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id]) }}"
                    class="btn btn-primary">Lire plus ...</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
