<?php

namespace App\Http\Controllers;

use App\Queries\CategoryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class CategoryController extends Controller
{
    public function index(CategoryBuilder $builder): Application|Factory|View
    {
        $category = $builder->getAllCategory();

        return view('front.category.index', [
            'categories' => $category
        ]);
    }

    public function getCategoryBySlug(string $slug, CategoryBuilder $builder): Application|Factory|View
    {
        $category = $builder->getCategoryBySlug($slug);

        $news = $category->news()
            ->orderByDesc('id')
            ->paginate(5);

        return view('front.category.getCategory', [
            'category' => $category,
            'news' => $news
        ]);
    }
}
