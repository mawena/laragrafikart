<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', ["posts" => Post::orderByDesc('id')->paginate(4)]);
    }

    public function showWithId(string $slug, Post $post)
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }
        return view('blog.show', ['post' => $post]);
    }

    public function showWithSlug(Post $post): RedirectResponse|View
    {
        return view('blog.show', ['post' => $post]);
    }

    public function create(): View
    {
        $post = new Post();
        return view('blog.create', ['post' => $post]);
    }

    public function store(PostFormRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'arcticle a bien été sauvegardé');
    }

    public function edit(Post $post)
    {
        return view('blog.edit', ['post' => $post]);
    }

    public function update(Post $post, PostFormRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'arcticle a bien été Modifié');

    }

}