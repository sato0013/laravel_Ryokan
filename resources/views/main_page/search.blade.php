@include('header')

<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">

        <div class='ryokan_titel'>
          <h2>検索結果</h2>
        </div>      
        @foreach($ryokans as $inf)
          <div class='ryokan_data'>
          <p><img class='ryokan_img' src="{{ asset('img/'.$inf->image) }}" alt="旅館の画像"></p>
            <div class='ryokan_inf'>
              <p class='ryokan_name'>{{ $inf->name }}</p>
              <p class='ryokan_des'>{{ $inf->description }}</p>
              <a class='ryokan_detail' href="{{ route('detail', $inf->id) }}">詳細はこちら</a>
            </div>       
          </div>
        @endforeach    
        <button class='return' type="button" onClick="history.back()">戻る</button>
    </body>
</html>