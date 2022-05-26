<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class);

        return view('admin.news.index', [
            'news' => $news->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        News::create($request->all());

        return to_route('admin.news.index')->with('success', 'Новость успешно добавлена');
    }

    public function edit(int|string $id)
    {
        $new = app(News::class);

        return view('admin.news.edit', [
            'new' => $new->find($id)
        ]);
    }

    public function update(NewsRequest $request, int|string $id)
    {
        $new = News::find($id);

        $new->update($request->all());

        return to_route('admin.news.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(int|string $id)
    {
        News::find($id)?->delete();

        return to_route('admin.news.index')->with('success', 'Новость успешно удалена');
    }
}
