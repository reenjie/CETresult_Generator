<?php

namespace App\Http\Controllers;

use App\Models\URequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;

class URequestController extends Controller
{
    public function saveclearanceRequest(Request $request)
    {
        $lname = $request->lname;
        $fname = $request->fname;
        $mname = $request->mname;
        $address = $request->address;
        $ctn = $request->ctn;
        $purpose = $request->purpose;

        User::where('id', Auth::user()->id)->update([
            'fname' => $fname,
            'lname' => $lname,
            'mname' => $mname,
            'address' => $address,
            'com_tax_number' => $ctn,
        ]);

        URequest::create([
            'userid' => Auth::user()->id,
            'request' => 0,
            'status' => 0,
            'purpose' => $purpose,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Request submitted successfully!');
    }

    public function saveidRequest(Request $request)
    {
        $lname = strtoupper($request->lname);
        $fname = strtoupper($request->fname);
        $mname = strtoupper($request->mname);
        $gender = strtoupper($request->gender);
        $Bdate = $request->Bdate;
        $address = strtoupper($request->address);
        $tin = $request->tin;
        $gsis = $request->gsis;

        User::where('id', Auth::user()->id)->update([
            'fname' => $fname,
            'lname' => $lname,
            'mname' => $mname,
            'gender' => $gender,
            'birthdate' => date('Y-m-d', strtotime($Bdate)),
            'address' => $address,
            'tin' => $tin,
            'gsis' => $gsis,
        ]);

        URequest::create([
            'userid' => Auth::user()->id,
            'request' => 1,
            'status' => 0,
            'purpose' => '',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Request submitted successfully!');
    }

    public function savecertificateRequest(Request $request){
        $lname = $request->lname;
        $fname = $request->fname;
        $mname = $request->mname;
        $address = $request->address;

        User::where('id', Auth::user()->id)->update([
            'fname' => $fname,
            'lname' => $lname,
            'mname' => $mname,
            'address' => $address,
        ]);

        URequest::create([
            'userid' => Auth::user()->id,
            'request' => 2,
            'status' => 0,
            
        ]);

        return redirect()
            ->back()
            ->with('success', 'Request submitted successfully!');
    }

    public function changestatus(Request $request){
        
        $status = $request->status;
        $id     = $request->id;
        $statusmessage='';
        switch ($status) {
            case 'approve':
                # 1
                URequest::findorFail($id)->update([
                    'status' => 1, 
                ]);
               $statusmessage = "Request approved successfully!";
            break;

            case 'decline':
                # 2
                URequest::findorFail($id)->update([
                    'status' => 2, 
                ]);
                $statusmessage = "Request declined successfully!";
            break;
            
          
        }
        return redirect()
        ->back()
        ->with('success', $statusmessage);

       
    }

    public function downloadfile(Request $request){

     $type = $request->type;
     $issued_date = $request->issued_date;
     $purpose = $request->purpose;
      if($type == 0){
            /* Clearance template  */
        $file_path = public_path('template/clearancetemp.docx');
        if (!file_exists($file_path)) {
            abort(404);
        }

        if (!is_writable($file_path)) {
            abort(404);
        }

        $template = new TemplateProcessor($file_path);
        $template->setValue('username', Auth::user()->fname . ' ' . Auth::user()->mname . ' ' . Auth::user()->lname);
        $template->setValue('completeaddress', Auth::user()->address);
        $template->setValue('ctn', Auth::user()->com_tax_number);
        $template->setValue('issueddate',date('F j,Y',strtotime($issued_date)));
        $template->setValue('purpose',$purpose);
        $template->setValue('revisedissueddate',date('jS \d\a\y \o\f\ F , Y',strtotime($issued_date)));

        
        $template->saveAs(public_path('template/' . Auth::user()->lname . '_clearance.docx'));
        return response()->download(public_path('template/' . Auth::user()->lname . '_clearance.docx'))->deleteFileAfterSend();
        }else if($type == 2) {
            /*  Certification Template*/

              $file_path = public_path('template/certificatetemp.docx');
        if (!file_exists($file_path)) {
            abort(404);
        }

        if (!is_writable($file_path)) {
            abort(404);
        }

        $template = new TemplateProcessor($file_path);
        $template->setValue('name', Auth::user()->fname . ' ' . Auth::user()->mname . ' ' . Auth::user()->lname);
        $template->setValue('age', date('Y') - date('Y',strtotime(Auth::user()->birthdate)));
        $template->setValue('birthdate', date('F j,Y',strtotime(Auth::user()->birthdate)));
        $template->setValue('completeaddress',Auth::user()->address);
        $template->setValue('secondperson',"person");
        $template->setValue('reviseddate',date('jS \d\a\y \o\f\ F , Y',strtotime($issued_date)));
        $template->saveAs(public_path('template/' . Auth::user()->lname . '_certificate.docx'));
        return response()->download(public_path('template/' . Auth::user()->lname . '_certificate.docx'))->deleteFileAfterSend();
        }
      
       
    }
}
