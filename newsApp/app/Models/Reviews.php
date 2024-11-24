<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table="reviews";
    protected $fillable = ['user_id', 'film_id', 'content', 'point' ];

    public function reviewBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
