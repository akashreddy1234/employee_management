<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'salary',
        'role',
        'department_id',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
