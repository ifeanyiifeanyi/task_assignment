<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

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

}
