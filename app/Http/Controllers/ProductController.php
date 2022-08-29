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
use App\Models\Carton_box;

use App\Models\Wet_Wipes;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $products=Product::all();
        return view ('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('product.create');
    }
    public function create2(Request $request)
    {
        // dd($request);
        $request->validate([
            'type'=>'required',
        ]);
        $type=$request->type;
        $type = strtolower($type);
        // dd($type);
        // get product type
        if(Str::contains($type, 'other')){
            $type=str_replace('others.','',$type);
            // dd($type);
            return view ('product.others.create',compact('type') );
        }
        $str='product.'.$type.'.create';
        return view ($str,compact('type') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request$request,$id)
    {
        $product = Product::find($id);
        $pid=$product->id;
        $product_columns=DB::getSchemaBuilder()->getColumnListing('products');
        $category_columns=DB::getSchemaBuilder()->getColumnListing($product->product_class);
        
        $pcount=count($product_columns)-1;
        $files=File::where('product_id','=',$pid)->get();
        $fcount=count($files)-1;
        // dd($files);
        // dd($product_columns,$pcount);
        $ccount=count($category_columns)-1;
        unset($category_columns[0]);
        unset($category_columns[1]);
        unset($category_columns[$ccount]);
        unset($category_columns[$ccount-1]);
        $ccount=count($category_columns);
        // dd($category_columns,$ccount);
        // dd($product->product_class);
        $file=File::where("product_id","=",$id);
        $name=$request->getHttpHost();
        switch ($product->product_class) {
            case 'paper_cups':
                $cat=PaperCup::where('product_id','=',$pid)->first();
                break;
            case 'paper_boxes':
                $cat=PaperBox::where('product_id','=',$pid)->first();
                break;
            case 'paper_wraps':
                $cat=PaperWrap::where('product_id','=',$pid)->first();
                break;
            case 'paper_nabkins':
                $cat=PaperNabkins::where('product_id','=',$pid)->first();
                break;
            case 'plastic_cups':
                $cat=PlasticCups::where('product_id','=',$pid)->first();
                break;
            case 'handle_paper_bags':
                $cat=HandlePaperBag::where('product_id','=',$pid)->first();
                // dd(json_decode($cat->effects));
                break;
            case 'sos_without_handle_bags':
                $cat=SosWithoutHandleBag::where('product_id','=',$pid)->first();
                break;
            case 'plastic_bags':
                $cat=PlasticBag::where('product_id','=',$pid)->first();
                break;
            case 'sachel_bag':
                $cat=SachelBag::where('product_id','=',$pid)->first();
                break;
            case 'corrugated_boxes':
                $cat=CorrugatedBox::where('product_id','=',$pid)->first();
                break;
            case 'wet_wipes':
                    $cat=Wet_Wipes::where('product_id','=',$pid)->first();
                    break;
            case 'carton_box':
                    $cat=Carton_box::where('product_id','=',$pid)->first();
                    break;
            default:
                $cat=Other::where('product_id','=',$pid)->first();
                return view('product.show',compact('product','product_columns','pcount','category_columns','ccount','cat','files','fcount','name'));
                break;
        }
        return view('product.show',compact('product','product_columns','pcount','category_columns','ccount','cat','files','fcount','name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($product);
        // find if other substring contained in string {{{{{{{   others.kapocsjadjs   }}}}}}}
        $product = Product::find($id);
        $pid=$product->id;
        $class=$product->product_class;
        $type=str_replace('_',' ',$class);
        if($class == "wet wipes"){
            $type=str_replace(' ','_',$class);
            $class=$type;
        }
        // dd($type);
        $files=File::where('product_id','=',$pid)->get();
        // dd($files);
        // dd($type);
        switch ($class) {
            case 'paper_cups':
                $paperCup=PaperCup::where('product_id','=',$pid)->first();
                // dd($paperCup);
                return view('product.'.$class.'.edit',compact('product','paperCup','type','files'));
                break;
            case 'paper_boxes':
                $paperBox=PaperBox::where('product_id','=',$pid)->first();
                return view('product.paper_boxes.edit',compact('product','paperBox','type','files'));
                break;
            case 'paper_wraps':
                $paperWrap=PaperWrap::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','paperWrap','type','files'));
                break;
            case 'wet_wipes':                    
                $Wet_Wipes=Wet_Wipes::where('product_id','=',$pid)->first();
                
                return view('product.'.$class.'.edit',compact('product','Wet_Wipes','type','files'));
                break;
            case 'paper_nabkins':
                $paperNabkin=PaperNabkins::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','paperNabkin','type','files'));
                break;
            case 'plastic_cups':
                $plasticCup=PlasticCups::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','plasticCup','type','files'));
                break;
            case 'handle_paper_bags':
                $handlePaperBag=HandlePaperBag::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','handlePaperBag','type','files'));
                break;
            case 'sos_without_handle_bags':
                $sosWithoutHandleBag=SosWithoutHandleBag::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','sosWithoutHandleBag','type','files'));
                break;
            case 'plastic_bags':
                $plasticBag=PlasticBag::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','plasticBag','type','files'));
                break;
            case 'sachel_bag':
                $sachelBag=SachelBag::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','sachelBag','type','files'));
                break;
            case 'corrugated_boxes':
                $corrugatedBox=CorrugatedBox::where('product_id','=',$pid)->first();
                return view('product.'.$class.'.edit',compact('product','corrugatedBox','type','files'));
                break;
            
            case 'carton_box':
                $Carton_box=Carton_box::where('product_id','=',$pid)->first();
                return view('product.carton_box.edit',compact('product','Carton_box','type','files'));
                break;
            case 'others':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;
             case 'paper_plate':
                    $other=Other::where('product_id','=',$pid)->first();
                    $type=str_replace('_',' ',$class);
                    // dd($class);
                    return view('product.others.edit',compact('product','other','type','files'));
                    break;
            case 'platic_plate':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;
            case 'paper_lid':
            $other=Other::where('product_id','=',$pid)->first();
            $type=str_replace('_',' ',$class);
            // dd($class);
            return view('product.others.edit',compact('product','other','type','files'));
            break;

            case 'plastic_lid':
            $other=Other::where('product_id','=',$pid)->first();
            $type=str_replace('_',' ',$class);
            // dd($class);
            return view('product.others.edit',compact('product','other','type','files'));
            break;

            case 'cup_holder_plate':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'paper_sleeve':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'cartoon_sleeve':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'plastic_container':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'paper_sticker':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'plastic_sticker':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'paper_bowl':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'plastic_cutleries':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

            case 'plastic_spoon':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

                
            case 'plastic_knife':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;


                         
            case 'plastic_straw':
                $other=Other::where('product_id','=',$pid)->first();
                $type=str_replace('_',' ',$class);
                // dd($class);
                return view('product.others.edit',compact('product','other','type','files'));
                break;

  
            case 'printing_cliché':
            $other=Other::where('product_id','=',$pid)->first();
            $type=str_replace('_',' ',$class);
            // dd($class);
            return view('product.others.edit',compact('product','other','type','files'));
            break;
                default:
                    # code...
                    break;
        }
        // return view('product.'.$class.'.edit',compact('product','plasticCup','type','files'));
        return view('product.'.$class.'.edit',compact('product','type','files'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
