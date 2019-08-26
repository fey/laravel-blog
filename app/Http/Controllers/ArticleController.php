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

        return view('articles.index', compact('articles'));
    }

    public function byTag(Tag $tag)
    {
        $articles = $tag->articles()->paginate();

        return view('articles.index', compact('articles'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->paginate();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        $tags = Tag::all()->keyBy('id');
        $categories = Category::all()->keyBy('id');
        return view('articles.create', compact('article', 'tags', 'categories'));
    }

    public function store(CreateArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->validated());
        $article->user()
                ->associate(auth()->user());
        if ($request->category_id) {
            $article->category()->associate(Category::findOrFail($request->category_id));
        }
        $article->save();
        if ($request->tags) {
            $article->tags()->attach($request->tags);
        }
        flash('Create was successful!')->important();

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::all()->keyBy('id');
        $tags = Tag::all()->keyBy('id');
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $article->fill($request->all())->save();
        $request->session()->flash('status', 'Update was successful!');
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article, Request $request)
    {
        $article->delete();
        $request->session()->flash('status', 'Delete was successful!');
        return redirect()->route('articles.index');
    }
}
