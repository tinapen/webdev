<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_email',
        'subject',
        'message',
        'user_id',
    ];

    public function userFeedback()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }
}
