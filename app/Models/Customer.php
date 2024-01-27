<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'name','avatar','designation','email','phone','location','status','kvk','service','company','website','details'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class, 'customer_projects', 'customer_id', 'project_id');
    }
}



