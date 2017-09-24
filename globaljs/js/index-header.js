$(document).ready(function(){
    
    //导航栏控制
    var url = window.location.href;//当前网页地址
    //网页地址中查找index.php
    var bool = url.indexOf('index');
    var reg = /\/$/;    
    //bool 大于等于 0  表示有
    if(bool>=0 || reg.test(url)){
        // 是首页;
        $('.menu').each(function(){
            //最后一个按钮不移屏
            if(this.id == "menu5"){
                return;
            }
            $(this).click(function(){
                 var part = $(this).attr('data-scrollto');
                 scrollTo($('#'+part).position().top - 80);
            });
        });

    }else{
       // 不是首页;
        $('.menu').each(function () {
            $(this).click(function () {  
                var part = $(this).attr('data-scrollto');//part1  part2 ...          
                window.location.href = 'index?part='+part;          
            });
        });
    }   
    var scrollData =$('.scrollPart').attr('data-scroll');   
    if (scrollData.length > 0) {
        scrollTo($('#'+scrollData).position().top - 80);    
    }  
    //手机需要点击
    $('.lab').click(function(){
        $('.lab-box').show();
    });
    
    $('.lab').mouseover(function(){
        $('.lab-box').show();
    });
    
    $('.lab').mouseout(function(){
        $('.lab-box').hide();
    });
    
    
    
});

 