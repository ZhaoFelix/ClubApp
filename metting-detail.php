<?php
include_once 'include/template.php';
$newid = get("newsid");
$sql = "select * from ClubNews where NewsId=$newid";
$data = getRowData($sql);
$imgStr = $data['PublishedImg'];
//json_decode解析时字符串中不能存在制表符
$imgArr = json_decode($imgStr);
?>
<head>
    {css/metting-detail.css}
    {globaljs/lightbox/css/lightbox.css}
    {globaljs/lightbox/css/lightbox.css}
    {globaljs/lightbox/lightbox-plus-jquery.min.js}
    <title>会议详情</title>
</head>
<div>
    <div class="title-bg">
    <span class="title">{$data['NewsTitle']}</span>
    </div>
    <div class="newspeople">
        <span>会议负责人：</span><span style="font-size: 14px;">{$data["NewsPeople"]}</span>
    </div>
    <div class="newstime">
        <span>会议时间：</span><span style="font-size: 14px;">{$data["NewsTime"]}</span>
    </div>
    <div class="attendence">
        <span>与会人员：</span><span style="font-size: 14px;">{$data["Attendence"]}</span>
    </div>
    <div class="title-content">
         <span>会议内容：</span>
         <p style="font-size: 14px;">
            {$data["NewsContent"]} 
         </p>
    </div>
    <div class="title-img"><span>会议图片</span>
        <div class="img">
        {foreach:$imgArr as $img}
        {** 图片点击放大预览 **}
         <a data-lightbox="imagegroup1" href={$img}>
              <img  src="{$img default 'images/img.png'}">
          </a>
        {/foreach}
        </div>
    </div>  
    <div class="publishtime">
        <span>
            发布时间:
        </span>
        <span>
            {$data["PublishedTime"]}
        </span>
    </div> 
</div>
