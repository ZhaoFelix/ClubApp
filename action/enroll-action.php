<?php
include_once '../include/lib.php';

$action = post("Action");
$admin = $_SESSION["Admin"];
if($action==='clubEnroll'){
    $title = post("Title");
    $time = post("Time");
    $place = post("Place");
    $author = post("Author");
    $position = post("Position");
    $ability = post("Ability");
    $positionDesc = post("PositionDesc");
    $number = post("Number");  
    $insertArr = [
        "Time" => $time,
        "Title" => $title,
        "Place" => $place,
        "EnrollPeople" => $author,
        "AbilityDesc" => $ability,
        "PositionName" => $position,
        "PositionDesc" => $positionDesc,
        "CreateTime" => 'now()',
        "AddAdmin" => $admin
    ];
    insertData("ClubEnroll", $insertArr,TRUE);
    printResultByMessage("", 0);
}
//项目招募
else if($action=='Project'){
    $projectName = post("ProjectName");
    $projectAuthor = post("ProjectAuthor");
    $projectPlace = post("ProjectPlace");
    $startTime = post("StartTime");
    $endTime = post("EndTime");
    $positionDesc = post("PositionDesc");
    $abilityDesc = post("AbilityDesc");
    $deadline = post("Deadline");
    $projectNumber = post("ProjectNumber");
    $projectDesc = post("ProjectDesc");
    $position = post("Position");
    $projectPeople = post("ProjectPeople");
    $insertArr = [
        "PositionDesc" => $positionDesc,
        "PositionName" => $position,
        "Number" => $projectNumber,
        "AbilityDesc" => $abilityDesc,
        "AddAdmin" =>$admin,
        "ProjectName" => $projectName,
        "EnrollPeople" => $projectAuthor,
        "CreateTime" => 'now()',
        "ProjectDesc" => $projectDesc,
        "StartTime" => $startTime,
        "EndTime" => $endTime,
        "Deadline" => $deadline,
        "ProjectPeople" => $projectPeople
    ];
    $id = insertData("ProjectEnroll", $insertArr,TRUE);
    if(isset($id)){
        printResultByMessage("", 0,$id);
    }
  
}
else if($action==="memberStatistics"){
    $value = post("Value");
    $returnArr = [];
    if($value===0){
        for($i=0;$i<2;$i++){
            $sql = "select count(MemberId) from MemberInfo where  Gender=$i";
            $data = getSingleData($sql);
            if($i==0){
                $returnArr["女生"] = $data;
            }
            else {
                $returnArr["男生"] = $data;
            }
            
        }   
    }
    else if ($value===1){
        
    }
    else if ($value===2){
        
    }
    
    printResultByMessage("", "0", $returnArr);
}