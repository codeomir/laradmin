<?php

namespace App\Http\Controllers;

use App\Mail\ForgottenPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgottenPasswordController extends Controller
{
    public function index(){
        return view('admin.forgotten-password');
    }

    public function send_email(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::to($request->email)->send(new ForgottenPasswordMail($token));
        }

        
        return back()->with('message', 'If the email specified exists, you will receive a mail with a link to retrieve your password.');
    }
}
