<?php
include_once '../include/lib.php';
$action = post("Action");
if($action==="Metting"){
    $newsId = post("NewsId");
    var_dump($newsId);
    query("update ClubNews set IsDeleted=1 where NewsId=$newsId");
    printResultByMessage("", 0);
}
