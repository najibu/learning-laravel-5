<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    public function show($id)
    {
    	// // auth()->logout();
    	// auth()->loginUsingId(2); //tmp

    	$post = Post::findOrFail($id);

    	// // $this->authorize('show-post', $post);
    	// if (Gate::denies('update', $post))     	// {
    	// 	abort(403, 'Nope');
    	// }

    	// if (Auth::user()->can('update-post', $post)) {
    	// 	return 'You can update this.';
    	// }

    	return view('posts.show', compact('post'));
    }

    public function store(Request $request) 
    {
    	// $request->user()->can('update-post');
    }
}
