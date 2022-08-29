<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carton_box extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'model',
        'print_type',
        'width',
        'height',
        'length',
        'effects',
        'material_type',


    ];
public function product(){
return $this->hasOne(Product::class);
}
}
