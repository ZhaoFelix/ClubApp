<?php

include_once 'include/template.php';
include_once 'common-function.php';
$sql = "select * from MemberInfo where IsDeleted = 0";
$data = getData($sql);
?>

{publicInclude.php}

<head>
    <title>资讯列表</title>
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 社团资讯 <span class="c-gray en">&gt;</span> 会议列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<body>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" data-title="添加社员" data-href="add-member.php" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加社员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">ID</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th width="80">学院</th>
                    <th width="120">班级</th>
<!--					<th width="75">学号</th>-->
                    <th width="60">联系电话</th>
<!--                                    <th width="60">QQ</th>
                    <th width="60">加入时间</th>-->
                    <th width="60">职位</th>
                    <th width="60">当前状态</th>
                    <th width="120">操作</th>
                </tr>
            </thead>
            <tbody>
                {foreach:$data as $data1 counter:$c}
                <tr class="text-c">
                    <td><input type="checkbox" value="" name=""></td>
                    <td>{$c+1}</td>
                    <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看', 'member-info.php?memberid={$data1['MemberId']}', '10001')" title="查看">{$data1["Name"]}</u></td>
                    <td>{if:$data1["Gender"]==1}男{else}女{/if}</td>
                    <?php
                    $academyKey = $data1["Academy"];
                    $academy = $academyArr[$academyKey];
                    ?>
                    <td>{$academy}</td>
                    <td>{$data1["Class"]}</td>
<!--                                        <td>{$data1["StudenId"]}</td>-->
                    <td>{$data1["Phone"]}</td>
<!--					<td>{$data1["QQ"]}</td>
                    <td>{$data1["AddTime"]}</td>-->
<!--                                    <td>{$data1["JoinTime"]}}</td>-->
                    <td>{$data1["Position"]}</td>
                    <?php
                        $statusKey = $data1["Status"];
                    ;
                        $status = $statusArr[$statusKey];
                    ?>
                    <td class="td-status"><span class="label label-success radius">{$status}</span></td>
                    <td class="f-14 td-manage">

                        <a style="text-decoration:none" class="ml-5" onClick="article_edit('成员编辑', 'add-member.php?adminid={$data['MemberId']}', '10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <a style="text-decoration:none" class="ml-5" onClick="article_del(this, '10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

</body>
<script type="text/javascript">

    $('.table-sort').dataTable({
    "aaSorting": [[ 1, "desc" ]], //默认第几个排序
            "bStateSave": true, //状态保存
            "pading":false,
            "aoColumnDefs": [
                    //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                    {"orderable":false, "aTargets":[0, 9]}// 不参与排序的列
            ]
            });
    /*资讯-添加*/
    function article_add(title, url, w, h){
    var index = layer.open({
    type: 2,
            title: title,
            content: url
    });
    layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title, url, id, w, h){
    var index = layer.open({
    type: 2,
            title: title,
            content: url
    });
    layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj, id){
    layer.confirm('确认要删除吗？', function(index){
    $.ajax({
    type: 'POST',
            url: '',
            dataType: 'json',
            success: function(data){
            $(obj).parents("tr").remove();
            layer.msg('已删除!', {icon:1, time:1000});
            },
            error:function(data) {
            console.log(data.msg);
            },
    });
    });
    }

    /*资讯-审核*/
    function article_shenhe(obj, id){
    layer.confirm('审核文章？', {
    btn: ['通过', '不通过', '取消'],
            shade: false,
            closeBtn: 0
    },
            function(){
            $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布', {icon:6, time:1000});
            },
            function(){
            $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
            $(obj).remove();
            layer.msg('未通过', {icon:5, time:1000});
            });
    }

    /*资讯-发布*/
    function article_start(obj, id){
    layer.confirm('确认要发布吗？', function(index){
    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
    $(obj).remove();
    layer.msg('已发布!', {icon: 6, time:1000});
    });
    }
    /*资讯-申请上线*/
    function article_shenqing(obj, id){
    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
    $(obj).parents("tr").find(".td-manage").html("");
    layer.msg('已提交申请，耐心等待审核!', {icon: 1, time:2000});
    }

</script> 
</body>
