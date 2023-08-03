<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactcontroller extends Controller
{
    public function send(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'Subject'=>'required',
            'message'=>'required'
        ]);
        
        if ($this->isOnline()) {
            $mail_data = [
                'fromName'=>$request->name,
                'fromEmail'=>$request->email,
                'subject'=>$request->Subject,
                'body'=>$request->message,
                'recipient'=>"lalit7142@gmail.com"
            ];
            
            \Mail::send('email-template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient']);
                $message->from($mail_data['fromEmail'],$mail_data['fromName']);
                $message->subject($mail_data['subject']);
            });
            return redirect()->back()->with('success','Email sent successfully');
        } else {
            return redirect()->back()->withInput()->with('error','Please check your internet connection');
        }
        

    }

    public function isOnline($site="https://youtube.com/"){
        if(@fopen($site,"r")){
            return true;
        }else{
            return false;
        }
    }
}
