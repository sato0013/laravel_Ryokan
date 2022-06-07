@include('login_header')

<link rel="stylesheet" href="/css/style.css">

        @if (session('err_msg'))
            <p class="text_danger">
                {{ session('err_msg') }}
            </p>
        @endif
        <div class="login_form">
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <input type="hidden" name="id">
                <div class='user_data'>
                    <div class='user_email'>
                        <p>メールアドレス</p>
                        <input type="mail" name="email" value="{{ old('name') }}">
                    </div>
                    @if ($errors->has('email'))
                            <div class='alert'>
                                {{ $errors->first('email')}}
                            </div>
                    @endif
                    <div>
                        <p>パスワード</p>
                        <input type="password" name="password" value="{{ old('password') }}">
                    </div>
                    @if ($errors->has('password'))
                            <div class='alert'>
                                {{ $errors->first('password')}}
                            </div>
                    @endif
                    <p>
                    </p>
                    <div class='signup'>
                        <input class="login_button" type="submit" value="ログイン">
                        <a href="{{ route('user') }}">新規登録</a>
                    </div>
                    <div class="reset">
                        <a href="{{ route('pass') }}">パスワードを忘れた方はこちら</a>
                    </div>
                </div>
                      
            </form>
        </div>
    </body>
</html>