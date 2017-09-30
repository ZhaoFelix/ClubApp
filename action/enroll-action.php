<?php
include_once '../include/lib.php';

$action = post("Action");
if($action==='clubEnrolll'){
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
        "Title" => $time,
        "Place" => $place,
        "EnrollPeople" => $author,
        "AbilityDesc" => $ability,
        "Position" => $position,
        "PositionDesc" => $positionDesc,
        "CreateTime" => 'now()'
    ];
}
else if($action=='Project'){
    /*
        ProjectName:projectName,
        ProjectAuthor:projectAuthor,
        ProjectPeople:projectPeople,
        StartTime:startTime,
        EndTime:endTime,
        ProjectNumber:projectNumber,
        PositionDesc:positionDesc,
        AbilityDesc:abilityDesc,
        ProjectPlace:projectPlace,
        Deadline:deadline
     *      */
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