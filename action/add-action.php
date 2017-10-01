<?php
include_once '../include/lib.php';

$action = post("Action");

//添加管理员
if($action==="Metting"){
    $title = post("Title");
   $time = post("Time");
   $newspeople = post("NewsPeople");
   $content = post("Content");
   $attendence = post("Attendence");
    $imgLink = post("ImgLink");
    $addPeople = $_SESSION["admin"];
    $insertArr = [
        "NewsTitle" => $title,
        "NewsTime" => $time,
        "NewsPeople" => $newspeople,
        "NewsContent" => $content,
        "CreateTime" => 'now()',
        "PublishedImg" => $imgLink,
        "AddPeople" => $_SESSION["admin"]
        ];
        printResultByMessage("", "0");
}
