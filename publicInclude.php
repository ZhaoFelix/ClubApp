<?php
include_once 'include/template.php';
include_once 'common-function.php';
global $roleType;
if (isset($_SESSION["Role"])) {
    $adminRole = $_SESSION["Role"];
    foreach ($adminRoleArr as $key => $value) {
        if ($adminRole === $value) {
             $roleType = $key;
             $_SESSION["Role"] = $key;
        }
    }
}
?>
{globaljs/all.js}
{static/h-ui/js/H-ui.js}
{static/h-ui/js/H-ui.min.js}
{lib/layer/2.4/layer.js}
{static/h-ui.admin/js/H-ui.admin.js}
{lib/jquery.contextmenu/jquery.contextmenu.r2.js}
{lib/hcharts/Highcharts/5.0.6/js/highcharts.js}
{lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js}
{lib/hcharts/Highcharts/5.0.6/js/highcharts-3d.js}
{lib/My97DatePicker/4.8/WdatePicker.js}
{lib/ueditor/ueditor.config.js}
{lib/ueditor/ueditor.all.min.js}
{lib/ueditor/zh-cn.js}
{lib/datatables/1.10.0/jquery.dataTables.min.js}
{js/common.js}
{js/wangEditor.min.js}

{static/h-ui/css/H-ui.min.css}
{static/h-ui.admin/css/H-ui.login.css}
{static/h-ui.admin/css/H-ui.admin.css}
{lib/Hui-iconfont/1.0.8/iconfont.css}
{static/h-ui.admin/css/style.css}
<!--{static/h-ui.admin/skin/default/skin.css}-->
{css/style.css}