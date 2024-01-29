<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';

    protected $fillable = [
        'title', 'thumbnail', 'amount', 'tax', 'start_date', 'note', 'end_date', 'priority', 'description', 'status'
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_projects', 'project_id', 'customer_id');
    }
}
