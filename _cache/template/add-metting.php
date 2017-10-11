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

//    //创建文本编辑器
//    var editor = new wangEditor('editor');
//    wangEditor.config.printLog = false;
//    editor.config.menus = [
//        'bold',
//        'underline',
//        'italic',
//        'strikethrough',
//        'eraser',
//        'forecolor',
//        'bgcolor',
//        'lineheight',
//        'fontfamily',
//        'fontsize',
//        'head',
//        'unorderlist',
//        'orderlist',
//        'alignleft',
//        'aligncenter',
//        'alignright',
//        'link',
//        'img',
//        'undo',
//        'redo'
//    ];
//  
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
    /*toolbars: [
     [
     'anchor', //锚点
     'undo', //撤销
     'redo', //重做
     'bold', //加粗
     'indent', //首行缩进
     'snapscreen', //截图
     'italic', //斜体
     'underline', //下划线
     'strikethrough', //删除线
     'subscript', //下标
     'fontborder', //字符边框
     'superscript', //上标
     'formatmatch', //格式刷
     'source', //源代码
     'blockquote', //引用
     'pasteplain', //纯文本粘贴模式
     'selectall', //全选
     'print', //打印
     'preview', //预览
     'horizontal', //分隔线
     'removeformat', //清除格式
     'time', //时间
     'date', //日期
     'unlink', //取消链接
     'insertrow', //前插入行
     'insertcol', //前插入列
     'mergeright', //右合并单元格
     'mergedown', //下合并单元格
     'deleterow', //删除行
     'deletecol', //删除列
     'splittorows', //拆分成行
     'splittocols', //拆分成列
     'splittocells', //完全拆分单元格
     'deletecaption', //删除表格标题
     'inserttitle', //插入标题
     'mergecells', //合并多个单元格
     'deletetable', //删除表格
     'cleardoc', //清空文档
     'insertparagraphbeforetable', //"表格前插入行"
     'insertcode', //代码语言
     'fontfamily', //字体
     'fontsize', //字号
     'paragraph', //段落格式
     'simpleupload', //单图上传
     'insertimage', //多图上传
     'edittable', //表格属性
     'edittd', //单元格属性
     'link', //超链接
     'emotion', //表情
     'spechars', //特殊字符
     'searchreplace', //查询替换
     'map', //Baidu地图
     'gmap', //Google地图
     'insertvideo', //视频
     'help', //帮助
     'justifyleft', //居左对齐
     'justifyright', //居右对齐
     'justifycenter', //居中对齐
     'justifyjustify', //两端对齐
     'forecolor', //字体颜色
     'backcolor', //背景色
     'insertorderedlist', //有序列表
     'insertunorderedlist', //无序列表
     'fullscreen', //全屏
     'directionalityltr', //从左向右输入
     'directionalityrtl', //从右向左输入
     'rowspacingtop', //段前距
     'rowspacingbottom', //段后距
     'pagebreak', //分页
     'insertframe', //插入Iframe
     'imagenone', //默认
     'imageleft', //左浮动
     'imageright', //右浮动
     'attachment', //附件
     'imagecenter', //居中
     'wordimage', //图片转存
     'lineheight', //行间距
     'edittip ', //编辑提示
     'customstyle', //自定义标题
     'autotypeset', //自动排版
     'webapp', //百度应用
     'touppercase', //字母大写
     'tolowercase', //字母小写
     'background', //背景
     'template', //模板
     'scrawl', //涂鸦
     'music', //音乐
     'inserttable', //插入表格
     'drafts', // 从草稿箱加载
     'charts', // 图表
     ]
     ]*/
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
