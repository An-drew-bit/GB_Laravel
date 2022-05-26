<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = app(Category::class);

        return view('admin.category.index', [
            'categories' => $categories->all(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return to_route('admin.category.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit(int|string $id)
    {
        $category = app(Category::class);

        return view('admin.category.edit', [
            'category' => $category->find($id)
        ]);
    }

    public function update(CategoryRequest $request, int|string $id)
    {
        $category = Category::find($id);

        $category->update($request->all());

        return to_route('admin.category.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(int|string $id)
    {
        /*$category = */Category::find($id)?->delete();

        /*if ($category->news->count()) {
            return to_route('admin.category.index')->with('error', 'Ошибка, у категории есть новости'); как сделать проверку на есть ли там записи?
        }*/

        return to_route('admin.category.index')->with('success', 'Категория успешно удалена');
    }
}
