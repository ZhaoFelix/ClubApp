<?php
include_once '../include/lib.php';
include_once '../common.php';

$action = post('Action');

//登录操作
if($action === 'Login'){
    $phone = post("Phone");
    $pwd = post("Pwd");
    $pwds = md5($pwd."iosclub");
        $sql = "select * from Admin22aa where Name='$phone' and Pwdkkii='$pwds' and IsDeleted = 0 and IsUse = 1 and ExpiredTime > now()";
        $data = getRowData($sql);
        if(sizeof($data)>0){
            $_SESSION["Login"] = "OK";
            $_SESSION["Admin"] = $phone;
            $_SESSION["Role"] = $data["Role"];
           // $_SESSION["Uid"] = $rs['AdminId'];
            $ip = $_SERVER['REMOTE_ADDR'];
            query("update Admin22aa set IP = '$ip',LoginTime = now() where Name = '$phone'");
            printResultByMessage('', 0);
        }else{
            printResultByMessage('账号或密码错误', 1);
        }
}

//添加管理员
else  if($action==="addAdmin"){
    //SELECT date_add(now(), interval 30 day); 
    $adminName = post("AdminName");
    $pwd = post("Password");
    $note = post("Note");
    $pwds = md5($pwd."iosclub");
    $role = post("Role");   
    $roleName = $adminRoleArr[$role];
    //过期时间为30天
    $sql = "INSERT INTO `Admin22aa`( `Name`, `Pwdkkii`,  `Note`, `Role`, `CreateTime`, `ExpiredTime`) VALUES ('".$adminName."','".$pwds."','".$note."','".$roleName."',now(),date_add(now(), interval 30 day))";
    query($sql);
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

//添加社团信息
else  if ($action==="addmember"){
    
    $memberName = post("memberName");
    $memberGender = post("memberGender");
    $memberAcademy = post("memberAcademy");
    $memberClass = post("memberClass");
    $memberPhone = post("memberPhone");
    $memberQQ = post("memberQQ");
    $memberWechat = post("memberWechat");
    $memberPosition = post("memberPosition");
    $memberStatus = post("memberStatus");
    $studentid = post("studentid");
    $pwds = md5($studentid."iosclub");

    $insertArr = [
        'Name' => $memberName,
        'Academy' => $memberAcademy,
        'Class' => $memberClass,
        'Gender' => $memberGender,
        'Phone' => $memberPhone,
        'StudentId' => $studentid,
        'QQ' => $memberQQ,
        'Wechat' => $memberWechat,
        'Position' => $memberPosition,
        'Status' => $memberStatus,  
        'AddTime' => 'now()',
        'Pwd' => $pwds

        ];
       insertData("MemberInfo", $insertArr,TRUE);
        printResultByMessage('', 0);
}
