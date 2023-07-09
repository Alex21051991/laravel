<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Order_info;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Order_infoQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Order_info::query();
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}
