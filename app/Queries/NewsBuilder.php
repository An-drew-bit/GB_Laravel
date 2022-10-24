<?php

namespace App\Queries;

use App\Enums\NewsStatus;
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

    public function getNewsById(int $id): Model
    {
        return $this->getBuilder()
            ->findOrFail($id);
    }

    public function getApprovedNews(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->where("status", NewsStatus::APPROVED)
            ->orderByDesc('created_at')
            ->paginate(6);
    }

    public function getNewNews(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->where("status", NewsStatus::NEW)
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
