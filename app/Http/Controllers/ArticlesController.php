<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Render a list of a resource.

        if (request('tag')) {
            $article = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $article = Article::latest()->get();
        }

        return view('articles.index', ['article' => $article]);
    }
    public function show(Article $article)
    {
        // Show a single resource. 

        return view('articles.show', ['article' => $article]);
    }
    public function create()
    {
        // Shows a view to create a new resource.
        return view('articles.create', [
            'tags'=> Tag::all()
        ]);
    }
    public function store()
    {
        //Validate input
        // Persist the new resource.

        $this->validateArticle();


        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; 
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }
    public function edit(Article $article)
    {
        // Find the article associated with the id: (Article $article).
        // Show a view to edit an existing resource.

        return view('articles.edit', compact('article'));
    }
    public function update(Article $article)
    {
        // Persist the edited resource.

        $article->update($this->validateArticle());

        return redirect($article->path());
    }
    public function delete()
    {
        // Delete the resource.
    }

    protected function validateArticle()
{
    return request()->validate([
        'title' => ['required', 'min:3'],
        'excerpt' => 'required',
        'body' => 'required',
        'tags' => 'exists:tags,id'
    ]);
}
    
}
