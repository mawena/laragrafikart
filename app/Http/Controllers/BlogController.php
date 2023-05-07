<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::orderByDesc('id')->with("category", 'tags');
        return view('blog.index', ["posts" => $posts->paginate(4), "title" => "Acceuil du blog"]);
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
        return view('blog.create', ['post' => $post, 'categories' => Category::select('id', 'name')->get(), 'tags' => Tag::select('id', 'name')->get()]);
    }

    public function store(PostFormRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'arcticle a bien été sauvegardé');
    }

    public function edit(Post $post)
    {
        return view('blog.edit', ['post' => $post, 'categories' => Category::select('id', 'name')->get(), 'tags' => Tag::select('id', 'name')->get()]);
    }

    public function update(Post $post, PostFormRequest $request)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags_id'));
        return redirect()->route('blog.show.id', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'arcticle a bien été Modifié');

    }

}