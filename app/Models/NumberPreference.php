<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumberPreference extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['number_id', 'name', 'value'];
    protected $appends = ['actionform', 'when'];

    public function number()
    {
        return $this->belongsTo(Number::class);
    }

    // getters
    public function getActionformAttribute()
    {
        return view('partials.number_preference_action_form', ['customer' => $this->number->customer, 'number' => $this->number, 'preference' => $this])->render();
    }

    public function getWhenAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
