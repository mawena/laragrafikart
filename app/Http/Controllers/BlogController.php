<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View{
        return view('blog.index', ["posts" => Post::paginate(1)]);
    }


    public function showWithId(String $slug, Post $post){
        if($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', ['post' => $post]);
    }

    public function showWithSlug(Post $post) : RedirectResponse | View{
        return view('blog.show', ['post' => $post]);
    }

    public function store(BlogFilterRequest $request){

    }
}
