<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RehabilitatedPrisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'prisoner_id',
        'rehabilitated',
    ];

    protected $casts = [
        'rehabilitated' => 'boolean',
    ];

    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class);
    }

    public function canBeSubmitted()
    {
        $prisoner = $this->prisoner;

        if (!$prisoner || !$prisoner->admission_date || !$prisoner->date_to_be_released) {
            return false;
        }

        $admissionDate = Carbon::parse($prisoner->admission_date);
        $dateToBeReleased = Carbon::parse($prisoner->date_to_be_released);

        $sentencePeriod = $admissionDate->diffInDays($dateToBeReleased);
        $eightyPercentSentencePeriod = 0.8 * $sentencePeriod;

        // Calculate the date when 80% of the sentence period has passed
        $eightyPercentDate = $admissionDate->copy()->addDays($eightyPercentSentencePeriod);

        // Check if the current date is after 80% of the sentence period
        if (Carbon::now()->isBefore($eightyPercentDate)) {
            return false;
        }

        if ($prisoner->merits()->count() == 0) {
            return false;
        }

        if ($prisoner->demerits()->count() > 0) {
            return false;
        }

        return true;
    }
}
