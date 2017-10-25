<?php

$newid = get("newsid");
$sql = "select * from ClubNews where NewsId=$newid";
$data = getRowData($sql);
$imgStr = $data['PublishedImg'];
//json_decode解析时字符串中不能存在制表符
$imgArr = json_decode($imgStr);
?>
<head>
    <?php _includeCSS("css/metting-detail.css"); ?>
    <?php _includeCSS("globaljs/lightbox/css/lightbox.css"); ?>
    <?php _includeCSS("globaljs/lightbox/css/lightbox.css"); ?>
    <?php _includeJS("globaljs/lightbox/lightbox-plus-jquery.min.js"); ?>
    <title>会议详情</title>
</head>
<div>
    <div class="title-bg">
    <span class="title"><?php e($data['NewsTitle']);?></span>
    </div>
    <div class="newspeople">
        <span>会议负责人：</span><span style="font-size: 14px;"><?php e($data["NewsPeople"]);?></span>
    </div>
    <div class="newstime">
        <span>会议时间：</span><span style="font-size: 14px;"><?php e($data["NewsTime"]);?></span>
    </div>
    <div class="attendence">
        <span>与会人员：</span><span style="font-size: 14px;"><?php e($data["Attendence"]);?></span>
    </div>
    <div class="title-content">
         <span>会议内容：</span>
         <p style="font-size: 14px;">
            <?php e($data["NewsContent"]);?> 
         </p>
    </div>
    <div class="title-img"><span>会议图片</span>
        <div class="img">
        <?php if(isset($imgArr)){foreach($imgArr as $img){?>
        
         <a data-lightbox="imagegroup1" href=<?php e($img);?>>
              <img  src="<?php e($img,'images/img.png'); ?>">
          </a>
        <?php }}?>
        </div>
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
