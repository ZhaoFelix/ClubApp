<?php

include_once 'function/qiniu.php';
$newsid = get("newsid", 0);
$sql = "select * from ClubNews where NewsId=$newsid";
$data = getRowData($sql);
if ($newsid != 0) {
    $newContent = $data["NewsContent"];
}
?>

<?php include(template("publicInclude.php"));?>

<script src="js/qiniu.min.js"></script>
<script src="js/plupload.full.min.js"></script> 

<style>
    .cancle {
        width:20px;
        height:20px;
        position:absolute;
        margin-left: 125px; 
        margin-top: 5px;
        background-image: url(images/cancel.png);
        background-size: cover;
    }
    #editCover {

        width: 65px;
    }
    .note {
        font-size: 12px;
        color: red;

    }
</style>

<head>
    <title>添加文章</title>
</head>
<body>
    <article>
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>会议标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php if($newsid!=0){?><?php e($data['NewsTitle']);?><?php }?>" placeholder="" id="title" name="articletitle">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">会议负责人：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php if($newsid!=0){?><?php e($data['NewsPeople']);?><?php }?>" placeholder="" id="author" name="author">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">会议时间：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text Wdate" id='metting-time' value="<?php if($newsid!=0){?><?php e($data['NewsTime']);?><?php }?>" onFocus="WdatePicker({lang: 'zh-cn', dateFmt: 'yyyy-MM-dd HH:mm:ss'})" >
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">与会人员：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php if($newsid!=0){?><?php e($data['Attendence']);?><?php }?>" id="metting-people">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">会议地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php if($newsid!=0){?><?php e($data['NewsPlace']);?><?php }?>" id='metting-place'>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">图片：</label>
                <div class="formControls col-xs-8 col-sm-9" id="uploadImg">
                    <input id="editCover"  type="file" multiple="true" value="选择图片" >
                   <!--<img style='display:block;width:150px;height:150px' class='courseCover' id='upload_org_code_img'>-->
                    <span class="note">支持jpg,jpeg,gif,png格式的图片,最多只能上传五张图片</span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">会议内容：</label>
                <div class="formControls col-xs-8 col-sm-9" id="metting-content" > 
                    <script id="editor" style="width:100%;height:400px;">

                    </script>
<!--                    <script id="editor" type="text/plain" style="width:100%;height:400px;">
                    </script> -->
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
    var imgLink = new Array();
    var uploaderCover = Cover.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'editCover',
        get_new_uptoken: false,
        uptoken: '<?php e($upToken);?>',
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
            mime_types: [
                {title: "Image files", extensions: "jpg,jpeg,gif,png"}
            ]
        },
        auto_start: true,
        init: {
            'BeforeUpload': function (up, file) {

                $(".note").css("display", "none");
                if (imgLink.length > 5) {
                    $('#editCover').prop('disabled', true).html('上传中...');
                } else {
                    $('#editCover').prop('disabled', false).html('上传中...');
                }
            },
            'UploadProgress': function (up, file) {
                var progress = file.percent;

                if (imgLink.length < 4) {

                    $('#editCover').prop('disabled', false).html('上传中' + progress + '%');
                } else {

                    $('#editCover').prop('disabled', true).html('上传中' + progress + '%');
                }


            },
            'FileUploaded': function (up, file, info) {

                var domain = up.getOption('domain');
                var res = JSON.parse(info);
                var sourceLink = domain + "/" + res.key;
                htm = "<img style='display:block;width:150px;float:left;margin-right:10px;position:relative' class='courseCover' src='" + sourceLink + "' id='img" + imgLink.length + "'>";
                delbtn = "<div onclick='delImg()' class='cancle'></div>";
                $("#uploadImg").append(htm);
                $("#img" + imgLink.length).append(delbtn);

                imgLink.push(sourceLink);
                console.log(imgLink);
                //imgLink = sourceLink;
            },
            'Key': function (up, file) {
                var date = new Date();
                var key = date.getTime();
                return key;
            }
        }
    });
    var ue = UE.getEditor('editor', {
        toolbars: [
            ['fullscreen',
                'source',
                'undo',
                'redo',
                'bold', 
                'link',
                'rowspacingtop',
                'rowspacingbottom',
                'insertcode',
                'fontfamily',
                'fontsize',
                'forecolor',
                'paragraph',
                'autotypeset', 
                'time',
                'date',
                'preview',
                'cleardoc'
                
            ]
        ],
        autoHeightEnabled: true,
        autoFloatEnabled: true
    });
    // var ue = UE.getEditor('editor');
    newsContent = "<?php e($newContent);?>";
    function article_save_submit() {
        var title = $("#title").val();
        var time = $("#metting-time").val();
        var newsPeople = $("#author").val();
        var newsPlace = $("#metting-place").val();
        var attendence = $("#metting-people").val();
        var content = ue.getContentTxt();

        if (title == '' || time == '' || newsPeople == '' || content == '' || attendence == '' || newsPlace == '') {
            alert('请填写完整信息');
        }
        imgStr = imgLink.toString();
        $.post("action/add-action.php", {Action: "Metting",
            Title: title,
            Time: time,
            Attendence: attendence,
            Content: content,
            NewsPeople: newsPeople,
            ImgLink: imgStr,
            NewsPlace: newsPlace

        }, function (re) {
            console.log(re);
            re = JSON.parse(re);

            if (re.ErrorCode == 0) {

                location.href = 'metting-list.php';
            } else {
                alert(re.ErrorMessage);
            }
        });
    }
    function removeIframe() {
        history.go(-1);
    }

    function delImg() {
        console.log("删除");
    }

</script> 
