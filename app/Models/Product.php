<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PaperBox;
use App\Models\PaperCup;
use App\Models\PaperBag;
use App\Models\PaperWrap;
use App\Models\PaperNabkins;
use App\Models\CorrugatedBox;
use App\Models\PlasticBag;
use App\Models\PlasticBox;
use App\Models\PlasticCup;
use App\Models\HandlePaperBag;
use App\Models\SachelBag;
use App\Models\SosWithoutHandleBag;
use App\Models\File;
use App\Models\Process;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
                        'product_class',
                        'product_name',
                        'model',
                        'additional_text',
                        'product_type',
                        'branding',
                        'print_colors',
                        'design_service',
                        'logistics_service',
                        ];

    public function corrugatedBox(){
        return $this->belongsTo(CorrugatedBox::class);
    }
    public function paperBox(){
        return $this->belongsTo(PaperBox::class);
    }
    public function handlePaperBag(){
        return $this->belongsTo(HandlePaperBag::class);
    }
    public function paperCup(){
        return $this->belongsTo(PaperCups::class);
    }
    public function paperWrap(){
        return $this->belongsTo(PaperWrap::class);
    }
    public function plasticCup(){
        return $this->belongsTo(PlasticCup::class);
    }
    public function plasticBag(){
        return $this->belongsTo(PlasticBag::class);
    }
    public function paperNabkins(){
        return $this->belongsTo(PaperNabkins::class);
    }
    public function sachelBag(){
        return $this->belongsTo(SachelBag::class);
    }
    public function sosBag(){
        return $this->belongsTo(SosWithoutHandleBag::class);
    }
    public function file(){
        return $this->hasMany(File::class);
    }
    public function process(){
        return $this->belongsTo(Process::class);
    }
    public function Wet_Wipes(){
        return $this->belongsTo(Wet_Wipes::class);
    }
    public function carton_box(){
        return $this->belongsTo(Carton_box::class);
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
