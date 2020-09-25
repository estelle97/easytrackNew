<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    
    public function getNotifications($notifs = null){
        ($notifs) ? $notifications = Notification::where('company_id', Auth::user()->companies->first()->id)->where('type', 'packageAlert')->take($notifs)->get()->reverse()
                    : $notifications = Notification::where('company_id', Auth::user()->companies->first()->id)->where('type', 'packageAlert')->get()->reverse();
    }
}
