<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Models\Models\Users;

class UserTest extends TestCase
{
    /**
     * @test
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
}
