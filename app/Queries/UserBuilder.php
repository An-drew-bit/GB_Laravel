<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};

class UserBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getCurrentUser(int $user): Model
    {
        return $this->getBuilder()
            ->current($user);
    }
}
