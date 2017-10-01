<?php
  include_once 'include/template.php';
  $sql = "select * from Admin22aa where IsDeleted=0";
  $adminData = getData($sql);
  $count = sizeof($adminData);
  
  
?>

{publicInclude.php}

<head>
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="admin_add('添加管理员','add-member-admin.php','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>{$count} </strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th>角色</th>
				<th width="130">加入时间</th>
                                <th width="130">备注</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
                    {foreach:$adminData as $data counter:$c}
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{$c+1}</td>
				<td>{$data["Name"]}</td>
				<td>{$data["Role"]}</td>
				<td>{$data["CreateTime"]}</td>
                                <td>{$data["Note"]}</td>
                                <td class="td-status">{if:$data["IsUse"]=='1'}<span class="label label-success radius">已启用</span>{elseif:$data["IsUse"]=='0'}<span class="label label-default radius">已禁用</span>{/if}</td>
				<td class="td-manage">{if:$data["IsUse"]=='1'}<a style="text-decoration:none" onClick="admin_stop(this,{$data['AdminId']})" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>{elseif:$data["IsUse"]=='0'}<a onClick="admin_start(this,{$data['AdminId']})" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>{/if}
                                    <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','add-member-admin.php?adminid={$data['AdminId']}','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                                    <a title="删除" href="javascript:;" onclick="admin_del(this,{$data['AdminId']})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
                        {/foreach}
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">

function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.post("action/login-action.php",{
                    "Action":"deleted",
                    "Id":id
        },function(re){
            location.href = "member-admin-list.php";
        });		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
                $.post("action/login-action.php",{
                    "Action":"stopUse",
                    "Id":id
        },function(re){
                location.href = "member-admin-list.php";
        });
		
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		 $.post("action/login-action.php",{
                    "Action":"reUse",
                    "Id":id
        },function(re){
                location.href = "member-admin-list.php";
        });
	});
}
</script>
