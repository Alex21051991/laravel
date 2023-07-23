<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\Store;
use App\Http\Requests\Feedback\Update;
use App\Models\Feedback;
use App\Queries\FeedbackQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;

class FeedbackController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('news.feedback.index');
    }

    protected QueryBuilder $feedbackQueryBuilder;

    public function __construct(
        FeedbackQueryBuilder $feedbackQueryBuilder
    ) {
        $this->feedbackQueryBuilder = $feedbackQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //@dd($this->feedbackQueryBuilder->getAll());
        return view('news.feedback.index', [
            'feedback' => $this->feedbackQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.feedback.create',[
            'feedback' => $this->feedbackQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $feedback = Feedback::create($request->validated());
        if ($feedback !== false) {
            return redirect()->route('news.feedback.index')->with('success', __('feedback has been created'));
        }

        return back()->with('error', __('feedback has not create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback): View
    {
        //@dd("ok");
        return view('news.feedback.edit', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Feedback $feedback): RedirectResponse
    {

        $feedback = $feedback->fill($request->validated());
        if ($feedback->save()) {
            return redirect()->route('news.feedback.index')->with('success', __('feedback has been update'));
        }
        return back()->with('error', __('feedback has not update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback): JsonResponse
    {
        try{
            $feedback->delete();
            return response()->json('ok');
        } catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());

            return response()->json('error', 400);
        }
    }
}
