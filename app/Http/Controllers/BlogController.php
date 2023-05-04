<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View{
        return view('blog.index', ["posts" => Post::paginate(1)]);
    }

    public function show(String $slug, int $id) : RedirectResponse | View{
        $post = Post::findOrFail($id);
        if($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', ['post' => $post]);
    }
}
