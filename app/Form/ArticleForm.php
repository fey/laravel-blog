<?php

namespace App\Form;

use Kris\LaravelFormBuilder\Form;

class ArticleForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('slug', 'text')
            ->add('name', 'text')
            ->add('body', 'textarea')
            ->add('publish', 'submit');
    }
}
