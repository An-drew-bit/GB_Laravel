<?php

namespace App\Queries;

use App\Models\News;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class NewsBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getAllNews(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->where("status", News::APPROVED)
            ->orderByDesc('created_at')
            ->paginate(6);
    }

    public function getNewBySlug(string $slug): Model
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
