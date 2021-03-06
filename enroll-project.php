<?php
include_once 'include/template.php';
$projectid = get("projectid",0);
$sql = "select * from ProjectEnroll where ProjectId=$projectid";
$data = getRowData($sql);

?>
{publicInclude.php}

{** 会议、公告发布 **}
<head>
    <title>项目招募</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{if:$projectid!='0'}{$data['ProjectName']}{/if}" placeholder="" id="project-name" name="articletitle">
                </div>
            </div>
           
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">项目负责人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="{if:$projectid!='0'}{$data['EnrollPeople']}{/if}" placeholder="" id="project-author" name="author">
                    </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">项目参与人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="{if:$projectid!='0'}{$data['ProjectPeople']}{/if}" placeholder="" id="project-people" name="author">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目开始时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" value="{if:$projectid!='0'}{$data['StartTime']}{/if}"id="start-time" onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd'})">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">项目结束时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" value="{if:$projectid!='0'}{$data['EndTime']}{/if}" id="end-time" onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd'})">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募截止时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text Wdate" value="{if:$projectid!='0'}{$data['Deadline']}{/if}" id="deadline" onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd HH:mm:ss'})">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">职位名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="{if:$projectid!='0'}{$data['PositionName']}{/if}" id="position-name">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">招募人数：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text"  value="{if:$projectid!='0'}{$data['Number']}{/if}" id="project-number">
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
				<div onClick="article_save_submit()" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>				
				<div onClick="removeIframe()" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</div>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
var position = UE.getEditor('positionDesc');
var ability = UE.getEditor('abilityDesc');
var project = UE.getEditor('projectDesc');
function article_save_submit() {
    
    var projectName = $("#project-name").val();
    var projectAuthor = $("#project-author").val();
    var projectPeople = $("#project-people").val();
    var startTime = $("#start-time").val();
    var endTime = $("#end-time").val();
    var positionName = $("#position-name").val();
    var projectNumber = $("#project-number").val();
    var projectPlace = $("#project-place").val();
    var deadline = $("#deadline").val();
    var positionDesc = position.getPlainTxt();
    var abilityDesc = ability.getPlainTxt();
    var projectDesc = project.getPlainTxt();
    if(projectName==='' || projectAuthor==='' || projectPeople==='' ||  startTime==='' || endTime==='' ||  projectNumber==='' || projectPlace==='' || deadline==='' || positionDesc==='' || abilityDesc==='' ||  projectDesc==='') 
    {
                alert("请填写完整信息!");
    }
    else {
           $.post("action/enroll-action.php",{
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
        Deadline:deadline,
        Position:positionName
    },function(re){
        re  = JSON.parse(re);
        if(re.ErrorCode==0){
            location.href='project-enroll.php';
        }
    });         
  }
   
}
</script>