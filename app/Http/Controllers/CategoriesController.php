<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;
use App\Models\Categories;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{

    protected QueryBuilder $categoriesQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder
    ) {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('news.categories.index', [
            'categoryList' => $this->categoriesQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.categories.create',[
            'categories' => $this->categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $categories = Categories::create($request->validated());
        if ($categories !== false) {
            return \redirect()->route('news.categories.index')->with('success', 'Categories has been created');
        }
        return \back()->with('error', 'Categories has not create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Categories $category): RedirectResponse
    {
        //@dd($request->all());
        $category = $category->fill($request->validated());
        if ($category->save()) {
            return \redirect()->route('news.categories.index')->with('success', 'Categories has been update');
        }
        return \back()->with('error', 'Categories has not update');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category): View
    {
        //@dd($categories);
        return \view('news.categories.edit', [
            'categories' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        try{
            $category->delete();
            return response()->json('ok');
        } catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
