<?php
include_once '../include/lib.php';
include_once 'common-function.php';
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
                $tempArr["女生"] = $data;
            }
            else {
                $tempArr["男生"] = $data;
            }
            array_push($returnArr, $tempArr);
        }   
    }
    //学院
    else if ($value===1){
        foreach ($academyArr as $key => $value) {
            $sql = "select count(MemberId) from MemeberInfo where Academy=$key";
            $data = getSingleData($sql);
            if($data!=0){
                $tempArr[$value] = $data;
            }
            array_push($returnArr, $tempArr);
        }
    }
    //职位
    else if ($value===2){
        foreach ($positionArr as $key => $value) {
            $sql = "select count(MemberId) from MemeberInfo where Position=$key"; 
            $data = getSingleData($sql);
            if($data!=0){
                $tempArr[$key] = $data;
            }
            array_push($returnArr, $tempArr);
        }
    }
    
    printResultByMessage("", "0", $returnArr);
}