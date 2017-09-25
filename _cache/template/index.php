<?php


if($_SESSION["Login"]!="OK"){
    header('location:login.php');
}
$account = get("admin");

?>
<?php include(template("public/header.php"));?>
<?php include(template("public/meta.php"));?>
<?php include(template("public/menu.php"));?>
<?php _includeJS("globaljs/all.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.js"); ?>
<?php _includeJS("static/h-ui/js/H-ui.min.js"); ?>
<?php _includeJS("lib/layer/2.4/layer.js"); ?>
<?php _includeJS("static/h-ui.admin/js/H-ui.admin.js"); ?>
<?php _includeJS("lib/jquery.contextmenu/jquery.contextmenu.r2.js"); ?>


<title>后台管理</title>
 <div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active">
                        <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                        <em></em></li>
                </ul>
            </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
        </div>
          <div id="iframe_box" class="Hui-article">
            <div class="show_iframe">
                <div style="display:none" class="loading"></div>
                <iframe scrolling="yes" frameborder="0" ></iframe>
            </div>
        </div>
        
    </section>

    <div class="contextMenu" id="Huiadminmenu">
        <ul>
            <li id="closethis">关闭当前 </li>
            <li id="closeall">关闭全部 </li>
        </ul>
    </div>
    
 
    <script type="text/javascript">
        $("#dropDown_A").text("<?php e($account);?>");
        $(function () {
            /*$("#min_title_list li").contextMenu('Huiadminmenu', {
             bindings: {
             'closethis': function(t) {
             console.log(t);
             if(t.find("i")){
             t.find("i").trigger("click");
             }		
             },
             'closeall': function(t) {
             alert('Trigger was '+t.id+'\nAction was Email');
             },
             }
             });*/
        });
        /*个人信息*/
        function myselfinfo() {
            layer.open({
                type: 1,
                area: ['300px', '200px'],
                fix: false, //不固定
                maxmin: true,
                shade: 0.4,
                title: '查看信息',
                content: '<div>管理员信息</div>'
            });
        }

        /*资讯-添加*/
        function article_add(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*图片-添加*/
        function picture_add(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*产品-添加*/
        function product_add(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*用户-添加*/
        function member_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }
        
    </script> 
