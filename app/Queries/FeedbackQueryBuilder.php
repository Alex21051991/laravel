<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FeedbackQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Feedback::query();
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}
