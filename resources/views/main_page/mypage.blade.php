@include('header')

<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">

        <h2>いいねした旅館一覧</h2>
        <div class='mypost'>
            @if (session('err'))
                <p class="text_danger">
                    {{ session('err') }}
                </p>
            @endif
            @foreach($myryokan as $data)
            <div class='mypost_data'>
                <p class='mypost_name'>{{ $data->name }}</p>
                <img class='mypost_img' src="{{ asset('img/'.$data->image) }}" alt="旅館の画像">
            </div>
            @endforeach
        </div>
        <button class='return' type="button" onClick="history.back()">戻る</button>
    </body>
</html>