<?php

$newsId = get("newsid",0);
$returnJson;
if ($newsId===0){
    $sql = "select * from ClubNews";
    $data = getData($sql);
}
 else {
     $sql = "select * from ClubNews where Newsid=$newsId";
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
echo $returnJson;
?>