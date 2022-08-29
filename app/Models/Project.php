<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Process;
use App\Models\Customers;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        
    ];

    public function process(){
        return $this->hasMany(Process::class);
    }    
    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
