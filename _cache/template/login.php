<?php

$_SESSION["IsLogin"] = "NO";
var_dump($_SESSION["IsLogin"]);
?>
<head>
    <title>用户登录</title>
    <?php _includeCSS("static/h-ui/css/H-ui.min.css"); ?>
    <?php _includeCSS("static/h-ui.admin/css/H-ui.login.css"); ?>
    <?php _includeCSS("static/h-ui.admin/css/style.css"); ?>
    <?php _includeCSS("lib/Hui-iconfont/1.0.8/iconfont.css"); ?>
    <?php _includeJS("globaljs/all.js"); ?>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" >
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="account" name="" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
            <div class="btn btn-success radius size-L" onclick="login()" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;</div>
            <div name=""  class="btn btn-default radius size-L" onclick="cancle()" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;</div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">上海商学院 & ios开发者协会</div>
</body>

<script>
    function login(){   
        var account = $("#account").val();
        var pwd = $("#password").val();
        if(account && pwd){
            
             $.post("action/login-action.php",{
                    "Action":"Login",
                    "Phone":account,
                    "Pwd":pwd
                },function(re){
                   
                    var arr = JSON.parse(re);
                if(arr.ErrorCode == 0){  
                  location.href = 'index.php?admin='+account;
                }else{
                    alert(arr.ErrorMessage);
                    
                }
                });
            
        }else{
            alert("请填写完整!");
        }
        
    }
    function cancle(){
        $("#account").value = '';
        $("#password").value = '';
        
    }
    
</script>