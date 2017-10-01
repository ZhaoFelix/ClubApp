<?php
include_once 'include/template.php';

?>
{publicInclude.php}

{** 会议、公告发布 **}
<head>
    <title>添加文章</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公告标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="annocumenttitle" name="articletitle">
                </div>
            </div>
            <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">公告作者：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="0" placeholder="" id="annocument-author" name="author">
                    </div>
            </div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">会议时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text Wdate" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})" >
			</div>
            </div> 
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">公告内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
            
        </form>
    </article>
</body>

<script>
var ue = UE.getEditor('editor');
</script>