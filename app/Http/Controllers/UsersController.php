<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Store;
use App\Http\Requests\Users\Update;
use App\Models\Users;
use App\Queries\UsersQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('news.users.index');
    }

    protected QueryBuilder $usersQueryBuilder;

    public function __construct(
        UsersQueryBuilder $usersQueryBuilder
    ) {
        $this->usersQueryBuilder = $usersQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('news.users.index', [
            'users' => $this->usersQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.users.create',[
            'users' => $this->usersQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $users = Users::create($request->validated());
        if ($users !== false) {
            return \redirect()->route('news.users.index')->with('success',  __('users has been created'));
        }

        return \back()->with('error',  __('users has not create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $user): View
    {
        //@dd($users->email);
        return \view('news.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Users $user): RedirectResponse
    {

        $user = $user->fill($request->validated());
        if ($user->save()) {
            return \redirect()->route('news.users.index')->with('success', __('users has been update'));
        }
        return \back()->with('error', __('users has not update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        try{
            $users->delete();
            return response()->json('ok');
        } catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());

            return response()->json('error', 400);
        }
    }
}
