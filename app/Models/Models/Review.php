<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $teble = 'revies';

    //可変事項
    protected $fillable = [
        'user_id',
        'name_id',
        'comment'
    ];
}
