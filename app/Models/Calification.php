<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calification extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'trimester_id',
        'note1',
        'note2',
        'note3',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function trimester()
    {
        return $this->belongsTo(Trimester::class);
    }
}
