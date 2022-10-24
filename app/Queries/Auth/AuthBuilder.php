<?php

declare(strict_types = 1);

namespace App\Queries\Auth;

use App\Models\User;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};

class AuthBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getUserForEmail(string $email): Model
    {
        return $this->getBuilder()
            ->where(['email' => $email])
            ->firstOrFail();
    }
}
