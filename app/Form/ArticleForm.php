<?php

namespace App\Form;

use Kris\LaravelFormBuilder\Form;
use App\Category;
use App\Tag;

class ArticleForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => __('Article Title'),
                'rules' => ['required']
                ])
            ->add('category', 'entity', [
                'class' => Category::class,
                'property' => 'name'
            ])
            ->add('tags', 'entity', [
                'class' => Tag::class,
                'property' => 'name',
                'choice_options' => [
                    'wrapper' => ['class' => 'form-check form-check-inline'],
                    'label_attr' => ['class' => 'form-check-label label'],
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('body', 'textarea', [
                'rules' => 'required',
                'attr' => ['style' => 'display:none;'],
                'wrapper' => ['id' => 'editormd']
            ])
            ->add('publish', 'submit');
    }
}
