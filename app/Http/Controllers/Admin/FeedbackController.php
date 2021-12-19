<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FeedbackService;
use Illuminate\Contracts\View\View;

class FeedbackController extends Controller
{
    public function index(FeedbackService $feedbackService): View
    {
        $feedback = $feedbackService->getAllForAdminTable();

        return view('pages.admin.feedback.index', ['feedback' => $feedback]);
    }
}
