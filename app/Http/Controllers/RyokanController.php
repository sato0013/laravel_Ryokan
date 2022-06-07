<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Ryokan;
use App\Models\Models\Good;
use App\Http\Requests\RyokanRequest;
use RakutenRws_Client;
use Illuminate\Support\Facades\Http;

class RyokanController extends Controller
{
    /**
     * メインページ表示
     */
    public function index()
    {
        return view('main_page.main');
    }

    /**
     * 福岡県の温泉一覧を表示する
     * 
     * @return view
     */
    public function hukuokaList()
    {
        $hukuoka = Ryokan::where('prefectures', '福岡県')->get();
        
        return view('main_page.hukuoka', ['hukuoka' => $hukuoka]);
    }

    /**
     * 佐賀県の温泉一覧を表示する
     * 
     * @return view
     */
    public function sagaList()
    {
        $saga = Ryokan::where('prefectures', '佐賀県')->get();
        
        return view('main_page.saga', ['saga' => $saga]);
    }

    /**
     * 長崎県の温泉一覧を表示する
     * 
     * @return view
     */
    public function nagasakiList()
    {
        $nagasaki = Ryokan::where('prefectures', '長崎県')->get();
        
        return view('main_page.nagasaki', ['nagasaki' => $nagasaki]);
    }

    /**
     * 熊本の温泉一覧を表示する
     * 
     * @return view
     */
    public function kumamotoList()
    {
        $kumamoto = Ryokan::where('prefectures', '熊本県')->get();
        
        return view('main_page.kumamoto', ['kumamoto' => $kumamoto]);
    }

    /**
     * 大分県の温泉一覧を表示する
     * 
     * @return view
     */
    public function oitaList()
    {
        $oita = Ryokan::where('prefectures', '大分県')->get();
        
        return view('main_page.oita', ['oita' => $oita]);
    }

    /**
     * 宮崎県の温泉一覧を表示する
     * 
     * @return view
     */
    public function miyazakiList()
    {
        $miyazaki = Ryokan::where('prefectures', '宮崎県')->get();
        
        return view('main_page.miyazaki', ['miyazaki' => $miyazaki]);
    }

    /**
     * 鹿児島県の温泉一覧を表示する
     * 
     * @return view
     */
    public function kagosimaList()
    {
        $kagosima = Ryokan::where('prefectures', '鹿児島県')->get();
        
        return view('main_page.kagosima', ['kagosima' => $kagosima]);
    }

    /**
     * 旅館の詳細画面を表示する
     * @param int $id
     * @return view
     */
    public function ryokanDetail($id)
    {
        $ryokan = Ryokan::find($id);

        if(is_null($ryokan)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ryokan'));
        }

        $goods_count = Good::count('name_id', $id);
        $param = [
            'goods_count' => $goods_count,
        ];
        //dd($param);
        return view('main_page.detail', ['ryokan' => $ryokan, 'param' => $param]);
    }

    /**
     * 旅館登録画面を表示する
     * 
     * @return view
     */
    public function ryokanCreate()
    {   
        return view('admin_page.ryokan_signup');
    }

    /**
     * 旅館を登録する
     * 
     * @return redirect
     */
    public function exeStore(RyokanRequest $request)
    {   
        //旅館のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //旅館の登録
            Ryokan::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '旅館を登録しました。');
            return redirect(route('ryokan'));
    }

    /**
     * 旅館編集画面を表示する
     * @param int $id
     * @return view
     */
    public function ryokanEdit($id)
    {   
        $ryokan = Ryokan::find($id);

        if(is_null($ryokan)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ryokan'));
        }

        return view('admin_page.edit', ['ryokan' => $ryokan]);
    }

    /**
     * 旅館を更新する
     * 
     * @return redirect
     */
    public function exeUpdata(RyokanRequest $request)
    {   
        //旅館のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //旅館の更新
            $ryokan = Ryokan::find($inputs['id']);
            $ryokan->fill([
                'prefectures' => $inputs['prefectures'],
                'name' => $inputs['name'],
                'description' => $inputs['description'],
                'introduction' => $inputs['introduction'],
                'access' => $inputs['access'],
                'image' => $inputs['image'],
                'up_file1' => $inputs['up_file1'],
                'up_file2' => $inputs['up_file2'],
                'up_file3' => $inputs['up_file3']
            ]);
            $ryokan->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '旅館を更新しました。');
            return redirect(route('ryokan'));
    }

    /**
     * 旅館を削除する
     * @param int $id
     * @return redirect
     */
    public function exeDelete($id)
    {   
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ryokan'));
        }

        try {
            //旅館削除
            Ryokan::destroy($id);
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '旅館を削除しました。');
        return redirect(route('ryokan'));    
    }

    /**
     * マイページを表示する
     * @param int $id
     * @return view
     */
    public function ryokanGood($id)
    {
        $mydata = Good::where('user_id', $id)->pluck('name_id');
        $myryokan = [];
//dd($mydata->isEmpty(), !$mydata->count(), empty($mydata->all()));
        if($mydata->isEmpty()) {
            \Session::flash('err', 'いいねした旅館はありません。');
        } else {
            $myryokan = Ryokan::find($mydata);
        }


        return view('main_page.mypage', ['myryokan' => $myryokan]);
    }

    /**
     * 楽天APIを使って予約画面に
     */
    public function rakuten($name) 
    {
        $api_url = "https://app.rakuten.co.jp/services/api/Travel/KeywordHotelSearch/20170426?format=xml&keyword=$name&applicationId=1039418060021024167";
 
        $data = file_get_contents($api_url);
        $data = str_replace('KeywordHotelSearch:KeywordHotelSearch', 'KeywordHotelSearch', $data);
        $r_travel = simplexml_load_string($data);
        //dd($r_travel);
        //dd($r_travel->hotels->hotel->hotelBasicInfo);
        foreach($r_travel->hotels->hotel->hotelBasicInfo as $hotel){
            //dd($hotel->hotelInformationUrl);
        }
        return redirect($hotel->hotelInformationUrl);
    }
}

