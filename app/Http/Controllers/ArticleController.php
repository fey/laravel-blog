<?php

namespace App\Http\Controllers;

use App\Article;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Form;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate();

        return view('article.index', compact('articles'));
    }
    public function byTag(Tag $tag)
    {
        $articles = $tag->articles()->paginate();

        return view('article.index', compact('articles'));
    }
    public function byCategory(Category $category)
    {
        $articles = $category->articles()->paginate();

        return view('article.index', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(CreateArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->validated())->save();
        $request->session()->flash('status', 'Create was successful!');
        // $article->name = $data['name'];
        // $article->body = $data['body'];
        $article->user()
            ->associate(auth()->user());
        // $article->category()
        //     ->associate(Category::findOrFail($data['category']));
        // $article->tags()
            // ->attach($data['tags']);
        return redirect()->route('article.index');
        return redirect()->route('article.show', $article);
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $article->fill($request->all())->save();
        $request->session()->flash('status', 'Update was successful!');
        return redirect()->route('article.index');
    }

    public function destroy(Article $article, Request $request)
    {
        // dd('hello');
        $article->delete();
        $request->session()->flash('status', 'Delete was successful!');
        return redirect()->route('article.index');
    }
}
