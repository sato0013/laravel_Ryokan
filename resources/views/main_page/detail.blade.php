@include('header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/good.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">
<link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/82754bf16f.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <h2>旅館詳細情報</h2>
    <div class='detail_data'>
      <div class='up_file'>
        <img class='detail_img' src="{{ asset('img/'.$ryokan->image) }}" alt="旅館の画像">
        <div class='up_file_sub'>
          @if(!empty($ryokan['up_file1']) && !empty($ryokan['up_file2']) && !empty($ryokan['up_file3']))
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file1) }}" alt="旅館のサブ画像"></a>
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file2) }}" alt="旅館のサブ画像"></a>
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file3) }}" alt="旅館のサブ画像"></a>
          @elseif(!empty($ryokan['up_file1']) && !empty($ryokan['up_file2']))
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file1) }}" alt="旅館のサブ画像"></a>
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file2) }}" alt="旅館のサブ画像"></a>
          @elseif(!empty($ryokan['up_file1']))
            <a href=""><img class='detail_img_sub' src="{{ asset('img/'.$ryokan->up_file1) }}" alt="旅館のサブ画像"></a>
          @endif
          <div id="back">
            <div class='subBig'><img class='detail_img_subBig' src=""></div>
          </div>
        </div>
      </div>
      <div class='detail_inf'>
        <p class='detail_name'>{{ $ryokan->name }}</p>
        <p class='detail_int_label'>・旅館の紹介</p>
        <p class='detail_int'>{{ $ryokan->introduction }}</p>
        <p class='detail_access_label'>・アクセス</p>
        <p class='detail_access'>{{ $ryokan->access }}</p>
        <div class='operation'>
            <a class='edit' href="{{ route('edit', $ryokan->id) }}">編集</a>
            <form method="POST" action="{{ route('delete', $ryokan->id) }}" >
                @csrf
                <button class='delete' type="submit" class="btn btn-primary" onclick=>削除</button>
            </form>
            <a href="{{ route('rakuten', $ryokan->name) }}">予約はこちら</a>
            <a href="{{ route('review', $ryokan->id) }}">お客様の声</a>
        </div>
        <span class='goods'>
          <i class="fa-regular fa-heart good-toggle gooded" data-ryokan-id="{{ $ryokan->id }}" data-user-id="{{ session('id') }}"></i>
          <span class="good-counter">{{ $ryokan->goods_count }}</span>
        </span>
      </div>
    </div>
    
    <button class="detail_return" type="button" onClick="history.back()">戻る</button>
  </body>
</html>