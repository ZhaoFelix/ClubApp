<?php
include_once 'include/template.php';
$sql = "select * from AdminRole";
$roleData = getData($sql);
$count = sizeof($roleData);
?>

{publicInclude.php}
<head>
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray" style="margin-bottom: 20px"><span class="l"> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','add-admin-role.php','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>{$count}</strong> 条</span> </div>
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
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
                    {foreach:$roleData as $data counter:$c}
                    <?php
                        $role = $data["RoleName"];
                        $sql = "select * from Admin22aa where Role='".$role."'";
                        $roleData = getData($sql);
                    ?>
			<tr class="text-c">
				
				<td>{$c+1}</td>
				<td>{$data["RoleName"]}</td>
                                <td>
                                {foreach:$roleData as $list}
                                {$list["Name"]} &nbsp;
                                {/foreach}
                                </td>
				<td>{$data["RoleDescription"]}</td>
				<td class="f-14">
                                    <a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
                        {/foreach}
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
</script>
