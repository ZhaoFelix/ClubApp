$(document).ready(function(){
 
    resizeFresh();
    
    $('.detail').click(function(){
        $('.layer-wrap').show();
    });
    $('.layer-wrap>div a').click(function(){
        $('.layer-wrap').hide(); 
    });
    
    
});

function smallScreenInit(){
        
        var imgSwiper = new Swiper('.img-wrap', {
        loop: true,
        slidesPerView: 1,
        loopedSlides:1,
        preventLinksPropagation : true,
        paginationClickable: true ,
        spaceBetween: 20
     });
        
    }
    function bigScreenInit(){
       var imgSwiper = new Swiper('.img-wrap', {
//        loop: true,
        slidesPerView: 2,
//        loopedSlides:2,
        preventLinksPropagation : false,
        paginationClickable: false,
        spaceBetween: 20
     }); 
    }
    
    function resizeFresh(){
        var ww = $(window).width();
        if (Number(ww) < 600) {
            smallScreenInit();

        }else{
           bigScreenInit(); 
        }
    }

