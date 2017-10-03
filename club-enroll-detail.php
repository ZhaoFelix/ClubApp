<?php
include_once 'include/template.php';
$enrollid = get("enrollid",0);
$sql = "select * from ClubEnroll where EnrollId=$enrollid";
$data = getRowData($sql);
?>
<head>
    {css/club-enroll-detail.css}
    <title>社团招募</title>
</head>
<div>
    <div class="title-bg">
    <span class="title">{$data["Title"]}</span>
    </div>
    <div class="author">
        <span>招募负责人：</span><span >{$data["EnrollPeople"]}</span>
    </div>
    <div class="publishtime">
        <span>招募时间：</span><span >{$data["Time"]}</span>
    </div>
    <hr style=" margin: 40px 0;">
    <div class="title-content">
        <div class="position common">
            <span>招募职位：</span><span>{$data["PositionName"]}</span>
        </div>
        <div class="number common">
            <span>招募人数：</span><span>{$data["Number"]}人</span>
        </div>
        <div class="location common">
            <span>招募地点：</span><span>{$data["Place"]}</span>
        </div>
        <div class="description-position common">
            <span>职位描述：</span><br><span>{$data["PositionDesc"]}</span>
        </div>
        <div class="description-ability common">
            <span >能力要求：</span><br><span>{$data["AbilityDesc"]}</span>
        </div>
    </div>
     <div class="footer">
         <div>
              <span>发布者：</span><span>{$data["PublishAdmin"]}</span>
         </div>
         <div style="margin-top: 10px">
             <span>发布时间：</span><span>{$data["PublishedTime"]}</span>
         </div>
            
           
     </div>
    <div class="title-img">
        
    </div>
    
    
</div>
