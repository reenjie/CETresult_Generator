<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listpasser;
class DeleteController extends Controller
{
    public function delete(Request $request){

        switch ($request->type) {
            case 'passer':
                Listpasser::findorFail($request->id)->delete();
            break;

            
          
        }
        return redirect()->back()->with('success','Data deleted Successfully');
    }
}
