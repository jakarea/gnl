<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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


    public function getRemainingDaysAttribute()
    {
        $now = Carbon::now();

        $startDate = Carbon::parse($this->start_date);
        if ($startDate->isPast()) {
            return $now->diffInDays($this->end_date);
        } else {
            return $now->diffInDays($startDate);
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'project_id');
    }
}
