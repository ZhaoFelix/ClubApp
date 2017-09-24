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
    <span class="title"><?php e($data['Title']);?></span>
    </div>
    <div class="author">
        <span>作者：</span><span >Felix</span>
    </div>
    <div class="publishtime">
        <span>发布时间：</span><span ><?php e($data["PublishTime"]);?></span>
    </div>
    
    <div class="title-content">
       <?php e($data["PublishedContent"]);?>
    </div>
    <div class="title-img">
        
    </div>
    
    
</div>
