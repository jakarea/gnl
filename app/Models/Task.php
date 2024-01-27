<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'customer_id','project_id','title','priority','date','start_time','end_time','created_by','file','description'
    ];

    public function customers(){
        return $this->belongsToMany(Customer::class, 'customer_projects', 'project_id', 'customer_id');
    }
}
