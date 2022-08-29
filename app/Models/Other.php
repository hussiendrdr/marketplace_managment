<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    use HasFactory;
    protected $fillabe =[
        'material_color',
        'material_type',
        'quantity',
        'uom',
        'length',
        'width',
        'height',
        'thickness',
    ];
    public function product(){
        return $this->hasOne(Product::class);
    }
}
