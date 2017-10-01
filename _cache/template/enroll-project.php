<?php

?>
<?php include(template("publicInclude.php"));?>


<head>
    <title>项目招募</title>
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
                        <input type="text" class="input-text" value="0" placeholder="" id="project-author" name="author">
                    </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">项目参与人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="0" placeholder="" id="project-people" name="author">
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
			<label class="form-label col-xs-4 col-sm-2">招募截止时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="deadline">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">职位名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="position-name">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募人数：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" id="project-number">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募地点：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" id="project-place">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目描述：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="projectDesc" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">职位描述：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="positionDesc" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">能力要求：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="abilityDesc" type="text/plain" style="width:100%;height:300px;"></script> 
			</div>
            </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
var positionDesc = UE.getEditor('positionDesc');
var abilityDesc = UE.getEditor('abilityDesc');
var projectDesc = UE.getEditor('projectDesc');
function article_save_submit() {
    var projectName = $("#project-name").val();
    var projectAuthor = $("#project-author").val();
    var projectPeople = $("#project-people").val();
    var startTime = $("#start-timr").val();
    var endTime = $("#end-time").val();
    var projectNumber = $("#project-number").val();
    var projectPlace = $("#project-place").val();
    var deadline = $("#deadline").val();
    var positionDesc = positionDesc.getContentTxt();
    var abilityDesc = abilityDesc.getContentTxt();
    var projectDesc = projectDesc.getContentTxt();
    $.post("action/enroll-action",{
        Action:"Project",
        ProjectName:projectName,
        ProjectAuthor:projectAuthor,
        ProjectPeople:projectPeople,
        StartTime:startTime,
        EndTime:endTime,
        ProjectNumber:projectNumber,
        ProjectDesc:projectDesc,
        PositionDesc:positionDesc,
        AbilityDesc:abilityDesc,
        ProjectPlace:projectPlace,
        Deadline:deadline  
    },function(re){
        
    });
}


</script>