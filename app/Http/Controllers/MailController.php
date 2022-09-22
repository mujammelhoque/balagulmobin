<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   
public function sendmail(Request $request){
    $details = [
        'title' => 'Mail from Online Web Tutor',
        'body' => 'Test mail sent by Laravel 8 using SMTP.'
    ];
   
    Mail::to('send_to_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent, please check your inbox.");
    
}
// Route::get('send-mail', function () {
   
//   $details = [
//       'title' => 'Mail from Online Web Tutor',
//       'body' => 'Test mail sent by Laravel 8 using SMTP.'
//   ];
 
//   Mail::to('send_to_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
 
//   dd("Email is Sent, please check your inbox.");
// });

}
