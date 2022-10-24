<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Queries\CategoryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(CategoryBuilder $builder): Application|Factory|View
    {
        $categories = $builder->getAllCategory();

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create(): Application|Factory|View
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->create($request->validated());

        return to_route('admin.category.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit(Category $category): Application|Factory|View
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return to_route('admin.category.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if (count($category->news)) {
            return to_route('admin.category.index')->with('error', 'Ошибка, у категории есть новости');
        }

        $category->delete();

        return to_route('admin.category.index')->with('success', 'Категория успешно удалена');
    }
}
