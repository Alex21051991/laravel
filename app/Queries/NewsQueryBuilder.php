<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return News::query();
    }

    public function getActiveNews(): Collection
    {
        //return  News::query()->where('status', NewsStatus::ACTIVE->value)->get();
        //return  $this->getModel()->active()->get();
        return  $this->getModel()->get();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->with('categoriesNewsModel')->paginate(10);
    }

}
