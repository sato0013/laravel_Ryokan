<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>九州ひとり旅</title>
</head>
<body>
  <header class="site-header">
  <a href="/laravel/testproject/public/ryokan/main" class="title">九州ひとり旅<img class='title_logo' src="{{ asset('img/mark.png') }}" alt=""></a>
      <div class="g_nav">
        <a href="{{ route('mypage', session('id')) }}" class="mypage">マイページ</a>
        <a href="../front_page/login.php" class="logout">ログアウト</a>
      </div>
  </header>