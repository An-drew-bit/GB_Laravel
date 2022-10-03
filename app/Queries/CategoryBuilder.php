<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model, Collection};

class CategoryBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getAllCategory(): Collection
    {
        return $this->getBuilder()
            ->get();
    }

    public function getCategoryBySlug(string $slug): Model
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getCategoryByPluck()
    {
        return $this->getBuilder()
            ->pluck('title', 'id')
            ->all();
    }
}
