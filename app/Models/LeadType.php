<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'lead_type_id';
    protected $fillable = ['name', 'slug'];
    protected $dates = ['deleted_at'];


    public function customers()
    {
        return $this->hasMany(Customer::class, 'lead_type_id');
    }
}
