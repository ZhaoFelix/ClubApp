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
    $insertArr = [
        "NewsTitle" => $title,
        "NewsTime" => $time,
        "NewsPeople" => $newspeople,
        "NewsContent" => $content,
        "CreateTime" => 'now()'
        ];
        $id = insertData("ClubNews", $insertArr);
        var_dump($id);
        if(isset($id)){
            printResultByMessage('', 0);
        }
        else {
            printResultByMessage("添加失败", 1);
        }
        
}