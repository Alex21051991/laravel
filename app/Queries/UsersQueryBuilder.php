<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Users;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UsersQueryBuilder  extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Users::query();
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}
