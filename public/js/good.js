$(function() {
    let good = $('.good-toggle');
    let goodRyokanId;
    good.on('click', function() {
        let $this = $(this);
        goodRyokanId = $this.data('ryokan-id');
        goodUserId = $this.data('user-id');
        //console.log(goodRyokanId);
        $.ajax({
            headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/laravel/testproject/public/ryokan/good',
            method: 'POST',
            data: {
                'name_id': goodRyokanId,
                'user_id' : goodUserId
            },
        })
        //通信成功時
        .done(function (data) {
            $this.toggleClass('gooded');
            $this.next('.good-counter').html(data.ryokan_goods_count);
        })
        //通信失敗時
        .fail(function () {
            console.log('fail');
        });
    });
});