<?php

$adminid = get("adminid",0);
$sql = "select * from Admin22aa where AdminId=$adminid and IsDeleted=0 and IsUse=1";
$data = getRowData($sql);
?>
<?php include(template("publicInclude.php"));?>
<head>
<title>添加管理员</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php if($adminid!='0'){?><?php e($data['Name']);?><?php }?>" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2" value="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                        <select class="select"  id="adminRole" name="adminRole" size="1" onchange="getRole()">
                            <?php if(isset($adminRoleArr)){foreach($adminRoleArr as $key=>$value){?>
				<option value="<?php e($key);?>"><?php e($value);?></option>
                            <?php }}?>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true"  ><?php if($adminid!='0'){?><?php e($data['Note']);?><?php }?></textarea>
			
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <div class="btn btn-primary radius" onclick="<?php if($adminid!='0'){?>updateAdmin(<?php e($adminid);?>)<?php }else{ ?>addAdmin()<?php }?>" value="提交">&nbsp;&nbsp;提交&nbsp;&nbsp;</div>
		</div>
	</div>
	</form>
</article>
</body>
<script type="text/javascript">
var adminRole = 0;
function getRole() {
    adminRole = $("#adminRole").find("option:selected").val();
    console.log(adminRole);
}
function addAdmin(){
     var adminName = $("#adminName").val();
     var pwd = $("#password").val();
     var pwd1 = $("#password2").val();
     var note = $(".textarea").val();
     //var role = $(".select opion").valueof();
     if (adminName=='' || pwd==''  || pwd1==''){
         alert("请填写完整信息。")
     }
     else if (pwd!=pwd1){
         alert("密码前后不一致");
     }
     else {
         $.post("action/login-action.php",{
                    "Action":"addAdmin",
                    "AdminName":adminName,
                    "Password":pwd,
                    "Note":note,
                    "Role":adminRole
                },function(re){
              re = JSON.parse(re);
              if(re.ErrorCode=='0'){
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.layer.close(index);
              }
         });
     } 
}
function updateAdmin(id) {
    var adminName = $("#adminName").val();
     var pwd = $("#password").val();
     var pwd1 = $("#password2").val();
     var note = $(".textarea").val();
     //var role = $(".select opion").valueof();
     if (adminName=='' || pwd==''  || pwd1==''){
         alert("请填写完整信息。")
     }
     else if (pwd!=pwd1){
         alert("密码前后不一致");
     }
     else {
         $.post("action/update-action.php",{
                    "Action":"updateAdmin",
                    "AdminName":adminName,
                    "Password":pwd,
                    "Note":note,
                    "AdminId":id
                },function(re){
              re = JSON.parse(re);
              if(re.ErrorCode=='0'){
                     var index = parent.layer.getFrameIndex(window.name);
                  parent.layer.close(index);
              }
         });
     } 
}
</script>