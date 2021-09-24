<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id', 'number', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function preferences()
    {
        return $this->hasMany(NumberPreference::class);
    }
}
