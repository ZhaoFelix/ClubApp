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

