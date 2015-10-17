<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;


class ArticlesController extends Controller
{
    /**
     * Show all articles.
     *
     * @return Response
     */
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();
    	return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show a single article.
     * @param integer $id
     * @return Response
     */
    public function show($id)
    {

    	$article = Article::findOrFail($id);

        dd($article->published_at);

    	return view('articles.show',compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    /**
     * Save a new article.
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        Article::create($request->all());

        return redirect('articles');
    }

}
