<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'subject_id',
        'course_setting_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function courseSetting(){
        return $this->belongsTo(CourseSetting::class, 'course_setting_id');
    }
}
