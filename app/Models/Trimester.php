<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimester extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year',
    ];

    public function califications()
    {
        return $this->hasMany(Calification::class);
    }
}
