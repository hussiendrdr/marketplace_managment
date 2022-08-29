<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PaperCup;
use App\Models\PaperBox;
use App\Models\PaperWrap;
use App\Models\PaperNabkins;
use App\Models\CorrugatedBox;
use App\Models\PlasticBag;
use App\Models\PlasticCups;
use App\Models\SachelBag;
use App\Models\SosWithoutHandleBag;
use App\Models\HandlePaperBag;
use App\Models\Other;
use App\Models\File;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;



class prodStatisticController extends Controller
{
    public function productStatistics()
    { 
        return view('productStatistics');
    }

     public function Statistics()
     {
         $Papercup=DB::select('select * from paper_cups');
        //  dd($Papercup);
        return view('prodStatistic.paper_cups',compact('Papercup'));
     }
     public function Statistics1()
     {
         $PlasticCup=DB::select('select * from plastic_cups');
        //  dd($PlasticCup);
         return view('prodStatistic.plastic_cups',compact('PlasticCup'));
        
     }
     public function Statistics2()
     {
         $PaperBox=DB::select('select * from paper_boxes');
        //  dd($PaperBox);
         return view('prodStatistic.paper_boxes',compact('PaperBox'));
     
     }
     public function Statistics3()
     {
         $handle_paper_bags=DB::select('select * from handle_paper_bags');
        //  dd($handle_paper_bags);
         return view('prodStatistic.handle_paper_bags',compact('handle_paper_bags'));
    
     }
     public function Statistics4()
     {
         $PlasticBag=DB::select('select * from plastic_bags');
        //  dd($PlasticBag);
         return view('prodStatistic.plastic_bags',compact('PlasticBag'));
         
     }
     public function Statistics5()
     {
        
         $SachalBag=DB::select('select * from sachel_bags');
        //  dd($SachalBag);
         return view('prodStatistic.sachel_bags',compact('SachalBag'));
         
     }
     public function Statistics6()
     {
        
         $SOSWithoutHandleBag=DB::select('select * from sos_without_handle_bags');
        //  dd($SOSWithoutHandleBag);
         return view('prodStatistic.sos_without_handle_bags',compact('SOSWithoutHandleBag'));
      
     }
     public function Statistics7()
     {
         $PaperWrap=DB::select('select * from paper_wraps');
        //  dd($PaperWrap);
         return view('prodStatistic.paper_wraps',compact('PaperWrap'));
       
     }
     public function Statistics8()
     {

         $PaperNapkin=DB::select('select * from paper_nabkins');
        //  dd($PaperNapkin);
         return view('prodStatistic.paper_nabkins',compact('PaperNapkin'));
  
     }
     public function Statistics9()
     {

         $corrugatedBox=DB::select('select * from carton_boxes');
        //  dd($corrugatedBox);
         return view('prodStatistic.corrugated_boxes',compact('corrugatedBox'));
       
     }
     public function Statistics10()
     {
       
         $others=DB::select('select * from others');
         return view('prodStatistic.others',compact('others'));
     }
     
}
