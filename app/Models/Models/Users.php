<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Good;

class Users extends Model
{
    //テーブル名
    protected $teble = 'users';

    //可変事項
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function goods()
    {
        return $this->hasMany('App\Models\Models\Good');
    }
}
