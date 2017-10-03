<?php

$newid = get("newsid");
$sql = "select * from ClubNews where NewsId=$newid";
$data = getRowData($sql);

?>
<style>
    .title {
    width: 200px;
    font-size: 40px;
    margin-top: 20px;
    margin-left: calc(100%/2 - 100px);
}

.newspeople {
    width: 30%;
    margin-left: 10%;
    float: left;
    text-align: center;
}
.newspeople span:last-child {
    color: red;
}
.newstime {
    text-align: center;
    width: 40%;
    margin-right: 20%;
    float: right;
}
.newstime span:last-child {
    color: gray;
}
.title-content {
    margin: 10px 10px;
}
.title-content p {
    margin-left: 80px;
}
.attendence {
    margin: 10px 10px;
    height: 50px;
    line-height: 50px;
}

</style>
<head>
    <?php _includeJS("globaljs/all.js"); ?>
    <?php include(template("function/common-function.php"));?>
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
        <span>发布时间：</span><span ><?php e($data["NewsTime"]);?></span>
    </div>
    <div class="title-content">
         <span>公告内容：</span>
         <?php
            $str =  $data["NewsContent"];
         ?>
         <?php e($str);?>
    </div>
</div>
<script>
  $.ready(function(){
      htm = "<?php e($str);?>";
      console.log(htm);
      $(".title-content").html(htm);
  });
</script>
