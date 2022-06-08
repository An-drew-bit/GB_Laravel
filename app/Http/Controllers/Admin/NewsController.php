<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Serveces\Contract\Upload;
use App\Models\{Category, News, User};

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('admin.news.index', [
            'news' => $news->paginate(10)
        ]);
    }

    public function create(Category $categories)
    {
        return view('admin.news.create', [
            'categories' => $categories->pluck('title', 'id')->all()
        ]);
    }

    public function store(NewsRequest $request)
    {
        $user = User::findOrFail(auth('web')->id());

        $user->news()->create($request->validated());

        return to_route('admin.news.index')->with('success', 'Новость успешно добавлена');
    }

    public function edit(News $news, Category $categories)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories->pluck('title', 'id')->all()
        ]);
    }

    public function update(NewsRequest $request, News $news, Upload $upload)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $upload->uploadImage($request->file('image'));
        }

        $news->update($validated);

        return to_route('admin.news.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return to_route('admin.news.index')->with('success', 'Новость успешно удалена');
    }
}
