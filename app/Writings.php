<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writings extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'entry',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeUserWritings($query)
    {
        return $query->where('user_id', auth()->user()->id ?? null);
    }
}
