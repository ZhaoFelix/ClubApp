<?php
include_once 'include/template.php';
$sql = "select * from ProjectEnroll where IsDeleted=0";
$projectData = getData($sql);
$count = sizeof($projectData);
?>

{publicInclude.php}


<head>
<title>资讯列表</title>
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>   招募管理 <span class="c-gray en">&gt;</span> 项目招募 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<body>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" data-title="项目招募" data-href="enroll-project.php" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 项目招募</a></span> <span class="r">共有数据：<strong>{$count}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
                                    <th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>项目名称</th>
                                        <th>招募职位</th>
                                        <th>招募人数</th>
                                        <th width="80">项目起始时间</th>
					<th width="80">项目负责人</th>
                                        <th width="180">项目参与人</th>
					<th width="120">招募截止时间</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
                            {foreach:$projectData as $data counter:$c}
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>{$c+1}</td>
                                        <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','project-enroll-detail.php?projectid={$data['ProjectId']}')" title="查看">{$data["ProjectName"]}</u></td>
                                        <td>{$data["PositionName"]}</td>
                                        <td>{$data["Number"]}人</td>
                                        <td>{$data["StartTime"]}~{$data["EndTime"]}</td>
                                        <td>{$data["EnrollPeople"]}</td>
					<td>{$data["ProjectPeople"]}</td>
					<td>{$data["Deadline"]}</td>
					{if:$data["IsPublished"]==='1'}
                                        <td class="td-status"><span class="label label-success radius">已发布</span></td>
                                        {else}
                                        <td class="td-status"><span class="label label-success radius" style="background-color: gray">未发布</span></td>
                                        {/if}
					<td class="f-14 td-manage">
                                            {if:$data["IsPublished"]==='1'}
                                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,{$data['ProjectId']})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                                            {else}
                                            <a style="text-decoration:none" onClick="article_shenhe(this,{$data['ProjectId']})" href="javascript:;" title="审核发布"><i class="Hui-iconfont">审核</i></a>
                                            <a style="text-decoration:none" class="ml-5" onClick="article_edit('会议编辑','enroll-project.php?projectid={$data['ProjectId']}')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,{$data['ProjectId']})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> 
                                            {/if}</tr>
                                {/foreach}
			</tbody>
		</table>
        </div>

</body>
<script type="text/javascript">
    
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,9]}// 不参与排序的列
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
            console.log(id);
	$.post("action/deleted-action.php",{Action:"Project",ProjectId:id},function(re){
               location.href = "project-enroll.php";                     
          })	
	});
}

/*资讯-审核*/
function article_shenhe(obj,newsId){
	layer.confirm('审核文章？', {
		btn: ['发布','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
            //通过时调用
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
                $.post("action/update-action.php",{Action:"Project",ProjectId:newsId},function(re){
                    location.href = "project-enroll.php";  
                });
	});	
}

</script> 
</body>
