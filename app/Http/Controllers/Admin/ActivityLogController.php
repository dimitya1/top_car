<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogService;
use Illuminate\Contracts\View\View;

class ActivityLogController extends Controller
{
    public function index(ActivityLogService $activityLogsService): View
    {
        $table = $activityLogsService->getAllForAdminTable();

        return view('pages.admin.activity_log.index', ['table' => $table]);
    }
}
