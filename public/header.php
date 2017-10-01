<?php
    include_once '../include/template.php';
    
?>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">iOS开发者协会</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml"></a> <span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
                                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A" ><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','add-metting.php','','510')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="project_add('添加项目','add-project.php','','510')"><i class="Hui-iconfont">&#xe613;</i> 项目</a></li>
							<li><a href="javascript:;" onclick="member_add('添加成员','add-member.php','','510')"><i class="Hui-iconfont">&#xe620;</i> 成员</a></li>
							<li><a href="javascript:;" onclick="admin_add('添加管理员','add-member-admin.php','','510')"><i class="Hui-iconfont">&#xe60d;</i> 管理员</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
                                        <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A" id="dropDown_A"> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="#">个人信息</a></li>
							<li><a href="logout.php">切换账户</a></li>
							<li><a href="logout.php">退出</a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>