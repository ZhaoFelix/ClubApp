<?php
include_once 'include/template.php';
?>


{publicInclude.php}
{** 会议、公告发布 **}
<head>
    <title>社团招募</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>招募标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="enroll-title" name="articletitle">
                </div>
            </div>
           
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">招募负责人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="" id="enroll-author" name="author">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="enroll-time" onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd HH:mm:ss'})">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募地点：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" id="enroll-place">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募职位：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" id="position-name">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募人数：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" id="enroll-number">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">职位描述：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">能力要求：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor1" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                            <div onClick="article_save_submit()" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>
                            <div onClick="removeIframe()" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</div>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
    
 ue = UE.getEditor('editor');
 ue1 = UE.getEditor('editor1');
function article_save_submit() {
    var title = $("#enroll-title").val();
    var author = $("#enroll-author").val();
    var time = $("#enroll-time").val();
    var positionDesc = ue.getPlainTxt();
    var abilityDesc = ue1.getPlainTxt();
    var place = $("#enroll-place").val();
    var position = $("#position-name").val();
    var number = $("#enroll-number").val();
    if(title==='' || author==='' || time==='' || positionDesc==='' || abilityDesc==='' || place==='' || position==='' || number===''){
        alert("请填写完整信息");
    }
    $.post("action/enroll-action.php",{Action:"clubEnroll",
        Title:title,
        Author:author,
        Time:time,
        PositionDesc:positionDesc,
        Position:position,
        Number:number,
        Ability:abilityDesc,
        Place:place
        },function(re){
            re = JSON.parse(re);
            if(re.ErrorCode==0){
                location.href = "club-enroll.php";
            }
    });
}
</script>