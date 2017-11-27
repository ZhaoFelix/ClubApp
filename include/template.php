<?php

$prepath_template = dirname(__FILE__);
$isTemplate = true;
include_once("$prepath_template/lib.php");


$FUNCTION_DECLARE = function_exists("FUNCTION_DECLARED");


$_root = realpath($_SERVER["DOCUMENT_ROOT"]);

//载入 自定义模板 文件
//$_INC_FILE = "../../../_customtag.php";
//for($lInc=0;$lInc<4;$lInc++){
//    if(file_exists($_INC_FILE)){
//        include_once $_INC_FILE;
//    }
//    $_INC_FILE = substr($_INC_FILE, 3);
//}

global $roleType;//角色类型的全局变量

include_once(template(basename($_SERVER['PHP_SELF'])));

die();
function FUNCTION_DECLARED(){}