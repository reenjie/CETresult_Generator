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
        $fname = $request->fname;
        $mname = $request->fname;
        $lname = $request->fname;
        $ep = $request->ep;
        $rc = $request->rc;
        $sps = $request->sps;
        $qs = $request->qs;
        $ats = $request->ats;
        $oar = $request->oar;
        $school = $request->school;
        $status = $request->status;
        $year = $request->year;

        $check = Listpasser::where('appno', $appno);

        if (count($check->get()) >= 1) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Saving failed! \n Duplicate application number!'
                );
        } else {
            $check->create([
                'appno' => $appno,
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'ep' => $ep,
                'rc' => $rc,
                'sps' => $sps,
                'qs' => $qs,
                'ats' => $ats,
                'oar' => $oar,
                'school' => $school,
                'status' => $status,
                'year' => $year,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Data Saved Successfully!');
    }

    public function importlist(Request $request)
    {
        try {
            $file = $request->file('file');
            $year = $request->year;

            if (
                $file->move(public_path('temp'), $file->getClientOriginalName())
            ) {
                $targetDirectory =
                    public_path('temp') . '/' . $file->getClientOriginalName();

                $reader = ReaderEntityFactory::createReaderFromFile(
                    $targetDirectory
                );

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
                    $ep ='';
                    $rc ='';
                    $sps='';
                    $qs='';
                    $ats='';
                    $oar='';
                    $status='';
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
                            case 3:
                                $ep =$value;
                                break;
                            case 4:
                                $rc =$value;
                                break;
                            case 5:
                              $sps=$value;
                                break;
                            case 6:
                              $qs =$value;
                                break;
                            case 7:
                              $ats=$value;
                                break;
                            case 8:
                              $oar =$value;
                                break;
                            case 9:
                              $status =$value;
                                break;
                        }
                    }
                    // if ($column > 3) {
                    //   unlink($targetDirectory);
                    //   return redirect()->back()->with('error', 'Theres a problem with importing , Some files were imported some were not. \n Please follow the right format of a file. \n Example : \n Application no | Name | School | Ratings | Status');
                    // }

                     $check = Listpasser::where('appno', $appno)->where('year',$year);

                    if (count($check->get()) >= 1) {
                    } else {
                        $nameParts = explode(', ', $name);
                        $lastName = $nameParts[0];
                        $firstNameMiddleName = $nameParts[1];
                        list($firstName, $middleName) = explode(
                            ' ',
                            $firstNameMiddleName,
                            2
                        );

                        $check->create([
                            'appno' => $appno,
                            'fname' => $firstName,
                            'mname' => $middleName,
                            'lname' => $lastName,
                            'ep' => $ep,
                            'rc' => $rc,
                            'sps' => $sps,
                            'qs' => $qs,
                            'ats' => $ats,
                            'oar' => $oar,
                            'school' => $school,
                            'status' => $status,
                            'year' => $year,
                        ]);
                    }
                }

                unlink($targetDirectory);
                return redirect()
                    ->back()
                    ->with('success', 'Data imported Succesfully!');
            }
        } catch (\Throwable $th) {
            // return redirect()
            //     ->back()
            //     ->with(
            //         'error',
            //         'Theres a problem with importing. \n Please follow the right format of a file. \n For Example : \n Application no | Name | School'
            //     );

            return $th;
        }
    }

    public function download(Request $request)
    {
        $filename = $request->filename;
        //   if($request->template){
        //          $path = public_path('../excel/template/').$filename;
        //   }else {
        //        $path = public_path('/excel/').$filename;
        //   }

        if ($request->template) {
            $path = resource_path('template/') . $filename;
        } else {
            $path = resource_path('excel/') . $filename;
        }

        if (!file_exists($path)) {
            abort(404);
        }
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => filesize($path),
            'Cache-Control' => 'private, max-age=0, must-revalidate',
            'Pragma' => 'public',
        ];

        return response()->download($path, $filename, $headers);
    }
}
