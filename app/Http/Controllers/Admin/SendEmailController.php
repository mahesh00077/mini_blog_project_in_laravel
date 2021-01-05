<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
// use App\Mail\Sendmail;
// use Image;

class SendEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
        // $this->middleware('CheckMenuCategory');
    }
    public function index()
    {
        return view('admin_panel.send_email');
    }
    public function sendEmailAction(Request $request)
    {
        // dd($request->all());
        $data = [];
        $data["email_to"] = $request->email;
        $data["subject"] = $request->subject;
        $data["body"] = $request->message;

        /* single file upload code 
         $input = $request->file('attachment');
        $destinationPath = 'email_uploads/'; // path to save to, has to exist and be writeable
        $filename = $input->getClientOriginalName(); // original name that it was uploaded with
        $input->move($destinationPath, $filename); // moving the file to specified dir with the original name */

        $files = [];
        // multiple file upload
        if ($request->hasfile('attachment')) {

            foreach ($request->file('attachment') as $image) {
                $name = $image->getClientOriginalName();
                // $image_encod = (file_get_contents($image));
                $destinationPath = public_path('/email_uploads');
                $image->move($destinationPath, $name);

                array_push($files, $name);
            }
        }

        // dd($data);
        // dd($files);
        // Mail Send Function
        // Mail::send(['html' => 'user_panel.sendmail'], $data, function ($message) use ($data, $files) {
        Mail::send(['html' => 'user_panel.sendmail'], $data, function ($message) use ($data, $files) {
            $message->to($data["email_to"], $data["email_to"])
                ->subject($data["subject"]);

            foreach ($files as $file) {
                // dd($file);
                $message->attach(public_path('email_uploads\\' . $file));
            }
        });
        // check for failures
        if (Mail::failures()) {
            // return response showing failed emails
            echo 'something wrong';
        }
        // otherwise everything is okay ...
        dd('Mail sent successfully');
        // return redirect()->back();
    }

    public function backUp()
    {
        $data["email"] = "maheshracharla7@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $files = [
            public_path('images/459233250.jpg'),
            // public_path('files/1599882252.png'),
        ];

        Mail::send('user_panel.sendmail', $data, function ($message) use ($data, $files) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);

            foreach ($files as $file) {
                $message->attach($file);
            }
        });


        // check for failures
        if (Mail::failures()) {
            // return response showing failed emails
            echo 'something wrong';
        }

        // otherwise everything is okay ...
        dd('Mail sent successfully');
        // return redirect()->back();
    }
}