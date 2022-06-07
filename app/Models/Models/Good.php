<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    //テーブル名
    protected $teble = 'goods';

    //可変事項
    protected $fillable = [
        'user_id',
        'name_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ryokan()
    {
        return $this->belongsTo(Good::class);
    }
}
