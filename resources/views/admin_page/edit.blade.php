@include('admin_header')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="/js/edit_script.js"></script>
<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h2>各種編集</h2>
        <form  action="{{ route('updata') }}" method="post">
            @csrf
            <input type="hidden" name=id value ="{{ $ryokan->id }}">
            <div class='up_data'>
                <div class='up_left'>
                    <div class='up_pre'>
                        <p>・旅館のある県名<span class='kome'>*</span></p>
                        <select name="prefectures">
                            <option value="福岡県">福岡県</option>
                            <option value="大分県">大分県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                        </select>
                    </div>
                    <div class='up_img'>
                        <p>・旅館の写真<span class='kome'>*</span></p>
                        <label>
                        <input type="file" id="myImage" name="image" required>
                        <img id="preview">
                        </label>   
                        <p class='up_selection'>*写真は再選択して下さい</p>
                    </div>
                    <div class='up_img_sub'>
                        <p class='img_title'>・旅館の写真（サブ）は３枚まで選択可能です</p>
                        <p class='note'>上から順番にファイルを選択して下さい</p>
                        <input  type="file" name="up_file1">
                        <input  type="file" name="up_file2">
                        <input  type="file" name="up_file3">
                        <p class='up_selection'>*写真は再選択して下さい</p>
                    </div>
                    <div class='up_name'>
                        <p>・旅館の名前<span class='kome'>*</span></p>
                        <input type="text" name="name" value="{{ $ryokan->name }}">
                        @if ($errors->has('name'))
                            <div class='alert'>
                                {{ $errors->first('name')}}
                            </div>
                         @endif
                    </div>           
                </div>
                
                <div class='up_right'>
                    <div class='up_des'>
                        <p>・概要<span class='kome'>*</span></p>
                        <textarea type="text" name="description" wrap="soft">{{ $ryokan->description }}</textarea>
                        @if ($errors->has('description'))
                            <div class='alert'>
                                {{ $errors->first('description')}}
                            </div>
                            @endif
                    </div>
                    <div class='up_int'>
                        <p>・紹介文<span class='kome'>*</span></p>
                        <textarea type="text" name="introduction">{{ $ryokan->introduction }}</textarea>
                        @if ($errors->has('introduction'))
                            <div class='alert'>
                                {{ $errors->first('introduction')}}
                            </div>
                        @endif
                    </div>
                    <div class='up_access'>
                        <p>・アクセス<span class='kome'>*</span></p>
                        <textarea type="text" name="access">{{ $ryokan->access }}</textarea>
                        @if ($errors->has('access'))
                            <div class='alert'>
                                {{ $errors->first('access')}}
                            </div>
                        @endif
                    </div>   
                    <p>
                        <input class='up_post' class="edit" type="submit" name="submit" value="更新">
                    </p>
                </div>
                
            </div>
        </form>
        <button class='detail_return' type="button" onClick="history.back()">戻る</button>      
    </body>
</html>