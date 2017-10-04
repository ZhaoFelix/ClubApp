<?php
include_once '../include/lib.php';
$action = post("Action");
$publisher = $_SESSION["Admin"];
if($action==="Metting"){
    $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubNews set IsPublished=1,PublishedTime=now(),Publisher='$publisher' where NewsId=$newsId");
    printResultByMessage("", 0);
}
else if($action==="Annocument"){
    $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubNews set IsPublished=1,PublishedTime=now(),Publisher='$publisher' where NewsId=$newsId");
    printResultByMessage("", 0);
}
else if($action==="ClubEnroll"){
    $newsId = post("NewsId"); 
    query("update ClubEnroll set IsPublished=1,PublishedTime=now(),PublishAdmin='$publisher' where EnrollId=$newsId");
    printResultByMessage("", 0);
}
else if($action==="stopUse"){
    $roleId = post("Id"); 
    query("update AdminRole set IsUse=0 where RoleId=$roleId");
    printResultByMessage("", 0);
}
else if($action==="reUse"){
    $roleId = post("Id"); 
    query("update AdminRole set IsUse=1 where RoleId=$roleId");
    printResultByMessage("", 0);
}
else if($action==="updateAdmin"){
    $adminName = post("AdminName");
    $adminId = post("AdminId");
    $pwd = post("Password");
    $note = post("Note");
    $pwds = md5($pwd."iosclub"); 
    $role = "一般管理员";
    $sql = "UPDATE `Admin22aa` SET `Name`='".$adminName."',`Pwdkkii`='".$pwds."',`Note`='".$note."',`Role`='".$role."',`ExpiredTime`=date_add(now(), interval 30 day) WHERE AdminId=".$adminId;
   
    query($sql);
    printResultByMessage("", 0);
}
else if($action==="Project"){
    $newsId = post("ProjectId"); 
    query("update ProjectEnroll set IsPublished=1,PublishedTime=now(),PublishAdmin='$publisher' where ProjectId=$newsId");
    printResultByMessage("", 0);
}

