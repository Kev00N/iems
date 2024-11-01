<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrisonerTotalPoints extends Model
{
    protected $fillable = [
        'prisoner_id',
    ];

    protected $appends = ['totalPoints'];

    public function getTotalPointsAttribute()
    {
        $meritsPoints = $this->merits()->sum('points');
        $demeritsPoints = $this->demerits()->sum('points');

        $totalPoints = $meritsPoints - $demeritsPoints;

        $rehabilitatedRecordExists = RehabilitatedPrisoner::where('prisoner_id', $this->prisoner_id)->exists();

        if ($rehabilitatedRecordExists) {
            $totalPoints += 100000;
        }

        return $totalPoints;
    }

    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class);
    }

    public function merits()
    {
        return $this->hasMany(Merit::class, 'prisoner_id', 'prisoner_id');
    }

    public function demerits()
    {
        return $this->hasMany(Demerit::class, 'prisoner_id', 'prisoner_id');
    }
}
