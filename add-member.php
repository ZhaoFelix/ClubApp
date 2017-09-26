<?php
include_once 'include/template.php';
include_once 'common-function.php';
header("Content-Type: text/html;charset=utf-8");
?>

{globaljs/all.js}
{static/h-ui/js/H-ui.js}
{static/h-ui/js/H-ui.min.js}
{lib/layer/2.4/layer.js}
{static/h-ui.admin/js/H-ui.admin.js}
{lib/My97DatePicker/4.8/WdatePicker.js}
{lib/jquery.validation/1.14.0/jquery.validate.js}
{lib/jquery.validation/1.14.0/validate-methods.js}
{lib/jquery.validation/1.14.0/messages_zh.js}
{lib/webuploader/0.1.5/webuploader.min.js}
{lib/ueditor/1.4.3/ueditor.config.js}
{lib/ueditor/1.4.3/ueditor.all.min.js}
{lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js}
{lib/datatables/1.10.0/jquery.dataTables.min.js}

{static/h-ui/css/H-ui.min.css}
{static/h-ui.admin/css/H-ui.admin.css}
{lib/Hui-iconfont/1.0.8/iconfont.css}
{static/h-ui.admin/skin/default/skin.css}
{static/h-ui.admin/css/style.css}


{** 会议、公告发布 **}
<head>
    <title>添加文章</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value=""  id="memberName" name="memberName">
                </div>
            </div>
            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                        <select id="memberGender" name="memberGender" class="select" onchange="gradeChangeGender()">
                            
                            <option value="0">女</option>
                            <option value="1">男</option>
                        </select>
                    </span> 
                </div>
            </div>
            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>学院：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                        <select id="memberAcademy" name="memberAcademy" class="select" onchange="gradeChangeAcademy()">
                            {foreach:$academyArr as $key => $value}
                            <option value="{$key}">{$value}</option>
                            {/foreach}
                            
                        </select>
                    </span> 
                </div>
            </div>
            
            
            
             
            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>班级：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="memberClass" name="memberClass">
                </div>
            </div>
            
            
            
            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="memberPhone" name="memberPhone">
                </div>
            </div>
            
            
           
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">入社时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text Wdate" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd'})" 
                                       id="joinTime" name="joinTime">
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">QQ：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="memberQQ" name="memberQQ">
			</div>
            </div>
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">微信：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="memberWechat" name="memberWechat">
			</div>
            </div>
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">职位：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="memberPosition" name="memberPosition">
			</div>
            </div>
            
            
          
            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                        <select id="memberStatus" name="memberStatus" class="select" onchange="gradeChangeStatus()">
                            
                           {foreach:$status as $key => $value}
                           <option value="{$key}">{$value}</option>
                            {/foreach}
                        </select>
                    </span> 
                </div>
            </div>
            
            <div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				 <div class="btn btn-primary radius" onclick="addmembers()" value="提交">&nbsp;&nbsp;提交&nbsp;&nbsp;</div>
				
				<button onClick="removeIframe()" class="btn btn-default radius" >&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>

var memberGender;
var memberAcademy;
var memberStatus;

function gradeChangeGender() { //定义性别选择器的方法，拿到选择的数据
         memberGender = $("#memberGender").find("option:selected").val();//全局变量赋值
         console.log(memberGender);
    } 
    
function gradeChangeAcademy(){     //拿到学院的数据
         memberAcademy = $("#memberAcademy").find("option:selected").val();
         console.log(memberAcademy);
    }

function gradeChangeStatus(){ //拿到当前状态的数据
         memberStatus = $("#memberStatus").find("option:selected").val();
         console.log(memberStatus);
    
}
function addmembers(){
    
     var memberName = $("#memberName").val();
     var memberClass = $("#memberClass").val();
     var memberPhone = $("#memberPhone").val();

     var joinTime = $("#joinTime").val();
     var memberQQ = $("#memberQQ").val();
     var memberWechat = $("#memberWechat").val();
     var memberPosition = $("#memberPosition").val();
     if (memberName===''||memberPhone==='' || memberClass===''){
         alert("请填写完整信息。");
     }
     else {
         $.post("action/login-action.php",{
                    "Action":"addmember",
                    "memberName":memberName,
                    "memberGender":memberGender,//调用全局变量
                    "memberAcademy":memberAcademy,
                    "memberClass":memberClass,
                    "memberPhone":memberPhone,
                    "jionTime":joinTime,
                    "memberQQ":memberQQ,
                    "memberWechat":memberWechat,
                    "memberPosition":memberPosition,
                    "memberStatus":memberStatus
                    
                },function(re){
              re = JSON.parse(re);
              console.log(re.ErrorCode);
              if(re.ErrorCode=='0'){
                  //history.go(-1);
                  
                  location.href='contanct-list.php';
              }
         });
     }
     
     function removeIframe() {
         location.href='contanct-ist.php';
     }
     
}

</script>


