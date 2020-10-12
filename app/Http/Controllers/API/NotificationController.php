<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::where('user_id', Auth::user()->id)->get();
        $response = [
            'success' => true,
            'data' => $notifications,
            'message' => 'Notification de l\'utilisateur ' . Auth::user()->name
        ];

        return response()->json($response, 200);
    } 
    public function changeState($id) {
        $notification = Notification::find($id);
        if($notification) {
            $notification->is_active = 0;
            $notification->save();
            $response = [
                'success' => true,
                'data' => $notification,
                'message' => 'Statut de la notificaion mis a jour'
            ];
    
            return response()->json($response, 200);
        }
        
    }
}
