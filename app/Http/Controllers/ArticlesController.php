<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth; 



class ArticlesController extends Controller
{
    /**
     * Create a new articles controller instance.
     * 
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']);
    }

    /**
     * Show all articles.
     *
     * @return Response
     */
    public function index()
    {
        
    	$articles = Article::latest('published_at')->published()->get();

        $latest = Article::latest()->first();

    	return view('articles.index', compact('articles', 'latest'));
    }

    /**
     * Show a single article.
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
    	return view('articles.show', compact('article'));
    }

    /**
     * Show the page to create a new article.
     * 
     * @return Response
     */
    public function create()
    {
        $tags = \App\Tag::lists('name', 'id');
        
        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article.
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $this->CreateArticle($request);

        flash('Your article has been successfully created!', 'Good Job');

        return redirect('articles')->with('flash_message');
    }

    /**
     * Edit an existing article.
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update an article.
     * @param Article $article ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tags_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database.
     * @param Article $article 
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);

    }  

    /**
     * Save a new article.
     *
     * @param Article $request
     * @return $article
     */
    private function CreateArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
       
        $article->syncTags($article, $request->input('tags_list'));

        return $article;

    }    

}
