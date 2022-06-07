@include('header')
<link rel="stylesheet" href="{{ asset('css/main_style.css') }}">
    @if (session('err_msg'))
        <p class="text_danger">
            {{ session('err_msg') }}
        </p>
    @endif
    <p class="heading">各県をクリックして温泉旅館を探しましょう</p>
        <div class='map'>
          <ul class='map_list'>
            <li class='map_hukuoka'><a href="{{ route('hukuoka') }}">福岡県</a></li>
            <li class='map_hukuoka_sub'><div class='hukuoka_line'></div></li>
            <li class='map_saga'><a href="{{ route('saga') }}">佐賀県</a><div class='saga_line'></div></li>
            <li class='map_nagasaki'><a href="{{ route('nagasaki') }}">長崎県</a><div class='nagasaki_line'></div></li>
            <li class='map_kumamoto'><a href="{{ route('kumamoto') }}">熊本県</a><div class='kumamoto_line'></div></li>
            <li class='map_oita'><a href="{{ route('oita') }}">大分県</a></li>
            <li class='map_oita_sub'><div class='oita_line'></div></li>
            <li class='map_miyazaki'><a href="{{ route('miyazaki') }}">宮崎県</a></li>
            <li class='map_miyazaki_sub'><div class='miyazaki_line'></div></li>
            <li class='map_kagosima'><a href="{{ route('kagosima') }}">鹿児島県</a><div class='kagosima_line'></div></li>
          </ul>
          <ul class='map_eng'>
            <li class='map_hukuoka_eng'><a href="{{ route('hukuoka') }}">Fukuoka</a></li>
            <li class='map_saga_eng'><a href="{{ route('saga') }}">Saga</a></li>
            <li class='map_nagasaki_eng'><a href="{{ route('nagasaki') }}">Nagasaki</a></li>
            <li class='map_kumamoto_eng'><a href="{{ route('kumamoto') }}">Kumamoto</a></li>
            <li class='map_oita_eng'><a href="{{ route('oita') }}">Oita</a></li>
            <li class='map_miyazaki_eng'><a href="{{ route('miyazaki') }}">Miyazaki</a></li>
            <li class='map_kagosima_eng'><a href="{{ route('kagosima') }}">Kagosima</a></li>
          </ul>
        </div>
        <div class='main_img'>
          <img src="{{ asset('img/kyuusyuu.png') }}" alt="">
        </div>
        <div class='search'>
           <form action="ryokan_search.php" method="POST">
             <p>検索フォーム</p>
             <div>
               <select name="selectbox">
                <option value="Prefectures" >県名</option>
               </select>
                <input type="text" name="textbox">
                <input type="submit" name="search" value="検索">
              </div>  
           </form>
        </div>
    </body>
</html>