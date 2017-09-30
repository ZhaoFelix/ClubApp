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
    <title>添加项目</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="project-title" name="articletitle">
                </div>
            </div>
           
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">项目负责人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="" id="project-principal" name="project-principal">
                    </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">技术组成员：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="" id="tech-people" name="tech-people">
                    </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">UI组成员：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="" id="UI-people" name="UI-people">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目开始时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="start-time">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目结束时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="end-time">
			</div>
            </div>
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目描述：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<div onClick="submit()" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
var projectDesc = UE.getEditor('editor');

function submit() {
    console.log(1);
    var projectName = $("#project-name").val();
    var projectPrincipal = $("#project-principal").val();
    var techPeople = $("#tech-people").val();
    var uiPeople = $("#UI-people").val();
    var startTime = $("#start-time").val();
    var endTime = $("#end-time").val();
    var projectDesc = projectDesc.getContentTxt();
    
    if(projectName==='' || projectPrincipal==='' || techPeople==='' || uiPeople==='' || startTime==='' || endTime===''  || projectDesc===''){
        alert("请填写完整信息!");
    }
    $.post("action/enroll-action",{
        Action:"ProjectAadd",
        ProjectName:projectName,
        ProjectPrincipal:projectPrincipal,
        TechPeople:techPeople,
        UIPeople:uiPeople,
        StartTime:startTime,
        EndTime:endTime,
        ProjectDesc:ProjectDesc
    },function(re){
        
    });
}


</script>