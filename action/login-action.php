<?php
include_once '../include/lib.php';

$action = post('Action');
if($action === 'Login'){
    $phone = post("Phone");
    $pwd = post("Pwd");
    $pwds = md5($pwd."iosclub");
        $sql = "select * from Admin22aa where Name='$phone' and Pwdkkii='$pwds' and IsDeleted = 0 and IsUse = 1";
        $data = getData($sql);
        if(sizeof($data)>0){
            $_SESSION["Login"] = "OK";
            $_SESSION["Uid"] = $rs['AdminId'];
            $ip = $_SERVER['REMOTE_ADDR'];
            query("update Admin22aa set IP = '$ip',LoginTime = now() where Name = '$phone'");
            printResultByMessage('', 0);
        }else{
            printResultByMessage('账号或密码错误', 1);
        }
}

//添加管理员
else  if($action==="addAdmin"){
    $adminName = post("AdminName");
    $pwd = post("Password");
    $note = post("Note");
    $pwds = md5($pwd."iosclub");
    $insertArr = [
        'Name' => $adminName,
        'Pwdkkii' => $pwds,
        'Note' => $note,
        'CreateTime' => 'now()',
        'Role' => '超级管理员'
        ];
      insertData("Admin22aa", $insertArr,TRUE);
      
        printResultByMessage('', 0);         
}

//删除管理员
else if ($action==='deleted')
{
    $id = post("Id");
    query("update Admin22aa set IsDeleted = 1 where AdminId = $id");
    
}
//禁用管理员
else if ($action==='stopUse')
{
    $id = post("Id");
    query("update Admin22aa set IsUse = 0 where AdminId = $id");
    
}
else if($action==="reUse"){
    $id = post("Id");
    query("update Admin22aa set IsUse = 1 where AdminId = $id");
}
