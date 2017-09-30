<?php
include_once 'include/template.php';
?>

{globaljs/all.js}
{static/h-ui/js/H-ui.js}
{static/h-ui/js/H-ui.min.js}
{lib/layer/2.4/layer.js}
{static/h-ui.admin/js/H-ui.admin.js}
{lib/My97DatePicker/4.8/WdatePicker.js}
{lib/jquery.validation/1.14.0/jquery.validate.js}
{lib/jquery.validation/1.14.0/validate-methods.js}
{lib/jquery.validation/1.14.0/messages_zh.js}
{lib/webuploader/0.1.5/webuploader.min.js}
{lib/ueditor/1.4.3/ueditor.config.js}
{lib/ueditor/1.4.3/ueditor.all.min.js}
{lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js}
{lib/datatables/1.10.0/jquery.dataTables.min.js}

{static/h-ui/css/H-ui.min.css}
{static/h-ui.admin/css/H-ui.admin.css}
{lib/Hui-iconfont/1.0.8/iconfont.css}
{static/h-ui.admin/skin/default/skin.css}
{static/h-ui.admin/css/style.css}


{** 会议、公告发布 **}
<head>
    <title>社团招募</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="enroll-title" name="articletitle">
                </div>
            </div>
           
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">招募负责人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="0" placeholder="" id="enroll-author" name="author">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="enroll-time">
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
				<script id="enroll-position" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">能力要求：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="enroll-ability" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                            <div onClick="article_save_submit()" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>
				<button onClick="article_save()" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="removeIframe()" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
    
var position = UE.getEditor('enroll-position');
var ability = UE.getEditor('enroll-ability');
function article_save_submit() {
    var title = $("#enroll-title").val();
    var author = $("#enroll-author").val();
    var time = $("#enroll-time").val();
    var positionDesc = position.getContentTxt();
    var abilityDesc = ability.getContentTxt();
    var place = $("$enroll-place").val();
    var position = $("#position-name").val();
    var number = $("#enroll-number").val();
    if(title==='' || author==='' || time==='' || positionDesc==='' || adilityDesc==='' || place==='' || position==='' || number===''){
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
        
    });
}

</script>