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
        ""
    
    ];
}