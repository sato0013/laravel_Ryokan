<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Review;
use App\Models\Models\Ryokan;
use App\Models\Models\Users;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * コメントを表示する
     * @param int $id
     * @return view
     */
    public function ryokanReview($id)
    {
        $comments = Review::where('name_id', $id)->pluck('comment');
        $users = Review::where('name_id', $id)->pluck('user_id');
        $ryokandata = [];
        $data = [];
        $name = '';
        $ryokandata = Ryokan::find($id);

        if($comments->isEmpty()) {
            \Session::flash('errs', 'レビューはありません。');
        } else {
            foreach($users as $user) {
                $data[] = Users::find($user);
            }
            $name = array_column($data, 'name');
        }
        //dd($comments);
        return view('main_page.review', ['comments' => $comments, 'ryokandata' => $ryokandata, 'name' => $name]);
        
    }

    /**
     * レビューを投稿画面を表示
     * 
     * @return view
     */
    public function reviewForm($ryokandata)
    {
        return view('main_page.review_form', ['ryokandata' => $ryokandata]);
    }

    /**
     * レビューを投稿する
     * 
     * @return view
     */
    public function reviewPost(ReviewRequest $request, $ryokandata)
    {
        $inputs = $request->all();
        $inputs = array_merge($inputs,array('name_id' => $ryokandata));

        \DB::beginTransaction();
        try {
            //レビューの登録
            Review::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'コメントを登録しました。');
            return redirect(route('ryokan'));

    }
}
