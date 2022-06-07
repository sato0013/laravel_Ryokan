@include('login_header')


<link rel="stylesheet" href="/css/style.css">

        <div class="login_form">
            <form action="{{ route('register') }}" method="POSt">
                @csrf
                <div class='user_data'>
                    <div>
                        <p>名前</p>
                        <input type="text" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class='alert'>
                                {{ $errors->first('name')}}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p>メールアドレス</p>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class='alert'>
                                {{ $errors->first('email')}}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p>パスワード</p>
                        <input type="password" name="password">
                        @if ($errors->has('password'))
                            <div class='alert'>
                                {{ $errors->first('password')}}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p>パスワード確認</p>
                        <input type="password" name="password_conf">
                        @if ($errors->has('password_conf'))
                            <div class='alert'>
                                {{ $errors->first('password_conf')}}
                            </div>
                        @endif
                    </div>
                    <div class="button">
                        <input class="signup_button" type="submit" name="submit" value="登録する">  
                        <button class='return' type="button" onClick="history.back()">戻る</button>
                    </div>
                </div>       
            </form>
        </div>
    </body>
</html>
