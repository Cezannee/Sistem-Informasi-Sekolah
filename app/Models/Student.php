<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'birth_date',
        'phone',
        'address',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

}
