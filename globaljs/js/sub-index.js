$(document).ready(function () {
    var eventsSwiper = null;
    
    //初始化设置轮播
    resizeFresh();
    
    //Class轮播
    var classesSwiper = new Swiper('.classes-swiper', {
        loop: true,
        slidesPerView: 1.03,
        preventLinksPropagation : true,
        paginationClickable: true,
        prevButton:'.class-prev',
        nextButton:'.class-next',
        spaceBetween: 3
    });
    
    $(".lab").mouseover(function () {
        $(".lab-box").show();
    });
    
    $(".lab").mouseout(function () {
        $(".lab-box").hide();
    });
    
    $(".lab-box").mouseover(function () {
        $(".lab-box").show();
    });
    
    $(".lab-box").mouseout(function () {
        $(".lab-box").hide();
    });
    
    //用户调节窗口大小时自适应选择UI
    $(window).resize(function () {
        resizeFresh();
    });
});

//滚动屏幕时,同步导航栏高亮tab
$(document).scroll(function () {
    for (i = 5; i >= 0; i--) {
        if (i == 0) {
            $(".main-menu div").removeClass("active");
            break;
        }
        if ($("#part" + i).position().top <= $(document.body).scrollTop() + 300) {
            $(".main-menu div").removeClass("active");
            $("#menu" + i).addClass("active");
            break;
        }
    }
});

function scrollTo(y) {
    var body = $("html, body");
    body.stop().animate({scrollTop: y}, '100', 'swing', function () {
    });
}

function smallScreenInit() {
    //Event轮播
    eventsSwiper = new Swiper('.events-swiper',{
        effect : 'coverflow',
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        autoplay: 3000,
        preventLinksPropagation : true,
        slideToClickedSlide:true,
        prevButton:'.event-prev',
        nextButton:'.event-next',
        onTransitionEnd: function(swiper){
            var activeIndex = swiper.activeIndex;
            var activeSlideInx = swiper.slides[activeIndex].id;
            $('.event-note').hide();
            $("#text-" + activeSlideInx).show();
        },
        onTap: function(swiper){

        }
    });
    
    //Teacher轮播
    var teacherSwiper = new Swiper('.teachers-swiper', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        loop: false
    });
}

function bigScreenInit() {
    //Event轮播
    eventsSwiper = new Swiper('.events-swiper',{
        effect : 'coverflow',
        slidesPerView: 2,
        centeredSlides: true,
        loop: true,
        autoplay: 3000,
        preventLinksPropagation : true,
        slideToClickedSlide:true,
        prevButton:'.event-prev',
        nextButton:'.event-next',
        coverflow: {
            rotate: 15,
            stretch: 10,
            depth: 80,
            modifier: 2,
            slideShadows : true
        },
        onTransitionEnd: function(swiper){
            var activeIndex = swiper.activeIndex;
            var activeSlideInx = swiper.slides[activeIndex].id;
            $('.event-note').hide();
            $("#text-" + activeSlideInx).show();
        },
        onClick: function(swiper){

        }
    });
    
    //Teacher轮播
    var teacherSwiper = new Swiper('.teachers-swiper', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 2,
        paginationClickable: true,
        loop: false,
        spaceBetween: 30   
    });
}

//根据屏幕大小选择相应的展示
function resizeFresh() {
    var ww = $(window).width();
    if (Number(ww) < 600) {
        smallScreenInit();        
        //更换hero图片
        $(".top-hero").attr('src', 'images/sub-index/herophone.jpg');
    } else {
        bigScreenInit();
        
        //更换hero图片
        $(".top-hero").attr('src', 'images/sub-index/hero.png');
    }
}