<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications(){

        Carbon::setLocale('fr');
        $notifications = Notification::where('company_id', Auth::user()->companies->first()->id)->where('type', 'packageAlert')->take(5)->get()->reverse();

        return view('ajax.employee.notifications.notifications', compact('notifications'));
    }

    public function notifications(){

        $notifications = Notification::where('company_id', Auth::user()->companies->first()->id)->where('type', 'packageAlert')->get()->reverse();

        return view('employee.notifications', compact('notifications'));
    }
}
