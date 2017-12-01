<?php

include_once 'common-function.php';

if ($_SESSION["Login"] != "OK") {
    header('location:login.php');
}
$account = get("admin");
$sql = "select count(AdminId) from Admin22aa";
$adminNum = getSingleData($sql);

$returnArr = [];
for($i=0;$i<2;$i++){
    $sql = "select count(MemberId) from MemberInfo where  Gender=$i";
    $data = getSingleData($sql);
    if ($i == 0) {
        $returnArr["女生"] = $data;
    } else {
        $returnArr["男生"] = $data;
    }
} 
$str = json_encode($returnArr);

?>
<?php include(template("publicInclude.php"));?>
<?php _includeCSS("css/member-statistics.css"); ?>
<title>社员统计</title>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 统计管理 <span class="c-gray en">&gt;</span> 3D饼状图 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    
	<div id="container" style="min-width:700px;height:400px"></div>
        <span>统计标准:</span>
        <select id='category' onchange="selected()">
            <option value="0" >性别</option>
             <option value="1">学院</option>
             <option value="2">成员</option>
        </select>
      
</div>

<script type="text/javascript">
//    $.ready(function(){
//        console.log("ready");
//         $.post("action/enroll-action.php",{Action:"memberStatistics",Value:selectedOption},
//       function(re){
//            console.log(re);
//        });
//    });
    var selectedOption = 0;
    function selected(){
        selectedOption = $("#category").find("option:selected").val();   
          $.post("action/enroll-action.php",{Action:"memberStatistics",Value:selectedOption},
       function(re){
            console.log(re);
        });
    }
    
    
﻿﻿$(function () {
    dataStr = <?php e($str);?>;
    arr = JSON.parse(dataStr);
     console.log(arr);
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'iOS开发者协会数据统计'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
</script>