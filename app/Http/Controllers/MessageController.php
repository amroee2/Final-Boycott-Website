<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'message' => ['required'],
        ]);  
        // dd($data);      
        $message = Message::create($data);
        return redirect('/messages');
    }
}
