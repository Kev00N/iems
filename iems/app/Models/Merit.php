<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merit extends Model
{
    use HasFactory;

    protected $fillable = [
        'prisoner_id',
        'description',
        'points',
    ];

    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class);
    }
}
