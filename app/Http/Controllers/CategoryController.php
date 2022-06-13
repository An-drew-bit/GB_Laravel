<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('front.category.index', [
            'categories' => $category->all()
        ]);
    }

    public function getCategoryBySlug(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $news = $category->news()
            ->orderByDesc('id')
            ->paginate(5);

        return view('front.category.getCategory', [
            'category' => $category,
            'news' => $news
        ]);
    }
}
