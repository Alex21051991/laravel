<?php
declare(strict_types=1);

namespace App\Providers;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\FeedbackQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\Order_infoQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class,CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,FeedbackQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,Order_infoQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
