<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contact_messages = ContactMessage::latest()->get();

        return view('admin.contactMessages.index' , compact('contact_messages'));
    }

    public function destroy(Request $request , $id)
    {
        $message = ContactMessage::find($id)->delete();

        if ($message) {
            $request->session()->flash('success', 'Message Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect('acp/contact-messages') ;
    }
}