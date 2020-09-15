<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($receiver)
    {
        $user = User::findOrFail($receiver);
        if(!$user) {
            $response = [
                'message'=> 'Utilisateur ' . $receiver . ' introuvable'
            ];

            return response()->json($response, 404);
        }

        $messages = Message::where(function ($query) use ($receiver) {
            $query->where('sender', Auth::user()->id)->where('receiver', $receiver);
        })->orWhere(function ($query) use ($receiver) {
            $query->where('receiver', Auth::user()->id)->where('sender', $receiver);
        })->orderBy('created_at', 'asc')->get();
        

        $response = [
            'messages'=> $messages,
            'message' => 'Message entre ' . Auth::user()->name . ' et ' . $user->name
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender' => 'required',
            'receiver' => 'required',
            'status' => 'required',
            'message' => 'required'
        ]);

        if($validator->fails()) {
            $response = [
                'message'=> 'Erreur de validation'
            ];

            return response()->json($response, 400);
        }

        if(!User::findOrFail($request->sender)) {
            $response = [
                'message'=> 'Emetteur ' . $request->sender . ' introuvable'
            ];

            return response()->json($response, 404);
        }

        if(!User::findOrFail($request->receiver)) {
            $response = [
                'message'=> 'Recepteur ' . $request->receiver . ' introuvable'
            ];

            return response()->json($response, 404);
        }

        $input = $request->all();
        $input['file'] = '';

        if($request->file) {
            $input['file'] = $request->file;
        }

        $message = Message::create($input);
        $message->save();

        $response = [
            'message' => 'Message created successfully',
        ];

        return response()->json($response, 201);
    }
}
