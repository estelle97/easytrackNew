<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function getNotifications(){

        return view('ajax.admin.notifications.notifications');
    }

    public function notifications(){

        Notification::where('user_id', Auth::user()->id)->update(['is_active' => 0]);
        return view('admin.notifications');
    }
}
