<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


final class NewsController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('news.news.index');
    }

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
        return view('news.news.index', [
            'news' => $this->newsQueryBuilder->getAll(),
        ]);
    }

    public function show(News $news)
    {
        //return view('news.news.show', ['news' => $news]);
        $this->destroy($news);
    }

    public function create(): View
    {
        return view('news.news.create',[
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);
        //@dd($request->all());
        $categories = $request->input('categories');

        $news = $request->only(['title', 'author', 'status', 'description']);
        $news = News::create($news);
        if ($news !== false) {
            if ($categories !== null) {
                $news->categoriesNewsModel()->attach($categories);
                return \redirect()->route('news.news.index')->with('success', 'News has been created');
            }
        }
        return \back()->with('error', 'News has not create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $categories = $request->input('categories');
        $news = $news->fill($request->only(['title', 'author', 'status', 'description']));
        if ($news->save()) {
            $news->categories()->sync($categories);

            return \redirect()->route('news.news.index')->with('success', 'News has been update');
        }
        return \back()->with('error', 'News has not update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //@dd($news->getKey());
        $news->delete();
    }

}
