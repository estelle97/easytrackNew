<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications(){

        return view('ajax.employee.notifications.notifications');
    }

    public function notifications(){

        Notification::where('user_id', Auth::user()->id)->update(['is_active' => 0]);
        return view('employee.notifications');
    }
}
