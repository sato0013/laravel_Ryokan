<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Users;
use App\Models\Models\Ryokan;
use App\Models\Models\Good;

class GoodController extends Controller
{
    public function ryokanGood(Request $request)
    {
        $user_id = $request->user_id;
        $name_id = $request->name_id;
        $already_good = Good::where('user_id', $user_id)->where('name_id', $name_id)->first();
        //dd($already_good);
        if(!$already_good) {
            $good = new Good;
            $good->name_id = $name_id;
            $good->user_id = $user_id;
            $good->save();
        } else {
            Good::where('name_id', $name_id)->where('user_id', $user_id)->delete();
        }
        //dd($good);
        $ryokan_goods_count = Ryokan::withCount('goods')->findOrFail($name_id)->goods_count;
        $param = [
            'ryokan_goods_count' => $ryokan_goods_count
        ];
        //dd($param);
        return response()->json($param);
    }
}
