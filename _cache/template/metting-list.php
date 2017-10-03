<?php

$sql = "select * from ClubNews where IsDeleted = 0";
$newsData = getData($sql);
$count = sizeof($newsData);
?>

<?php include(template("publicInclude.php"));?>
<head>
<title>资讯列表</title>
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 社团资讯 <span class="c-gray en">&gt;</span> 会议列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<body>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" data-title="添加会议" data-href="add-metting.php" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加会议</a></span> <span class="r">共有数据：<strong><?php e($count);?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th width="80">发布者</th>
                                        <th width="80">会议时间</th>
                                        <th width="80">会议地点</th>
					<th width="120">发布时间</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
                       
			<tbody>
                             <?php if(isset($newsData)){$c=-1;foreach($newsData as $data){$c++?>
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td><?php echo $c+1;?></td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','metting-detail.php?newsid=<?php e($data['NewsId']);?>')" title="查看"><?php e($data["NewsTitle"]);?></u></td>
					<td><?php e($data["Publishor"]);?></td>
                                        <td><?php e($data["NewsTime"]);?></td>
					<td><?php e($data["NewsPlace"]);?></td>
					<td><?php e($data["PublishedTime"]);?></td>
                                        <?php if($data["IsPublished"]==='1'){?>
                                        <td class="td-status"><span class="label label-success radius">已发布</span></td>
                                        <?php }else{ ?>
                                        <td class="td-status"><span class="label label-success radius" style="background-color: gray">未发布</span></td>
                                        <?php }?>
					<td class="f-14 td-manage">
                                            <?php if($data["IsPublished"]==='1'){?>
                                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,<?php e($data['NewsId']);?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                                            <?php }else{ ?>
                                            <a style="text-decoration:none" onClick="article_shenhe(this,<?php e($data['NewsId']);?>)" href="javascript:;" title="审核发布"><i class="Hui-iconfont">审核</i></a>
                                            <a style="text-decoration:none" class="ml-5" onClick="article_edit('会议编辑','add-metting.php?newsid=<?php e($data['NewsId']);?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,<?php e($data['NewsId']);?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> 
                                            <?php }?>
                                           </td>
				</tr>
                                <?php }}?>
			
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
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
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
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				$.post("action/deleted-action.php",{Action:"Metting",NewsId:id},function(re){
                                    consoloe.log(re);
                                })
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
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
                $.post("action/update-action.php",{Action:"Metting",NewsId:newsId},function(re){
                    
                });
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script> 
</body>
