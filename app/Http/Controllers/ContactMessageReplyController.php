<?php

namespace App\Http\Controllers;

use App\Models\ContactMessageReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageReplyController extends Controller
{
    public function send_reply(Request $request , $id)
    {
        $reply = ContactMessageReply::create([
            "message" => $request->message ,
            "contact_id" => $id ,
            "admin_id" => Auth::guard('admin')->user()->id
        ]);

        if ($reply) {
            $request->session()->flash('success', 'Message Sent SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/contact-messages') ;
    }
}