<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $primaryKey = 'lead_id';

    protected $fillable = [
        'avatar', 'name', 'lead_type_id', 'phone', 'email', 'linkedin',
        'instagram', 'company', 'website', 'kvk', 'state','lead_order','status','note'
    ];

    public function leadType()
    {
        return $this->belongsTo(LeadType::class, 'lead_type_id');
    }
}
