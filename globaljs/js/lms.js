function formatQueryArgs(url) {
    var urls = url.split('?');
    var args = {};
    
    if (urls.length >= 2) {
        var query = urls[1];
        var querySplit = query.split('&');// a=1,b=2
        for (var i = 0; i < querySplit.length; i++) {
            var items = querySplit[i]; // a=1;
            var item = items.split('=');
            args[item[0]] = item[1];
        }
    }
    
    return args;
}

function buildQueryArgs(querys) {
    var args = '';
    
    for (var key in querys) {
        args = args + key + '=' + querys[key] + '&';
    }
    
    args = args.substr(0, args.length - 1);
    
    return args;
}



var wHeight = document.documentElement.clientHeight - 170;
var rightPart = document.getElementById('right-content');
rightPart.style.height = wHeight + "px";
var leftPart = document.getElementById('left-nav');
leftPart.style.height = wHeight + "px";
//下课按钮单击事件
var btn = document.getElementsByClassName('btn')[0];
// 获取页面的宽，高
var width = document.documentElement.scrollWidth;
var height = document.documentElement.scrollHeight;
// 获取可视区域的高度
var cHeight = document.documentElement.clientHeight;

btn.onclick = function () {
    var layer = document.createElement('div');
    layer.id = 'mask';
    layer.style.width = width + 'px';
    layer.style.height = height + 'px';
    var body = document.getElementsByTagName('body');
    document.body.appendChild(layer);
    // 提示框
    var hintWrap = document.createElement('div');
    hintWrap.id = 'hint-wrap';
    document.body.appendChild(hintWrap);
    hintWrap.innerHTML = "<div class = 'hint-head'>是否下课</div><div class='hint-body-left'>否</div><div class='hint-body-right'>是</div>";
    var hintHeight = hintWrap.offsetHeight;
    var hintWidth = hintWrap.offsetWidth;
    hintWrap.style.top = (cHeight - hintHeight) / 2 + "px";
    hintWrap.style.right = (width - hintWidth) / 2 + "px";

    // 移除遮罩层和提示框
    var hintLeft = document.getElementsByClassName('hint-body-left')[0];
    var hintRight = document.getElementsByClassName('hint-body-right')[0];
    hintLeft.onclick = layer.onclick = function () {
        document.body.removeChild(layer);
        document.body.removeChild(hintWrap);
    }    
    hintRight.onclick = function () {
        var url = location.href;
        var arr = url.split('?');
        var element = arr[1].split("=");
        var classId = $('#class-id').attr('data-value');
        var lessonInx = $('#lesson-index').attr('data-value');
        
       console.log(lessonInx);
//        var lessonIndex = $("#left-nav .nav-col .nav-bar-selected").attr('data-col');
        $.post('action/course-action.php', {
            Action: 'AddOneFeedback',
            ClassId: classId,
            LessonIndex:lessonInx
        }, function (data) {
            data = JSON.parse(data);
            
            if (data.ErrorCode == 0) {
                var feedbackId = data.Result;
                console.log(feedbackId);
                location.href = "feedback.php?feedbackid=" + feedbackId + "&classid=" + classId+"&lessonIndex="+lessonInx;
            }
        });
    };
}


