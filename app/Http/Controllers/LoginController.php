<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Users;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * ログインページ表示
     * 
     * @return view
     */
    public function showLogin()
    {
        return view('login_page.login');
    }

    /**
     * ログインする
     * @param array $request
     * @return redirect
     */
    public function ryokanSignup(UserRequest $request)
    {
        $user = Users::where('email', $request->email)->get();
        
        if(Hash::check($request->password,$user[0]->password)) {
            session(['id'  => $user[0]->id]);
            session(['name'  => $user[0]->name]);
            session(['email' => $user[0]->email]);

            return redirect(route('ryokan'));
        } else {
            \Session::flash('err_msg', 'メールアドレスとパスワードが一致しません。');
            return redirect(route('show'));
        } 
        
    }

    /**
     * ユーザ登録画面表示
     * 
     * @return view
     */
    public function userCreate()
    {
        return view('login_page.register');
    }

    /**
     * ユーザを新規登録する
     * @param array $request
     * @return redirect
     */
    public function userRegister(UserRequest $request)
    {    
        //ユーザのデータを受け取る
        $inputs = $request->all();

        //パスワードハッシュ化
        $inputs['password'] = Hash::make($inputs['password']);
        \DB::beginTransaction();
        try {
            //ユーザの登録
            Users::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '登録完了しました。');
            return redirect(route('show'));
    }

    /**
     * パスワード再設定画面画面表示
     * 
     * @return view
     */
    public function userPass()
    {
        return view('login_page.reset');
    }

    /**
     * パスワード再設定画面画面表示
     * 
     * @return redirect
     */
    public function passReset(UserRequest $request)
    {

        
        \Session::flash('err_msg', 'パスワード再設定が完了しました。');
            return redirect(route('show'));
    }
}
