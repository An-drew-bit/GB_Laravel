<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('front.category.index', compact('categories'));
    }

    public function getCategoryBySlug(string $slug)
    {

    }
}
