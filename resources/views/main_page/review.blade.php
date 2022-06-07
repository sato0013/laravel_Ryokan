@include('header')
<link rel="stylesheet" href="{{ asset('css/ryokan_style.css') }}">

    <div class='ryokan_titel'>
          <h2>お客様の声</h2>
          <div class='ryokan_register'>
           <a href="{{ route('form', $ryokandata->id) }}">レビューを投稿する</a>
          </div>
        </div>      
        <div class='ryokan_data'>
            <div class='ryokan_inf'>
              <p class='ryokan_name'>{{ $ryokandata->name }}</p>
              @if (session('errs'))
                <p class="text_danger">
                    {{ session('errs') }}
                </p>
              @endif
              @if (!empty($name))
              <table>
                <thead>
                  <tr>
                    @foreach($name as $n)
                    <th>{{ $n }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($comments as $comment)
                  <th>{{ $comment }}</th>             
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>       
          </div>
        <button class='return' type="button" onClick="history.back()">戻る</button>
    </body>
</html>