<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Listpasser;
use App\Models\Urequest;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {

        switch ($request->type) {
            case 'passer':
                Listpasser::findorFail($request->id)->delete();
                break;

            case 'deleteallpasser':
                DB::select('DELETE FROM `listpassers` WHERE 1');
                break;
            case 'myrequest':
                Urequest::findorFail($request->id)->delete();
                break;
        }
        return redirect()->back()->with('success', 'Data deleted Successfully');
    }
}
