<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\StoreFeedbackRequest;
use App\Services\FeedbackService;
use App\Services\TelegramService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function index(): View
    {
        return view('pages.contact-feedback.contact-us');
    }

    public function store(StoreFeedbackRequest $request, FeedbackService $feedbackService, TelegramService $telegramService): RedirectResponse
    {
        $feedbackService->save($request->all());

        try {
            $telegramService->sendMessage($request);
        } catch (\Exception) {}

        return redirect()->route('contact_us.index');
    }
}
