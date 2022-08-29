<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use PDF;

class EmpController extends Controller
{
    //
    public function index1() {
        return view ('contract.pcont');
    }
    public function download($id) {
        $data = Project::find($id);
        $pdf = \PDF::loadView('contract.pcont', compact('data'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->stream('contract.pdf');
    }

    public function index2() {
        return view ('contract.scont');
    }
    public function doownload($id) {
        $data = Project::find($id);
        $pdf = \PDF::loadView('contract.scont', compact('data'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->stream('contract.pdf');
    }
}
