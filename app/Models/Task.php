<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    // Accessor to convert end_date to a Carbon instance
    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the restoring event
        static::restoring(function ($task) {
            // Set the status to "active" when restoring
            $task->status = 'active';
        });
    }

    public function getYearStartMonth()
    {
        $year = Carbon::parse($this->year)->format('Y') ?? "";
        $month = Carbon::parse($this->start_month)->format('F') ?? "";
        $day = Carbon::parse($this->start_month)->format('jS') ?? "";

        return $day . ' ' . $month . ' ' . $year;
    }

}
