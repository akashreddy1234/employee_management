<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'base_salary',
        'deductions',
        'bonuses',
        'payment_date'
    ];

    protected $casts = [
        'payment_date' => 'date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}