<?php
include_once 'include/template.php';
$newid = get("newsid");
$sql = "select * from ClubNews where NewsId=$newid";
$data = getRowData($sql);
?>
<head>
    {css/metting-detail.css}
    <title>会议详情</title>
</head>
<div>
    <div class="title-bg">
    <span class="title">{$data['Title']}</span>
    </div>
    <div class="author">
        <span>作者：</span><span >Felix</span>
    </div>
    <div class="publishtime">
        <span>发布时间：</span><span >{$data["PublishTime"]}</span>
    </div>
    
    <div class="title-content">
       {$data["PublishedContent"]}
    </div>
    <div class="title-img">
        
    </div>
    
    
</div>
