<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $lname = strtoupper($request->lname);
        $fname = strtoupper($request->fname);
        $mname = strtoupper($request->mname);
        $religion = strtoupper($request->religion);
        $gender = strtoupper($request->gender);
        $civilstatus = strtoupper($request->civilstatus);
        $Bdate = $request->Bdate;
        $email = $request->email;
        $password = $request->password;
        $address = strtoupper($request->address);
        $contactno = $request->contactno;
        $econtactno = $request->contactno;
        $ctn = $request->ctn;
        $tin = $request->tin;
        $gsis = $request->gsis;
        $sss = $request->sss;
        $occupation = strtoupper($request->occupation);


        $save = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'mname' => $mname,
            'religion' => $religion,
            'civilstatus' => $civilstatus,
            'gender' => $gender,
            'birthdate' => date('Y-m-d', strtotime($Bdate)),
            'address' => $address,
            'contactno' => $contactno,
            'email' => $email,
            'email_verified_at' => null,
            'password' => Hash::make($password),
            'roles' => 1,

        ]);

        if ($save) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('dashboard');
            }
        }
    }

    public function updatemyaccount(Request $request)
    {
        $lname = strtoupper($request->lname);
        $fname = strtoupper($request->fname);
        $mname = strtoupper($request->mname);
        $religion = strtoupper($request->religion);
        $gender = strtoupper($request->gender);
        $civilstatus = strtoupper($request->civilstatus);
        $Bdate = $request->Bdate;
        $email = $request->email;
        $password = $request->password;
        $address = strtoupper($request->address);
        $contactno = $request->contactno;
        $econtactno = $request->contactno;
        $ctn = $request->ctn;
        $tin = $request->tin;
        $gsis = $request->gsis;
        $sss = $request->sss;
        $occupation = strtoupper($request->occupation);

        if ($password == null) {
            User::where('id', Auth::user()->id)->update([
                'fname' => $fname,
                'lname' => $lname,
                'mname' => $mname,
                'religion' => $religion,
                'civilstatus' => $civilstatus,
                'gender' => $gender,
                'birthdate' => date('Y-m-d', strtotime($Bdate)),
                'address' => $address,
                'contactno' => $contactno,
            ]);
        } else {
            User::where('id', Auth::user()->id)->update([
                'fname' => $fname,
                'lname' => $lname,
                'mname' => $mname,
                'religion' => $religion,
                'civilstatus' => $civilstatus,
                'gender' => $gender,
                'birthdate' => date('Y-m-d', strtotime($Bdate)),
                'address' => $address,
                'contactno' => $contactno,
                'password' => Hash::make($password),

            ]);
        }
        return redirect()->back()->with('success', 'Changes Saved Successfully!');
    }
}
