<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    /**
     * Undocumented function
     *
     * @return View
     */
    public function index()
    {
        return View::make('notifications.index');
    }
}
