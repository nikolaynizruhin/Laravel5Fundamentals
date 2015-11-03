<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use Auth;
use App\Tag;

class ArticlesController extends Controller
{

    /**
     * Create a new articles controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
    *Show all articles.
    *
    *@return Response
    */
    public function index()
    {
        $articles = Article::latest()->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
    *Show a single article.
    *
    *@param Article $article
    *@return Response
    */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
    *Show the page to create a new article.
    *
    *@return Response
    */    
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
    *Save a new article.
    *
    *@param CreateArticleRequest $request
    *@return Response
    */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash('You are now logged in');

        return redirect('articles');
    }

    /**
    *Edit an existing article.
    *
    *@param Article $article
    *@return Response
    */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
    *Update an article.
    *
    *@param Article $article
    *@param ArticleRequest $request
    *@return Response
    */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database
     *
     * @param Article $article
     * @param array   $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}