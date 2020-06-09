<?php

namespace App\Http\Controllers\Api\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * NotificationController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    
    /**
     * Returns a paginated list of notifications.
     *
     * @param Request $request
     * @return NotificationCollection
     */
    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->latest()
            ->paginate(3);

        return new NotificationCollection($notifications);
    }
}
