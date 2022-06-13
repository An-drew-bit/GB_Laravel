<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(Category $categories)
    {
        return view('admin.category.index', [
            'categories' => $categories->all(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->create($request->validated());

        return to_route('admin.category.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return to_route('admin.category.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category)
    {
        if (count($category->news)) {
            return to_route('admin.category.index')->with('error', 'Ошибка, у категории есть новости');
        }

        $category->delete();

        return to_route('admin.category.index')->with('success', 'Категория успешно удалена');
    }
}
