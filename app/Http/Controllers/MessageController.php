<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessagePosted;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $user=Auth::user();
        $message= $user->messages()->create([
            'message'=>$request->message
        ]);

        //fire new message has been posted event 
            event(new MessagePosted($message, $user));

        return  response()->json(['status' => 'OK']);
        
    }
}
