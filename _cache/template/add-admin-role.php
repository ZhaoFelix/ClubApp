<?php

?>

<?php include(template("publicInclude.php"));?>
<title>新建网站角色 - 管理员管理 - H-ui.admin v3.1</title>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="roleName" name="roleName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <textarea name="" cols="" rows="" id="roleDesc" class="textarea"  placeholder="对角色的权限进行描述" dragonfly="true"  ></textarea>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                            <div type="submit" class="btn btn-success radius" onclick="add_admin_role()" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</div>
			</div>
		</div>
	</form>
</article>
    
<script type="text/javascript">
    
function add_admin_role(){
     var roleName = $("#roleName").val();
     var desc = $("#roleDesc").val();
     if (roleName=='' || desc==''  ){
         alert("请填写完整信息。")
     }
     else {
         $.post("action/add-action.php",{
                    "Action":"addAdminRole",
                    "RoleName":roleName,
                    "Desc":desc,
                },function(re){
              re = JSON.parse(re);
              if(re.ErrorCode=='0'){
                  //关闭当前窗口
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.layer.close(index);
              }
         });
     } 
}
</script>
