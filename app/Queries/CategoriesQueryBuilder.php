<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoriesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Categories::query();
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}
