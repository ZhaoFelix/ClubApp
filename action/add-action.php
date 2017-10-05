<?php
include_once '../include/lib.php';

$action = post("Action");

//添加会议
if($action==="Metting"){
    $title = post("Title");
   $time = post("Time");
   $newspeople = post("NewsPeople");
   $content = post("Content");
   $attendence = post("Attendence");
   $imgLink = post("ImgLink");
   $imgArr = explode(",", $imgLink);
   $imgJson = json_encode($imgArr);
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
         "PublishedImg" => $imgJson,
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
else if($action==="addAdminRole"){
    $roleName = post("RoleName");
    $desc = post("Desc");
    $insertArr = [
        "RoleName" => $roleName,
        "RoleDescription" => $desc,
        "CreateTime" => "now()"
    ];
    insertData("AdminRole", $insertArr,TRUE);
    printResultByMessage("", 0);
    
}