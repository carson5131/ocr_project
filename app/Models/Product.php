<?php

namespace App\Models;

use Nicolaslopezj\Searchable\SearchableTrait;

class Product
{
    //原文作者：liyu001989
    //转自链接：https://learnku.com/courses/laravel-package/2019/adding-search-function-to-eloquent-model-nicolaslopezjsearchable/3831

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 0,
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
