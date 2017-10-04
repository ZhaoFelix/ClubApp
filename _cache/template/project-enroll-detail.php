<?php

$projectid = get("projectid");
$sql = "select * from ProjectEnroll where IsDeleted=0 and ProjectId=$projectid";
$data = getRowData($sql);
?>
<head>
    <?php _includeCSS("css/project-enroll-detail.css"); ?>
    <title>项目招募</title>
</head>
<div>
    <div class="title-bg">
    <span class="title"><?php e($data["ProjectName"]);?></span>
    </div>
    <div class="author">
        <span>作者：</span><span ><?php e($data["AddAdmin"]);?></span>
    </div>
    <div class="publishtime">
        <span>发布时间：</span><span ><?php e($data["PublishedTime"]);?></span>
    </div>
    <hr style=" margin: 40px 0;">
    <div class="title-content">
        <div class="position common">
            <span>招募职位：</span><span class="font"><?php e($data["PositionName"]);?></span>
        </div>
        <div class="number common">
            <span>招募人数：</span><span class="font"><?php e($data["Number"]);?>人</span>
        </div>
        <div class="time common">
            <span>招募时间：</span><span class="font"><?php e($data["Deadline"]);?></span>
        </div>
        <div class="number common">
            <span>项目起止时间：</span><span class="font"><?php e($data["StartTime"]);?>～<?php e($data["EndTime"]);?></span>
        </div>
        <div class="number common">
            <span>项目负责人：</span><span class="font"><?php e($data["EnrollPeople"]);?></span>
        </div>
        <div class="location common">
            <span>项目参与人：</span><span class="font"><?php e($data["ProjectPeople"]);?></span>
        </div>
        <div class="description-position common">
            <span>项目描述：</span><br><span class='font'><?php e($data["ProjectDesc"]);?></span>
        </div>
        <div class="description-position common">
            <span>项目描述：</span><br><span class="font"><?php e($data["PositionDesc"]);?></span>
        </div>
        <div class="description-ability common">
            <span >能力要求：</span><br><span class="font"><?php e($data["AbilityDesc"]);?></span>
        </div>
        <div class="project-img">
            <?php for($i=0;$i<5;$i++){ ?>
            <img src="images/img.png">
            <?php }?>
        </div>
    </div>
    <div class="title-img">
        
    </div>
    
    
</div>
