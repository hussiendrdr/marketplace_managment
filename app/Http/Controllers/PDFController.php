<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Process;
use PDFF;

class PDFController extends Controller
{

    public function download($id) {
        
        $prc = Process::find($id);
        $data = Project::find($prc->project_id);
        $fileName = 'contract.pdf';
        
        $mpdf = new \Mpdf\Mpdf();
        
        $htmlhead = \View::make('contract.header');
        $htmlfoot = \View::make('contract.footer');

        $mpdf->SetHtmlHeader($htmlhead);
        $mpdf->SetHtmlFooter($htmlfoot);

          
        $html = \View::make('contract.pcont' , compact('data','prc'));
        
        
        
        $mpdf->autoLangToFont = true;

        $mpdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        5, // margin_left
        5, // margin right
        20, // margin top
        30, // margin bottom
        7, // margin header
        5); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName , 'I');
    }

    public function doownload($id) {
        $prc = Process::find($id);
        $data = Project::find($prc->project_id);
        
        $fileName = 'contract.pdf';

        $mpdf = new \Mpdf\Mpdf();
        
        $htmlhead = \View::make('contract.headers');
        $htmlfoot = \View::make('contract.footer');

        $mpdf->SetHtmlHeader($htmlhead);
        $mpdf->SetHtmlFooter($htmlfoot);
        
        $html = \View::make('contract.scont')->with('data',$data);
        
        
        $mpdf->autoLangToFont = true;
        $mpdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        5, // margin_left
        5, // margin right
        20, // margin top
        30, // margin bottom
        7, // margin header
        5); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName , 'I');
    }

}