<?php
include_once '../include/template.php';
$newsId = get("newsid",0);
if ($newsid===0){
    $sql = "select * from ClubNews";
    $data = getData($sql);
}
 else {
     $sql = "select * from Newsid=$newsId";
     $data = getRowData($sql);
}
if(sizeof($data)>0){
    $temArr = [
        "success" => "success",
        "error_code" => "0",
        "result" => $data
    ];
    $returnJson = json_encode($temArr);
}
echo "<pre>";
var_dump($returnJson); 
?>