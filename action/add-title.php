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
    $insertArr = [
        "NewsTitle" => $title,
        "NewsTime" => $time,
        "NewsPeople" => $newspeople,
        "NewsContent" => $content,
        "CreateTime" => 'now()',
        "PublishedImg" => $imgLink,
        "AddPeople" => $_SESSION["admin"]
        ];
        $id = insertData("ClubNews", $insertArr);
        
        if(isset($id)){
            printResultByMessage('', 0);
        }
        else {
            printResultByMessage("添加失败", 1);
        }        
}
