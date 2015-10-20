<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth; 



class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

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
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
    	return view('articles.show',compact('article'));
    }

    public function create()
    {
        if(Auth::guest())
        {
            return redirect('articles');
        }

        return view('articles.create');
    }

    /**
     * Save a new article.
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        flash()->overlay('Your article has been successfully created!', 'Good Job');

        return redirect('articles');
    }

    /**
     * Edit an existing article.
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update an article.
     * @param Article $article ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }

}
