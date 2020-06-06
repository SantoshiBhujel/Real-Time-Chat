<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $user=Auth::user();
        //$message= $request->get('message');
        // $message= new Message([
        //     'message'=> $request->get('message')
        // ]);
        // $user->messages()->save($message);
        $user->messages()->create([
            'message'=>$request->get('message')
        ]);
        return ['status'=>'OK'];
    }
}
