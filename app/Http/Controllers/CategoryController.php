<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ['sports', 'technology', 'politics', 'games', 'lorem ipsum'];

        return view('category.categories', compact('categories'));
    }

    public function show($category)
    {
        $faker = Factory::create();

        $catNews = [];

        for ($i = 0; $i < 5; $i++) {
            $catNews[] = [
                'category' => $category,
                'title' => $faker->text(50),
                'text' => $faker->text(100),
                'author' => $faker->name,
                'date' => date('Y-m-d')
            ];
        }

        return view('category.single', compact('catNews', 'category'));
    }

    public function singleNew($news)
    {
        $faker = Factory::create();

        $news = [
            'news' => $news,
            'title' => $faker->text(50),
            'text' => $faker->text(100),
            'author' => $faker->name,
            'date' => date('Y-m-d')
        ];

        return view('category.news', compact('news'));
    }
}
