<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class MailController extends Controller
{
    public function basic_email() {
        $data = array('name'=>"iMC3 Portal User");
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('jsceon@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('jsceon@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     
     public function html_email() {
        $data = array('name'=>"iMC3 Portal User");
        Mail::send('mail', $data, function($message) {
           $message->to('jsceon@gmail.com', 'Your Task')->subject
              ('Laravel HTML Testing Mail');
           $message->from('jsceon@gmail.com','iMC3 Portal');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
  

}
