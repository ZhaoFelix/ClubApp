<?php
include_once '../include/lib.php';

$action = post("Action");

//添加管理员
if($action==="Metting"){
   $title = post("Title");
   $time = post("Time");
   $people = post("People");
   $content = post("Content");
    $insertArr = [
        "Title" => $title,
        "DoTime" => $time,
        "People" => $pwd,
        "PublishedContent" => $content,
        "PublishTime" => 'now()'
        ];
        $id = insertData("ClubNews", $insertArr,TRUE);
        if(isset($id)){
            printResultByMessage('', 0);
        }
        else {
            printResultByMessage("添加失败", 1);
        }
        
}