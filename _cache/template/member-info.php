<?php

include_once 'common-function.php';
$memberid = get("memberid");
$sql = "select * from MemberInfo where IsDeleted = 0 and MemberId = $memberid";
$data = getRowData($sql);
?>

<?php _includeJS("lib/jquery/1.9.1/jquery.min.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.min.js"); ?>
<?php _includeJS("lib/layer/2.4/layer.js"); ?>
<?php _includeJS("lib/datatables/1.10.0/jquery.dataTables.min.js"); ?>
<?php _includeJS("static/h-ui.admin/js/H-ui.admin.js"); ?>

<?php _includeCSS("static/h-ui/css/H-ui.min.css"); ?>
<?php _includeCSS("static/h-ui.admin/css/H-ui.admin.css"); ?>
<?php _includeCSS("lib/Hui-iconfont/1.0.8/iconfont.css"); ?>
<?php _includeCSS("static/h-ui.admin/skin/default/skin.css"); ?>
<?php _includeCSS("static/h-ui.admin/css/style.css"); ?>

<head>
<title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
        
	<img class="avatar size-XL l" src="static/h-ui/images/ucnter/avatar-default.jpg">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18"><?php e($data["Name"]);?></span>
			<span class="pl-10 f-12"><?php e($data["Position"]);?></span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">这家伙很懒，什么也没有留下</dd>
	</dl>
       
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="80">性别：</th>
				<td><?php if($data["Gender"]==1){?>男<?php }else{ ?>女<?php }?></td>
			</tr>
                        <tr>
				<th class="text-r">学院：</th>
                                <?php
                                    $academyKey = $data["Academy"];
                                    $academy = $academyArr[$academyKey];
                                    
                                ?>
				<td><?php e($academy);?></td>
			</tr>
                        <tr>
				<th class="text-r">班级：</th>
				<td><?php e($data["Class"]);?></td>
			</tr>
			<tr>
				<th class="text-r">手机：</th>
				<td><?php e($data["Phone"]);?></td>
			</tr>
			<tr>
				<th class="text-r">邮箱：</th>
				<td>admin@mail.com</td>
			</tr>
			
                        <tr>
				<th class="text-r">QQ：</th>
				<td><?php e($data["QQ"]);?></td>
			</tr>
                        <tr>
				<th class="text-r">微信：</th>
				<td><?php e($data["WeChat"]);?></td>
			</tr>
			<tr>
				<th class="text-r">加入时间：</th>
				<td><?php e($data["JoinTime"]);?></td>
			</tr>
			<tr>
				<th class="text-r">当前状态：</th>
                                <?php
                                    $statusid = $data["Status"];
                                    $statusStr = $statusArr[$statusid]; 
                                ?>
				<td class="td-status"><span class="label label-success radius"><?php e($statusStr);?></span></td>
			</tr>
                        <tr>
				<th class="text-r">参与的项目：</th>
				<td>社团应用</td>
			</tr>
		</tbody>
	</table>
    
</div>
