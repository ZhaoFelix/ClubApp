<?php
include_once 'include/template.php';
include_once 'function/qiniu.php';
?>

{publicInclude.php}

<script src="js/qiniu.min.js"></script>
<script src="js/plupload.full.min.js"></script>   

{** 会议、公告发布 **}
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
                    <input type="text" class="input-text Wdate" id='metting-time' onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd HH:mm:ss'})" >
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">与会人员：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" id="metting-people">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">图片：</label>
                <div class="formControls col-xs-8 col-sm-9" >
                    <input id="editCover"  type="file" multiple="true" >
                    <input  name="image" type="hidden" multiple="true" value="">
                   <img style='display:block;width:150px;height:150px' class='courseCover' id='upload_org_code_img'>
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
    
//  上传课程封面  
    var Cover = new QiniuJsSDK();
    var imgLink;
    var uploaderCover = Cover.uploader({
            runtimes: 'html5,flash,html4',
            browse_button: 'editCover',
            get_new_uptoken: false,
            uptoken : '{$upToken}',
            domain: 'http://img.bedeveloper.cn',
            container: document.body,
            unique_names: false,
            save_key: false,
            max_file_size: '100mb',
            flash_swf_url: 'include/extension/qiniu/plupload/Moxie.swf',
            max_retries: 3,
            dragdrop: true,
            drop_element: document.body,
            chunk_size: '4mb',
            filters: {
              mime_types : [
                {title : "Image files", extensions: "jpg,jpeg,gif,png"}
              ]
            },
            auto_start: true,
            init: {
                'BeforeUpload': function(up, file) {
                   $('#editCover').prop('disabled', true).html('上传中...');
                },
                'UploadProgress': function(up, file) {  
                    var progress = file.percent;
                    $('#editCover').prop('disabled', true).html('上传中' + progress + '%');

                },
                'FileUploaded': function(up, file, info) {
                    
                    var domain = up.getOption('domain');
                    var res = JSON.parse(info);
                    var sourceLink = domain + "/" + res.key;
                    console.log(sourceLink);
                    $('.courseCover').attr('src',sourceLink); 
                    imgLink = sourceLink;

                },
                'Key': function(up, file) {
                    var date = new Date();
                    var key = date.getTime();
                    return key;
                }
            }
    });

    var ue = UE.getEditor('editor');
    function article_save_submit() {
        var title = $("#title").val();
        var time = $("#metting-time").val();
        var newsPeople = $("#author").val();
        var attendence = $("#metting-people").val();
        var content = ue.getContentTxt();

        if (title == '' || time == '' || newsPeople == '' || content == '' || attendence == '') {
            alert('请填写完整信息');
        }
        $.post("action/add-action.php", {Action: "Metting",
            Title: title,
            Time: time,
            Attendence: attendence,
            Content: content,
            NewsPeople: newsPeople,
            ImgLink:imgLink

        }, function (re) {
            re = JSON.parse(re);
            if (re.ErrorCode == 0) {
                //location.href = 'article-list.php';
            } else {
                alert(re.ErrorMessage);
            }
        });
    }
    function removeIframe() {
        history.go(-1);
    }
    
   


//    $(function () {
//        $("#file_upload").uploadify({
//            height: 30,
//            swf: '/uploadify/uploadify.swf',
//            uploader: '#',
//            buttonText: '图片上传',
//            fileTypeDesc: 'Image files',
//            fileObjName: 'file',
//            fileTypeExts: '*.gif;*.jpg;*.png',
//            onUploadSuccess: function (file, data, response) {
//                // 我们需要扩展内容
//                if (response) {
//                    var obj = JSON.parse(data);
//                    $('#upload_org_code_img').attr("src", obj.data);
//                    $('#file_upload_image').attr("value", obj.data);
//                    $('#upload_org_code_img').show();
//                }
//            }
//        });
//    });

</script> 
