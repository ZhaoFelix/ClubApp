<?php

$sql = "select * from AdminRole";
$roleData = getData($sql);
$count = sizeof($roleData);
?>

<?php include(template("publicInclude.php"));?>
<head>
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray" style="margin-bottom: 20px"><span class="l"> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','add-admin-role.php','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong><?php e($count);?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">
				
				<th width="40">ID</th>
				<th width="200">角色名</th>
				<th>用户列表</th>
				<th width="300">描述</th>
                                <th width="100">是否已启用</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
                    <?php if(isset($roleData)){$c=-1;foreach($roleData as $data){$c++?>
                    <?php
                        $role = $data["RoleName"];
                        $sql = "select * from Admin22aa where Role='".$role."'";
                        $roleData = getData($sql);
                    ?>
			<tr class="text-c">
				
				<td><?php echo $c+1;?></td>
				<td><?php e($data["RoleName"]);?></td>
                                <td>
                                <?php if(isset($roleData)){foreach($roleData as $list){?>
                                <?php e($list["Name"]);?> &nbsp;
                                <?php }}?>
                                </td>
				<td><?php e($data["RoleDescription"]);?></td>
                                <td class="td-status"><?php if($data["IsUse"]=='1'){?><span class="label label-success radius">已启用</span>
                                    <?php }elseif($data["IsUse"]=='0'){ ?><span class="label label-default radius">已禁用</span><?php }?>
                                </td>
				<td class="f-14">
                                    <?php if($data["IsUse"]=='1'){?>
                                    <a style="text-decoration:none" onClick="admin_stop(this,<?php e($data['RoleId']);?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
                                    <?php }elseif($data["IsUse"]=='0'){ ?><a onClick="admin_start(this,<?php e($data['RoleId']);?>)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i>
                                    </a><?php }?>
                                    <a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
                        <?php }}?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}

/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
                $.post("action/update-action.php",{
                    "Action":"stopUse",
                    "Id":id
        },function(re){
                location.href = "admin-role.php";
        });
		
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		 $.post("action/update-action.php",{
                    "Action":"reUse",
                    "Id":id
        },function(re){
                location.href = "admin-role.php";
        });
	});
}
</script>
