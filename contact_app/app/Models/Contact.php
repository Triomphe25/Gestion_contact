<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'first_name',
        'email',
        'phone',
        'adress',
        'city',
        'postal_code',
        'country',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name}{$this->last_name}";
    }
}
