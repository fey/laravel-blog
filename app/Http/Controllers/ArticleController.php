<?php

namespace App\Http\Controllers;

use App\Article;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Category;
use App\Events\ArticleCreated;
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
        $tags = Tag::all()->keyBy('id');
        $categories = Category::all()->keyBy('id');
        return view('article.create', compact('article', 'tags', 'categories'));
    }

    public function store(CreateArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->validated());
        $article->user()
                ->associate(auth()->user());
        if (!is_null($request->category_id)) {s
            $article->category()->associate(Category::findOrFail($request->category_id));
        } else {
            $article->category_id = 1;
        }

        $article->save();
        if ($request->tags) {
            $article->tags()->attach($request->tags);
        }
        $request->session()->flash('status', 'Create was successful!');
        event(new ArticleCreated($article));
        return redirect()->route('article.index');
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
        $article->delete();
        $request->session()->flash('status', 'Delete was successful!');
        return redirect()->route('article.index');
    }
}
