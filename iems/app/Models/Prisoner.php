<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    protected $fillable = [
        'name',
        'national_id',
        'sentence_period',
        'admission_date',
        'date_to_be_released',
        'crime_id',
    ];

    protected $casts = [
        'admission_date' => 'date',
        'date_to_be_released' => 'date',
    ];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
    public function merits()
    {
        return $this->hasMany(Merit::class);
    }
    public function demerits()
    {
        return $this->hasMany(Demerit::class);
    }
}
