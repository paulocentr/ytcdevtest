<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'document', 'status'];
    protected $appends = ['actionform', 'when'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function numbers()
    {
        return $this->hasMany(Number::class);
    }

    // getters
    public function getActionformAttribute()
    {
        return view('partials.customer_action_form', ['customer' => $this])->render();
    }

    public function getWhenAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
