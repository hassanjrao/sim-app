<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SystemSimImport;
use App\Models\SystemSim;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    public function index()
    {
        $systemSims=SystemSim::latest()->get();

        return view('admin.excel-uploads.index', compact('systemSims'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new SystemSimImport, $file);

        return redirect()->route("admin.upload-excel.index")->withToastSuccess('Successfully Uploaded!');
    }
}
