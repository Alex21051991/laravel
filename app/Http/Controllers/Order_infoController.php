<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order_info;
use App\Queries\Order_infoQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Order_infoController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('news.order_info.index');
    }

    protected QueryBuilder $order_infoQueryBuilder;

    public function __construct(
        Order_infoQueryBuilder $order_infoQueryBuilder
    ) {
        $this->order_infoQueryBuilder = $order_infoQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('news.order_info.index', [
            'order_info' => $this->order_infoQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.order_info.create',[
            'order_info' => $this->order_infoQueryBuilder->getAll(),
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
        //dd($request->all());

        $order_info = $request->only(['name', 'phone', 'email', 'info']);
        $order_info = Feedback::create($order_info);
        if ($order_info !== false) {
            return \redirect()->route('news.order_info.index')->with('success', 'order_info has been created');
        }

        return \back()->with('error', 'order_info has not create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order_info $order_info)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_info $order_info): View
    {
        //@dd("ok");
        return \view('news.order_info.edit', [
            'order_info' => $order_info,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order_info $order_info): RedirectResponse
    {

        $order_info = $order_info->fill($request->only(['name', 'phone', 'email', 'info']));
        if ($order_info->save()) {
            return \redirect()->route('news.order_info.index')->with('success', 'order_info has been update');
        }
        return \back()->with('error', 'order_info has not update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
