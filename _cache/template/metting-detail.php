<?php

$newid = get("newsid");
$sql = "select * from ClubNews where NewsId=$newid";
$data = getRowData($sql);
?>
<head>
    <?php _includeCSS("css/metting-detail.css"); ?>
    <title>会议详情</title>
</head>
<div>
    <div class="title-bg">
    <span class="title"><?php e($data['NewsTitle']);?></span>
    </div>
    <div class="newspeople">
        <span>会议负责人：</span><span ><?php e($data["NewsPeople"]);?></span>
    </div>
    <div class="newstime">
        <span>会议时间：</span><span ><?php e($data["NewsTime"]);?></span>
    </div>
    <div class="attendence">
        <span>与会人员：</span><span><?php e($data["Attendence"]);?></span>
    </div>
    <div class="title-content">
         <span>会议内容：</span>
         <p>
            <?php e($data["NewsContent"]);?> 
         </p>
    </div>
    <div class="title-img"><span>会议图片</span>
        <img src="<?php e($data['PublishedImg'],'images/img.png'); ?>">
    </div>  
    <div class="publishtime">
        <span>
            发布时间:
        </span>
        <span>
            <?php e($data["PublishedTime"]);?>
        </span>
    </div> 
</div>
