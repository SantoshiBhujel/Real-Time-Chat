<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
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
        $message= new Message([
            'message'=> $request->message
        ]);
        

        if($user->messages()->save($message))
        {
            return ['status' => 'OK'];
        }
        else
        {
            return response()->json([
                'status' => 'Error!'
            ]);
        }
    }
}
