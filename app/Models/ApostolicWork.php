<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApostolicWork extends Model
{
    use HasFactory;
    protected $guarded = null;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }
    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}
