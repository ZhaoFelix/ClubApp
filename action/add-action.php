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
   $addPeople = $_SESSION["Admin"];
   $place = post("NewsPlace");
   
    $insertArr = [
       "NewsTitle" => $title,
        "NewsTime" => $time,
        "NewsPeople" => $newspeople,
        "Attendence" => $attendence,
        "NewsContent" => $content,
        "CreateTime" => 'now()',
        "AddPeople" => $addPeople,
         "PublishedImg" => $imgLink,
        "NewsPlace" => $place
        ];
        insertData("ClubNews", $insertArr, TRUE);
        printResultByMessage("", "0");
}
else if($action==='Annocument'){
    $title = post("Title");
    $content = post("Content");
    $author = post("Author");
    $insertArr = [
        "NewsTitle" => $title,
        "NewsContent" => $content,
        "NewsPeople" => $author,
        "CreateTime" => "now()",
        "NewsType" => '1',
        "AddPeople" =>   $_SESSION["Admin"]
    ];
    insertData("ClubNews", $insertArr,TRUE);
    printResultByMessage("", 0);
}