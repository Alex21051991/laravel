<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Queries\FeedbackQueryBuilder;
use App\Queries\QueryBuilder;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);
        //dd($request->all());

        $feedback = $request->only(['name', 'feedback']);
        $feedback = Feedback::create($feedback);
        if ($feedback !== false) {
            return \redirect()->route('news.feedback.index')->with('success', 'feedback has been created');
        }

        return \back()->with('error', 'feedback has not create');
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
        return \view('news.feedback.edit', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback): RedirectResponse
    {

        $feedback = $feedback->fill($request->only(['name', 'feedback']));
        if ($feedback->save()) {
            return \redirect()->route('news.feedback.index')->with('success', 'feedback has been update');
        }
        return \back()->with('error', 'feedback has not update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
