<?php
include_once '../include/lib.php';
include_once '../commn-function.php';
$action = post("Action");

if ($action==='memberStatistics'){
    $value = post("Value");
    $returnArr = [];
    //性别
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
    //学院
    else if ($value===1){
        foreach ($academyArr as $key => $value) {
            $sql = "select count(MemberId) from MemberInfo where Academy=$key";
            $data = getSingleData($sql);
            if($data!=0) {
                $returnArr[$value] = $data;
            }
        }
    }
    //成员
    else if ($value===2){
       
    }
}
