<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class SettingsController extends Controller
{
    
    public function getSettings(){
        if (Auth::check()) {
            $userId = Auth::id();
            $userInfo = DB::table('users')->where('id',$userId)->get()->first();
            return view('userView.settings',compact('userInfo'));
        }else{
            return redirect('/login');
        }
    }

    public function postSettings(Request $request,$id){
        $query = DB::table('users')->
        where('id',$id)
        ->update([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'email' => $request->input('email'),
        ]);
        return redirect('/home');
    }
}
