<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function storeadmin(Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $pass  = $request->pass;
        try {
            User::create([
                'fname' => $fname,
                'lname' => $lname,
                'mname' => '',
                'religion' => '',
                'civilstatus' => '',
                'gender' => '',
                'birthdate' => date('Y-m-d'),
                'address' => '',
                'contactno' => '',
                'emergencycontact' => '',
                'com_tax_number' => '',
                'tin' => '',
                'gsis' => '',
                'sss' => '',
                'occupation' => '',
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make($pass),
                'roles' => 0,


            ]);
            return redirect()->back()->with('success', 'User Saved Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'There was a problem saving.Its either Duplicate Email or Connection Problem');
        }
    }

    public function registerUser(Request $request)
    {
        try {

        $lname = strtoupper($request->lname);
        $fname = strtoupper($request->fname);
        $mname = strtoupper($request->mname);
        $email = $request->email;
        $password = $request->password;
        $contactno = $request->contactno;
        $college = $request->college;
        $otpCode = random_int(100000, 999999);


        $save = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'mname' => $mname,
            'contactno' => $contactno,
            'email' => $email,
            'email_verified_at' => null,
            'password' => Hash::make($password),
            'roles' => 1 , 
            'college'=>$college ,
            'otp'=>0,
            'code'=>$otpCode
        ]);

            if ($save) {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->route('dashboard');
                }
            }
        } catch (\Throwable $th) {
            return $th;
            //return redirect()->route('login');
        }
    }

    public function updatemyaccount(Request $request)
    {
        $lname = strtoupper($request->lname);
        $fname = strtoupper($request->fname);
        $mname = strtoupper($request->mname);
        $email = $request->email;
        $password = $request->password;
        $contactno = $request->contactno;
        $college = $request->college;
       
   

        if ($password == null) {
            User::where('id', Auth::user()->id)->update([
                'fname' => $fname,
                'lname' => $lname,
                'mname' => $mname,
                'contactno' => $contactno,
                'college'=>$college
            ]);
        } else {
            User::where('id', Auth::user()->id)->update([
                'fname' => $fname,
                'lname' => $lname,
                'mname' => $mname,
                'contactno' => $contactno,
                'password' => Hash::make($password),
                'college'=>$college

            ]);
        }
        return redirect()->back()->with('success', 'Changes Saved Successfully!');
    }

    public function otp(Request $request){
      
        if(session()->has('emailsend')){
            return view('otp');
        }
        return redirect()->route('mail.sendOtp');
    
    }
    public function validateOtp(Request $request){
        $code = $request->code;

        if($code == Auth::user()->code){
            User::where('id',Auth::user()->id)->update([
                'email_verified_at'=>date('Y-m-d H:i:s'),
                'otp'=>1,
                'code'=>''
            ]);

            return redirect()->route('dashboard');

        }else {
            return redirect()->back()->with('error','Invalid Code');
        }
        
    }
}
