$(function() {
    $(".delete").click(function() {
      if(!confirm("削除を実行しますか？")) {
        return false;
      } else {
        return true;
      }
    });

    $(".up_file_sub a").click(function() {
      var imgSrc = $(this).children().attr('src');
      $('.big_img').children().attr('src', imgSrc);
      $('.click_img').fadeIn();
      $('body,html').css('overflow-y', 'hidden');
      return false;
    });

    $(".close_btn a").click(function() {
      $('.click_img').fadeOut();
      $('body,html').css('overflow-y', 'visible');
      return false
    });
});