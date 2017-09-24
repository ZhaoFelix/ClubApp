var dataMarker = 0;

$(document).ready(function () {
    //    播放器   
    $("#closeTV").click(function (a) {
        a.preventDefault();
        $("#videoPlay").fadeOut();
        $("#overlay").fadeOut();
        $("#Html5Video").load();
        setTimeout(function () {
            $("#Html5Video").get(0).srcSave = $("#Html5Video").get(0).src;
            $("#Html5Video").get(0).src = "";
        }, 200);
    });

    $(".tvBtn").click(function (a) {
        a.preventDefault();
        $("#videoPlay").fadeIn();
        $("#overlay").fadeIn();
        $("#Html5Video").show();
        $("#Html5Video").bind("playing", function () {
            this.setAttribute("_isplaying", 1);
            $(".playBtn").hide()
        }).bind("ended", function () {
            this.removeAttribute("_isplaying");
            this.currentTime = 0;
            this.pause();
            inter.setinterval();
            $(this).hide()
        }).bind("pause", function () {
            this.removeAttribute("_isplaying");
        })
    });

    showBox();

//    showMsg();

    var s = $('.s');

    //learnning
    var mySwiper = new Swiper('.session-container', {

        effect: 'coverflow',
        slidesPerView: 2,
        centeredSlides: true,
        loop: true,
        autoplay: 3000,
//        grabCursor: true,
        preventLinksPropagation: true,
        slideToClickedSlide: true,
        prevButton: '#STEM-prev-button',
        nextButton: '#STEM-next-button',

        coverflow: {
            rotate: 15,
            stretch: 10,
            depth: 80,
            modifier: 2,
            slideShadows: true
        },
        onTransitionEnd: function (swiper) {
            var activeIndex = swiper.activeIndex;
            var activeId = swiper.slides[activeIndex].id;
            var testId = '#' + activeId + '-text';
            $(".session-note").hide();
            $(testId).show();
        }
    });
    //iphone上的learnning 
    var mySwiper = new Swiper('.iPhone-session-container', {
        loop: true,
        autoplay: 3000,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
//        hashnav: true,

        onTransitionEnd: function (swiper) {
            var activeIndex = swiper.activeIndex;
            var activeId = swiper.slides[activeIndex].id;
            var testId = '#' + activeId + '-text';
            $(".iphone-session-note").hide();
            $(testId).show();
        }
    });

    //teacher
    var swiper = new Swiper('.teacher-container', {
        nextButton: '#teacher-next-button',
        prevButton: '#teacher-prev-button',
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 0
//        freeMode: true

    });

    //iPhone上teacher
    var swiper = new Swiper('.iPhone-teacher-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30
//        freeMode: true

    });

//    $.post("lms/action/pageweb-action.php", {'Action': "GetStudioImg"}, function (rst) {
//        var $data = $.parseJSON(rst);
//        var swiper = new Swiper('.iphone-studio-box', {
//            loop: true,
//            pagination: '.studio-pagination',
//            preventLinksPropagation: true,
//            paginationClickable: true,
//            paginationBulletRender: function (index, className) {                         
//                return '<div class="' + className + '" style="color: white;margin-left:1.65%;margin-right:1.65%">'
//                        + '<img class="location-icon" src="' + $data.Result.StudioInfo[index].StudioIcon + '" />'
//                        + '<div class="location-layer" id="' + index + '-layer"  >'
//                        + '<img src="images/index/location.png">' + '<div style="font-size:12px">'
//                        + $data.Result.StudioInfo[index].StudioName + '</div>' + '</div>' + '</div>';
//            },
//            onTransitionEnd: function (swiper) {
//                var activeIndex = swiper.activeIndex;
//                var activeId = swiper.slides[activeIndex].id;
//                var textId = "#" + activeId + '-layer';
//                $('.location-layer').css({
//                    'opacity': '0' 
//                });
//               
//                $(textId).css({
//                    'opacity':'1'     
//                });
//            }
//        });
//    });



});
//恢复折叠图片样式
function resetCss(Arr) {

    Arr.eq(0).css({
        'margin-left': '0%',
        'cursor': 'pointer'
    });
    Arr.eq(1).css({
        'margin-left': "25%",
        'cursor': 'pointer'

    });
    Arr.eq(2).css({
        'margin-left': '50%',
        'cursor': 'pointer'
    });
    Arr.eq(3).css({
        'margin-left': '75%',
        'cursor': 'pointer'

    });

}
//折叠动画
function showBox() {

    //pc折叠
    var bigBox = $('.session-part');//大盒子
    var clickBtn = $('.session-left');//点击按钮
    var showBox = $('.session-right');//显示框

    clickBtn.eq(0).click(function () {
        var marker = Number($(this).attr('data-marker'));
        if (marker) {
//            console.log('in 1');
            //返回
            $(this).attr('data-marker', 0);
            showBox.eq(0).css("display", "none");
            resetCss(bigBox);

        } else {//0

            showBox.eq(0).css("display", "block");
            bigBox.eq(1).css('margin-left', '100%');
            bigBox.eq(2).css('margin-left', '100%');
            bigBox.eq(3).css('margin-left', '100%');
            //console.log('in 0');
            $(this).attr('data-marker', 1);
        }

    });
    clickBtn.eq(1).click(function () {
        var marker = Number($(this).attr('data-marker'));
        if (marker) {
//            console.log('in 1');
            //返回
            $(this).attr('data-marker', 0);
            showBox.eq(1).css("display", "none");
            resetCss(bigBox);

        } else {//0

            showBox.eq(1).css("display", "block");

            bigBox.eq(0).css('margin-left', '-25%');
            bigBox.eq(1).css('margin-left', "0%");
            bigBox.eq(2).css('margin-left', '100%');
            bigBox.eq(3).css('margin-left', '100%');
            //console.log('in 0');
            $(this).attr('data-marker', 1);
        }

    });
    clickBtn.eq(2).click(function () {
        var marker = Number($(this).attr('data-marker'));
        if (marker) {
//            console.log('in 1');
            //返回
            $(this).attr('data-marker', 0);
            showBox.eq(2).css("display", "none");
            resetCss(bigBox);

        } else {//0

            showBox.eq(2).css("display", "block");
            bigBox.eq(0).css('margin-left', '-100%');
            bigBox.eq(1).css('margin-left', '-100%');
            bigBox.eq(2).css('margin-left', '0%');
            bigBox.eq(3).css('margin-left', '100%');
           // console.log('in 0');
            $(this).attr('data-marker', 1);
        }

    });
    clickBtn.eq(3).click(function () {
        var marker = Number($(this).attr('data-marker'));
        if (marker) {
            //返回
            $(this).attr('data-marker', 0);
            showBox.eq(3).css("display", "none");
            resetCss(bigBox);

        } else {//0

            showBox.eq(3).css("display", "block");

            bigBox.eq(0).css('margin-left', '-100%');
            bigBox.eq(1).css('margin-left', '-100%');
            bigBox.eq(2).css('margin-left', '-100%');
            bigBox.eq(3).css('margin-left', '0%');
           // console.log('in 0');
            $(this).attr('data-marker', 1);
        }

    });

    //iphone折叠

    var iphoneClickBtn = $('.iphone-head');

    iphoneClickBtn.each(function () {

        $(this).click(function () {

            var flag = Number($(this).attr('data-item'));

            if (flag) {
                $(this).next().hide();
                $(this).attr('data-item', '0');
            } else {

                $('.iphone-body').hide();
                $(this).next().show();
                $(this).attr('data-item', '1');
            }

        });

    });

}

//导航栏动画函数
function scrollTo(y) {
    var body = $("html, body");
    body.stop().animate({scrollTop: y}, '100', 'swing', function () {
    });
}
 
function playVideo(url) {
       $("#videoPlay").show();
       $("#Html5Video").attr("src", url);
    }








