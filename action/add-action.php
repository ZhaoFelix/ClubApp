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
   $place = post("NewsPlace");
   
    $insertArr = [
       "NewsTitle" => $title,
        "NewsTime" => $time,
        "NewsPeople" => $newspeople,
        "Attendence" => $attendence,
        "NewsContent" => $content,
        "CreateTime" => 'now()',
        "AddPeople" => $_SESSION["admin"],
         "PublishedImg" => $imgLink,
        "NewsPlace" => $place
        ];
        insertData("ClubNews", $insertArr, TRUE);
        printResultByMessage("", "0");
}
