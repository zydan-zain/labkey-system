<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
        protected $fillable = [
        'student_id',
        'key_lab_id',
        'status',
        'foto',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function keyLab()
    {
        return $this->belongsTo(KeyLab::class);
    }

}
