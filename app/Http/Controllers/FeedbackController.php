<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\StoreFeedbackRequest;
use App\Services\TelegramService;
use Illuminate\Contracts\View\View;

class FeedbackController extends Controller
{
    public function index(): View
    {
        return view('pages.contact-feedback.contact-us');
    }

    public function store(StoreFeedbackRequest $request, TelegramService $telegramService)
    {
        $telegramService->sendMessage($request);
    }
}
