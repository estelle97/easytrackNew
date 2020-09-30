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
        
        Carbon::setLocale('fr');
        $notifications = Notification::where('company_id', Auth::user()->companies->first()->id)->where('type', 'packageAlert')->take(5)->get()->reverse();

        return view('ajax.admin.notifications.notifications', compact('notifications'));
    }
}
