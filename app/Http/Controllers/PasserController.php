<?php

namespace App\Http\Controllers;
use SpreadsheetReader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listpasser;


class PasserController extends Controller
{
    public function savepasser(Request $request){
      $appno = $request->appno;
      $name= $request->name;
      $school = $request->school;
        
      $check = Listpasser::where('appno',$appno);

      if(count($check->get()) >=1 ){
        return redirect()->back()->with('error','Saving failed! \n Duplicate application number!');
      }else {
        $check->create([
            'appno' =>$appno, 
            'name' =>$name, 
            'school' => $school
          ]);
      }
  

      return redirect()->back()->with('success','Data Saved Successfully!');
    }

    public function importlist(Request $request){
       $file = $request->file('file');
    
       if($file->move(public_path('temp'), $file->getClientOriginalName())){
        $targetDirectory = public_path('temp').'/'.$file->getClientOriginalName();

       
 
        $reader = new SpreadsheetReader($targetDirectory);
          foreach($reader as $key => $row){
                 $appno = $row[0];
                   $name = $row[1];
                   $school = $row[2];
                         echo $appno;
            }
 $reader->seek(); // close the file handle
 
    }
     

    }
}
