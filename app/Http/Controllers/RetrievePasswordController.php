<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RetrievePasswordController extends Controller
{

    public function index($token)
    {
        $token = DB::table('password_resets')
                ->where('token','=',$token)
                ->where('created_at','>',Carbon::now()->subHours(1))
                ->first();

        if($token){
            return view('admin.retrieve-password');
        }

        return redirect('/admin');
    }

    public function update_password(Request $request, $token){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|confirmed|min:6',
        ]);

        $token = DB::table('password_resets')
                ->where('token','=',$token)
                ->where('email','=',$request->email)
                ->where('created_at','>',Carbon::now()->subHours(1))
                ->first();

        if($token){
            User::where('email','=',$request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where('email','=',$request->email)->delete();

            return redirect('/admin')->with('message', 'Your password has been updated.');
        }

        
        return back()->withInput()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
