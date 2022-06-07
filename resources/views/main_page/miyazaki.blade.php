@include('header')
<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">

        <div class='ryokan_titel'>
          <h2>宮崎県の温泉旅館</h2>
          <div class='ryokan_register'>
           <a href="../admin_page/ryokan_signup.php">新規登録はこちら</a>
          </div>
        </div>      
        @foreach($miyazaki as $inf)
          <div class='ryokan_data'>
          <p><img class='ryokan_img' src="{{ asset('img/'.$inf->image) }}" alt="旅館の画像"></p>
            <div class='ryokan_inf'>
              <p class='ryokan_name'>{{ $inf->name }}</p>
              <p class='ryokan_des'>{{ $inf->description }}</p>
              <a class='ryokan_detail' href="detail.php?id=<?=$inf['id'] ?>">詳細はこちら</a>
            </div>       
          </div>
        @endforeach    
        <button class='return' type="button" onClick="history.back()">戻る</button>
    </body>
</html>