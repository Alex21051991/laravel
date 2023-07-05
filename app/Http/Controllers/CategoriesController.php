<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{

    public function __invoke(Request $request): View
    {
        return view('news.categories.index');
    }

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['title' => ['required', 'string']]);

        $categories = $request->only(['title', 'description', 'actions']);
        $categories = Categories::create($categories);
        if ($categories !== false) {
            return \redirect()->route('news.categories.index')->with('success', 'Categories has been created');
        }
        return \back()->with('error', 'Categories has not create');
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
    public function edit(Categories $categories): View
    {
        //@dd($categories);
        return \view('news.categories.edit', [
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories): RedirectResponse
    {
        $categories = $categories->fill($request->only(['title', 'description', 'actions']));
        if ($categories->save()) {
            return \redirect()->route('news.categories.index')->with('success', 'Categories has been update');
        }
        return \back()->with('error', 'Categories has not update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Categories $categories)
    {
        @dd($request, $categories);
    }
}
