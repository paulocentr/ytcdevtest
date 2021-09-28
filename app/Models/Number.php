<?php

namespace App\Models;

use App\Traits\HasPreference;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use HasFactory, SoftDeletes, HasPreference;

    protected $fillable = ['customer_id', 'number', 'status'];
    protected $appends = ['actionform', 'when'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // getters
    public function getActionformAttribute()
    {
        return view('partials.number_action_form', ['customer' => $this->customer, 'number' => $this])->render();
    }

    public function getWhenAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
