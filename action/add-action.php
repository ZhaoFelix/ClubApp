<?php
include_once '../include/lib.php';

$action = post("Action");
$addPeople = $_SESSION["Admin"];//添加的管理员名
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

/*`ProjectId`
 * `AbilityDesc`
 * `IsPublished`
 * `IsDeleted`
 * `AddAdmin`
 * `PublishAdmin`
 * `ProjectName`
 * `EnrollPeople`
 * `CreateTime`
 * `PublishedTime`
 * `ProjectDesc`
 * `StartTime`
 * `EndTime`
 * `TechPeople`
 * `UIPeople`
 * `ProjectImg`*/
else if($action==="ProjectAdd"){
    $projectPrincipal = post("ProjectPrincipal");
    $projectName = post("ProjectName");
    $projectDesc = post("ProjectDesc");
    $UIPeople = post("UIPeople");
    $techPeople = post("TechPeople");
    $startTime = post("StartTime");
    $endTime = post("EndTime");
    $projectImg = post("ProjectImg");
    $tempArr = [
        "AddAdmin" => $addPeople,
        "ProjectName" => $projectName,
        "ProjectDesc" => $projectDesc,
        "StartTime" => $startTime,
        "EndTime" => $endTime,
        "TechPeople" => $techPeople,
        "UIPeople" => $UIPeople,
        "ProjectImg" => $projectImg,
        "CreateTime" => 'now()'
    ];
    $id = insertData("ProjectList", $insertArr);
    if($id) {
        printResultByMessage("", 1, $id);
    }
}