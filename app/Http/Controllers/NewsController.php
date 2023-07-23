<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

final class NewsController extends Controller
{

    protected QueryBuilder $categoriesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder

    ) {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }

    public function index(): View
    {
        return \view('news.news.index', [
            'news' => $this->newsQueryBuilder->getAll(),
        ]);
    }

    public function show(News $news)
    {
        //return view('news.news.show', ['news' => $news]);
        //$this->destroy($news);
        return 0;
    }

    public function create(): View
    {
        return \view('news.news.create',[
            'categories' => $this->categoriesQueryBuilder->getAll(),
        ]);
    }

    public function edit(News $news): View
    {
        return \view('news.news.edit', [
            'news' => $news,
            'categories' => $this->categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news) {
            $news->categoriesNewsModel()->attach($request->getCategories());
            return \redirect()->route('news.news.index')->with('success', __('News has been created'));
        }
        return \back()->with('error', __('News has not been created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categoriesNewsModel()->sync($request->getCategories());

            return \redirect()->route('news.news.index')->with('success', __('News has been updated'));
        }

        return \back()->with('error', __('News has not been updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        //@dd($news->getKey());
        //$news->delete();
        try{
            $news->delete();
            return response()->json('ok');
        } catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());

            return response()->json('error', 400);
        }
    }

}
