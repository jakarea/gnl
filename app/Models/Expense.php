<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $primaryKey = 'expense_id';

    protected $fillable = [
        'title','pay_date','lead_type_id','amount','tax','type','description','file'
    ];
}
