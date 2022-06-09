<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ryokan extends Model
{
    use HasFactory;

    //テーブル名
    protected $teble = 'ryokan';

    //可変事項
    protected $fillable = [
        'prefectures',
        'name',
        'description',
        'introduction',
        'access',
        'image',
        'up_file1',
        'up_file2',
        'up_file3'
    ];

    public function goods()
    {
        return $this->hasMany('App\Models\Models\Good', 'name_id');
    }

    public function isGoodedBy($user): bool {
        return Good::where('user_id', $user)->where('name_id', $this->id)->first() !==null;
    }
}
