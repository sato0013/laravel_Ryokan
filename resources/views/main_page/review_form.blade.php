@include('header')
<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">

        <h2>レビューを投稿する</h2>
        @if (session('msg'))
        <p class="text_danger">
            {{ session('msg') }}
        </p>
        @endif
            <form action="{{ route('post', $ryokandata) }}" method="POST">
            @csrf
                <input type="hidden" name='user_id' value ="{{ session('id') }}">
                <label for="">コメント：</label><br>
                <textarea type="text" name="comment" rows='5'>{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                    <div class='alert'>
                        {{ $errors->first('comment')}}
                    </div>
                @endif
                <input type="submit" name="submit" value="投稿する">
            </form>
            <button class='return' type="button" onClick="history.back()">戻る</button>
    </body>
</html>