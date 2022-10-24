<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Queries\{CategoryBuilder, NewsBuilder};
use App\Serveces\Contract\Upload;
use App\Models\{News, User};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(News::class, 'news');
    }

    public function index(News $news): Application|Factory|View
    {
        return view('admin.news.index', [
            'news' => $news->where('status', NewsStatus::APPROVED)
                ->paginate(10)
        ]);
    }

    public function newAddedNews(NewsBuilder $builder)
    {
        $news = $builder->getNewNews();

        return view('admin.news.new', [
            'news' => $news
        ]);
    }

    public function create(CategoryBuilder $builder): Application|Factory|View
    {
        $categories = $builder->getCategoryByPluck();

        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $user = User::findOrFail(auth('web')->id());

        $user->news()->create($request->validated());

        return to_route('admin.news.index')->with('success', 'Новость успешно добавлена');
    }

    public function edit(News $news, CategoryBuilder $builder): Application|Factory|View
    {
        $categories = $builder->getCategoryByPluck();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    public function update(NewsRequest $request, News $news, Upload $upload): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $upload->uploadImage($request->file('image'));
        }

        $news->update($validated);

        return to_route('admin.news.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return to_route('admin.news.index')->with('success', 'Новость успешно удалена');
    }

    public function approve(NewsBuilder $builder, int $id): RedirectResponse
    {
        $news = $builder->getNewsById($id);

        $news->status = NewsStatus::APPROVED;
        $news->save();

        return back()->with('success', 'Новость успешно подтверждена');
    }

    public function reject(NewsBuilder $builder, int $id): RedirectResponse
    {
        $news = $builder->getNewsById($id);

        $news->status = NewsStatus::REJECTED;
        $news->save();

        return back()->with('success', 'Новость успешно отклонена');
    }
}
