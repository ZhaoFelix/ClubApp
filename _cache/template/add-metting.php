<?php

$account = get("admin");

?>

<?php _includeJS("globaljs/all.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.min.js"); ?>
<?php _includeJS("lib/layer/2.4/layer.js"); ?>
<?php _includeJS("static/h-ui.admin/js/H-ui.admin.js"); ?>
<?php _includeJS("lib/My97DatePicker/4.8/WdatePicker.js"); ?>
<?php _includeJS("lib/jquery.validation/1.14.0/jquery.validate.js"); ?>
<?php _includeJS("lib/jquery.validation/1.14.0/validate-methods.js"); ?>
<?php _includeJS("lib/jquery.validation/1.14.0/messages_zh.js"); ?>
<?php _includeJS("lib/webuploader/0.1.5/webuploader.min.js"); ?>
<?php _includeJS("lib/ueditor/1.4.3/ueditor.config.js"); ?>
<?php _includeJS("lib/ueditor/1.4.3/ueditor.all.min.js"); ?>
<?php _includeJS("lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"); ?>
<?php _includeJS("lib/datatables/1.10.0/jquery.dataTables.min.js"); ?>

<?php _includeCSS("static/h-ui/css/H-ui.min.css"); ?>
<?php _includeCSS("static/h-ui.admin/css/H-ui.admin.css"); ?>
<?php _includeCSS("lib/Hui-iconfont/1.0.8/iconfont.css"); ?>
<?php _includeCSS("static/h-ui.admin/skin/default/skin.css"); ?>
<?php _includeCSS("static/h-ui.admin/css/style.css"); ?>



<head>
    <title>添加文章</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>会议标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="title" name="articletitle">
                </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">会议负责人：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="" id="author" name="author">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">会议时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text Wdate" id='metting-time' onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})" >
			</div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">与会人员：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" id="metting-people">
			</div>
            </div>
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<div id="filePicker">选择图片</div>
					<button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
				</div>
			</div>
	    </div>
            
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">会议内容：</label>
                        <div class="formControls col-xs-8 col-sm-9" id="metting-content"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<div onClick="article_save_submit()" class="btn btn-primary radius" type="submit">保存并提交审核</div>
                                <div onClick="removeIframe()" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</div>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
    var ue = UE.getEditor('editor');
    function article_save_submit() {
        var title = $("#title").val();
        var time = $("#metting-time").val();
        var people = $("#metting-people").val();
        var content = ue.getContentTxt();
        
        if(title=='' ||  time=='' || people=='' || content==''){
            alert('请填写完整信息');
        }
        $.post("action/add-title.php",{Action:"Metting",
            Title:title,
            Time:time,
            People:people,
            Content:content
        },function(re){
            re = JSON.parse(re);
            if(re.ErrorCode==0){
                location.href = 'article-list.php';
            }
            else {
                alert(re.ErrorMessage);
            }
        });
    }
    function removeIframe() {
        history.go(-1);
    }
    
</script>