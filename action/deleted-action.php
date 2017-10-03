<?php
include_once '../include/lib.php';
$action = post("Action");
if($action==="Metting"){
    $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubNews set IsDeleted=1 where NewsId=$newsId");
    printResultByMessage("", 0);
}
else if($action==="Annocument"){
    $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubNews set IsDeleted=1 where NewsId=$newsId");
    printResultByMessage("", 0);
}
else if ($action==="ClubEnroll"){
     $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubEnroll set IsDeleted=1 where EnrollId=$newsId");
    printResultByMessage("", 0);
}

