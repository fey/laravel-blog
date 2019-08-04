<?php

namespace App\Http\Controllers;

use App\Article;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate();

        return view('article.index', compact('articles'));

    }   //
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Form\ArticleForm::class, [
            'method' => 'POST',
            'url' => route('article.store')
        ]);

        return view('article.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Form\ArticleForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getRawValues();
        $article = new Article();
        $article->name = $data['name'];
        $article->body = $data['body'];
        $article->user()
            ->associate(auth()->user());
        $article->category()
            ->associate(Category::findOrFail($data['category']));
        $article->saveOrFail();
        $article->tags()
            ->attach($data['tags']);

        return redirect()->route('article.show', $article);
    }
}
