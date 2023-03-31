<?php

namespace App\Http\Controllers;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listpasser;


class PasserController extends Controller
{
  public function savepasser(Request $request)
  {
    $appno = $request->appno;
    $name = $request->name;
    $school = $request->school;
    $rating = $request->rating;
    $status = $request->status;
    $year   = $request->year;

    $check = Listpasser::where('appno', $appno);

    if (count($check->get()) >= 1) {
      return redirect()->back()->with('error', 'Saving failed! \n Duplicate application number!');
    } else {
      $check->create([
        'appno' => $appno,
        'name' => $name,
        'school' => $school,
        'rating' => $rating,
        'status' => $status,
        'year'  => $year
      ]);
    }


    return redirect()->back()->with('success', 'Data Saved Successfully!');
  }

  public function importlist(Request $request)
  {
    try {
      $file = $request->file('file');

      if ($file->move(public_path('temp'), $file->getClientOriginalName())) {
        $targetDirectory = public_path('temp') . '/' . $file->getClientOriginalName();

        $reader = ReaderEntityFactory::createReaderFromFile($targetDirectory);


        $reader->open($targetDirectory);


        $rawData = '';
        $data = [];


        foreach ($reader->getSheetIterator() as $sheet) {


          foreach ($sheet->getRowIterator() as $row) {
            $cells = $row->toArray();
            $rawData .= implode("\t", $cells) . "\n";
          }
        }

        $reader->close();


        $rows = explode("\n", trim($rawData));


        $data = [];
        foreach ($rows as $row) {
          $cells = explode("\t", trim($row));
          $data[] = $cells;
          $column = count($cells);
          $appno = '';
          $name = '';
          $school = '';
          foreach ($cells as $key => $value) {

            switch ($key) {
              case 0:
                $appno = $value;
                break;

              case 1:
                $name = $value;
                break;
              case 2:
                $school = $value;
                break;
            }
          }
          if ($column > 3) {
            unlink($targetDirectory);
            return redirect()->back()->with('error', 'Theres a problem with importing , Some files were imported some were not. \n Please follow the right format of a file. \n Example : \n Application no | Name | School | Ratings | Status');
          }
          $check = Listpasser::where('appno', $appno);

          if (count($check->get()) >= 1) {
          } else {
            $check->create([
              'appno' => $appno,
              'name' => $name,
              'school' => $school,
              'rating' => '',
              'status' => '',
              'year'   => ''
            ]);
          }
        }



        unlink($targetDirectory);
        return redirect()->back()->with('success', 'Data imported Succesfully!');
      }
    } catch (\Throwable $th) {
      return redirect()->back()->with('error', 'Theres a problem with importing. \n Please follow the right format of a file. \n For Example : \n Application no | Name | School');
    }
  }
}
