<?php

$account = get("admin",0);
if ($account===0) {
    header('location:index.php');
}
$sql = "select LoginTime,IP from Admin22aa order by LoginTime desc limit 0,1";
$admin = getRowData($sql);
$count = getSingleData("select count(AdminId) from Admin22aa");

?>
<?php include(template("public/header.php"));?>
<?php include(template("public/meta.php"));?>
<?php include(template("public/menu.php"));?>
<?php include(template("publicInclude.php"));?>
<?php _includeCSS("css/index.css"); ?>
<title>后台管理</title>
<div class="dislpayArrow hidden-xs"><a class="pngfix" id="icon-arrow" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面">我的桌面
                    </span>
                    <em></em>
                </li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <div class="page-container">
                <p class="f-20 text-success">欢迎登录iOS开发者协会管理后台</p>
                <p>登录次数：18 </p>
                <p>上次登录IP：<?php e($admin["IP"]);?>  上次登录时间：<?php e($admin["LoginTime"]);?></p>
                <table class="table table-border table-bordered table-bg">
                    <thead>
                        <tr>
                            <th colspan="5" scope="col" style="text-align: center">信息统计</th>
                        </tr>
                        <tr class="text-c">
                            <th>统计</th>
                            <th>资讯库</th>
                            <th>招募库</th>
                            <th>项目库</th>
                            <th>管理员</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-c">
                            <td>总数</td>
                            <td>92</td>
                            <td>9</td>
                            <td>0</td>
                            <td><?php e($count);?></td>   
                        </tr>
                        <tr class="text-c">
                            <td>今日</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>

                        </tr>
                        <tr class="text-c">
                            <td>进行中</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>

                        </tr>
                        <tr class="text-c">
                            <td>已结束</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>

                        </tr>
                        <tr class="text-c">
                            <td>本月</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <footer class="footer mt-20" style="background-color: #eeeeee;height: 30px;line-height: 30px">
                <div class="container" style="width: 100%;padding: 0;">
                    <p style="color: black">上海商学院iOS开发者协会管理后台<br>

                </div>
            </footer>
        </div>
    </div>
</section>


<script type="text/javascript">
    $("#dropDown_A").text("<?php e($account);?>");
    $(function () {  
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
    function article_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*项目-添加*/
    function project_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*成员-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*管理员-添加*/
    function admin_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

</script> 
