<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customers;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Project;
class Process extends Model
{
    use HasFactory;
    protected $fillable=[
        'project_id',
        'supplier_id',
        'product_id',
        'description',
        'qty',
        'sp',
        'pp',
        'LeadTime',
        'tolerance',
        'supplier_quotation_validity',
        'product_design',
        'cliche_die_cut',
        'approved_customer_quotation',
        'reason_for_rejection',
        'supplier_quotation',
        'purchase_contract_reference',
        'supplier_contract_status',
        'supplier_contract_date',
        'supplier_PO_rate',
        'customer_comments',
        'supplier_comments',
        'validity_s',
        'leadtime_s',
        'delivery_handling_s',
        'advance_payment_s',
        'tolerance_s',
        'printing_cost_s',
        'validity_c',
        'leadtime_c',
        'delivery_handling_c',
        'advance_payment_c',
        'tolerance_c',
        'printing_cost_c',
        'paid_amount',
    ];
    public function product(){
        return $this->hasOne(Product::class);
    }
    public function supplier(){
        return $this->hasOne(Supplier::class);
    }
    public function Project(){
        return $this->belongsTo(Project::class);
    }  
}
