<?php
include_once 'include/template.php';
$projectid = get("projectid");
$sql = "select * from ProjectEnroll where IsDeleted=0 and ProjectId=$projectid";
$data = getRowData($sql);
?>
<head>
    {css/project-enroll-detail.css}
    <title>项目招募</title>
</head>
<div>
    <div class="title-bg">
    <span class="title">{$data["ProjectName"]}</span>
    </div>
    <div class="author">
        <span>作者：</span><span >{$data["AddAdmin"]}</span>
    </div>
    <div class="publishtime">
        <span>发布时间：</span><span >{$data["PublishedTime"]}</span>
    </div>
    <hr style=" margin: 40px 0;">
    <div class="title-content">
        <div class="position common">
            <span>招募职位：</span><span class="font">{$data["PositionName"]}</span>
        </div>
        <div class="number common">
            <span>招募人数：</span><span class="font">{$data["Number"]}人</span>
        </div>
        <div class="time common">
            <span>招募时间：</span><span class="font">{$data["Deadline"]}</span>
        </div>
        <div class="number common">
            <span>项目起止时间：</span><span class="font">{$data["StartTime"]}～{$data["EndTime"]}</span>
        </div>
        <div class="number common">
            <span>项目负责人：</span><span class="font">{$data["EnrollPeople"]}</span>
        </div>
        <div class="location common">
            <span>项目参与人：</span><span class="font">{$data["ProjectPeople"]}</span>
        </div>
        <div class="description-position common">
            <span>项目描述：</span><br><span class='font'>{$data["ProjectDesc"]}</span>
        </div>
        <div class="description-position common">
            <span>项目描述：</span><br><span class="font">{$data["PositionDesc"]}</span>
        </div>
        <div class="description-ability common">
            <span >能力要求：</span><br><span class="font">{$data["AbilityDesc"]}</span>
        </div>
        <div class="project-img">
            {for:$i=0;$i<5;$i++}
            <img src="images/img.png">
            {/for}
        </div>
    </div>
    <div class="title-img">
        
    </div>
    
    
</div>
