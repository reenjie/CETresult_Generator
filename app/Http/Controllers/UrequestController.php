<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urequest;
use Illuminate\Support\Facades\Auth;

class UrequestController extends Controller
{
    public function changestatus(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $email    = $request->email;
        $username = $request->username;


        if ($type == 'approve') {
            $schedule = $request->schedule;


            Urequest::findorFail($id)->update([
                'status' => 1,
                'schedule' => $schedule
            ]);
            //return redirect()->back()->with('success', 'Approved Successfully!');

            return redirect()->route('mail.sendSchedule', ["schedule" => $schedule, "email" => $email, "username" => $username]);
        }

        if ($type == 'decline') {
            Urequest::findorFail($id)->update([
                'status' => 2
            ]);

            return redirect()->back()->with('success', 'Declined Successfully!');
        }
    }

    public function saverequest(Request $request)
    {
        $appno = $request->appno;
        $year  = $request->year;

        $save = Urequest::where('application', $appno)->where('year', $year)->where('userID', Auth::user()->id);

        if (count($save->get())) {
            return redirect()->back()->with('error', 'Submittion Failed. \nDuplicate application entry.');
        } else {
            $save->create([
                'userID' => Auth::user()->id,
                'application' => $appno,
                'year' => $year,
                'status' => 0
            ]);
        }






        return redirect()->back()->with('success', 'Application Submitted Successfully!');
    }
}
