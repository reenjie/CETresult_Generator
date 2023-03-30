<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class EditController extends Controller
{
    public function edit(Request $request){
            $id    = $request->id;
            switch ($request->type) {
                case 'user':
                    $fname = $request->fname;
                    $lname = $request->lname;
                    $email = $request->email;
                    $pass  = $request->pass;
                    if($pass == null){
                        User::findorFail($id)->update([
                           'fname'=>$fname,
                           'lname'=>$lname,  
                        ]);
                    }else{
                        User::findorFail($id)->update([
                            'fname'=>$fname,
                            'lname'=>$lname,  
                            'password'=>Hash::make($pass),
                         ]);
                    }
                  
                   

                break;
              
            }
        
            return redirect()->back()->with('success','Data updated Successfully!');

    }
}
