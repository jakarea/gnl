<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';

    protected $fillable = ['lead_type_id','service_type_id',
        'name','avatar','designation','email','phone','location','status','kvk','company','website','details'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class, 'customer_projects', 'customer_id', 'project_id');
    }

    public function serviceTypes()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id','customer_id');
    }
}



