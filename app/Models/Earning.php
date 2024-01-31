<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $primaryKey = 'earning_id';
    protected $fillable = ['customer_id','amount','tax','pay_status','pay_services','pay_date','pay_type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}