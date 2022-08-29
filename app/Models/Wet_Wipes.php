<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wet_Wipes extends Model
{
    use HasFactory;
    protected $fillable=[
        'length',
        'width',
        'material',


];
public function product(){
return $this->hasOne(Product::class);
}
}
