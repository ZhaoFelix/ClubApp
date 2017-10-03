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
else if($action=='Project'){
    $projectName = post("ProjectName");
    $projectAuthor = post("ProjectAuthor");
    $projectPlace = post("ProjectPlace");
    $startTime = post("StartTime");
    $endTime = post("EndTime");
    $positionDesc = post("PositionDesc");
    $abilityDesc = post("AbilityDesc");
    $deadline = post("Deadline");
    $insertArr = [];
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