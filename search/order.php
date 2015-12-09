<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    $province = iconv('UTF-8','UTF-8',urldecode($_GET['province']));
    $city = iconv('UTF-8','UTF-8',urldecode($_GET['city']));
    $hospital = iconv('UTF-8','UTF-8',urldecode($_GET['hospital']));
    $department = iconv('UTF-8','UTF-8',urldecode($_GET['department']));

    echo $province;
    echo $city;
    echo $hospital;
    echo $department;
    ?>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="../css/search.css"/>
    <script type="text/javascript" src="../js/jquery.min.js">
    </script>
    <script type="text/javascript" src="../js/dateRange.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/dateRange.css"/>
    <title>|挂号网</title>
    <script type="text/javascript" src="../js/search_result.js">
//        alert("fuck");
        window.onload=searchDoctor('fuck','fuck','fuck','fuck');

    </script>

</head>
<body>
<div id="head_div">
    <span>欢迎来到全国统一挂号平台</span>
    <div id="regis_div">
        <a href="../login.html">登录</a>|<a href="../login.html">注册</a>
    </div>
</div>

<div id="logo_div">
    <div id="logo-title">
        <img src="../image/logo.jpg" alt="挂号平台logo" id="logo"/>
        <h1>全国统一挂号平台</h1>
    </div>
    <div id="search-bar">
        <span class="icon-search"></span>
        <input type="text"  placeholder="请输入医院名、科室名或医生名"/>
        <div class="blue-normal-btn" >
            <a id="search-btn" href="javacript:void(0)">查询</a>
        </div>
    </div>
</div>

<!--导航栏-->
<div class="tabnav">
    <nav id="nav-bar" class="navb">
        <a href="../home.html" class="tabnav-tab" selected="false" role="tab">首页</a>
        <a href="search.html" class="tabnav-tab" selected="false" role="tab">按医院预约</a>
        <a href="ksearch.html" class="tabnav-tab" selected="false" role="tab">按科室预约</a>
        <a href="#" class="tabnav-tab" selected="false" role="tab">预约指南</a>
        <a href="#" class="tabnav-tab" selected="false" role="tab">公告查看</a>
        <a href="#" class="tabnav-tab" selected="false" role="tab">意见反馈</a>
        <nav>
</div>
<div id="mainmain">
    <div class="main-container">
        <div id="g-breadcrumb" style="margin-left:-15px">
            <a href="../home.html">首页</a>&gt;
            <a href="">北京</a>&gt;
            <a href="">海淀区</a>&gt;
            <a href=""></a>&gt;
            <a href=""></a>&gt;
            <span>排班信息</span>
        </div>
        <div class="filter-tip" style="border-bottom:1px solid #CDCDB4;margin-top:10px;height:30px">
            <div class="filter-condition" id="J_SelCondition">
            </div>
            <span class="result-num" style="margin-bottom:10px">找到<strong id="J_ResultNum">
                    <?php ?>
                </strong>位医生</span>
        </div>
        <div class="condition">
            <div class="condition-title">医生职称</div>
            <div class="condition-content">
                <ul>
                    <nav class="navb" id="i-nav">
                        <li><a href="javascript:void(0);" class="J_Submit_A tabnav-tab" aria-selected="true" role="tab">主任医师</a></li>
                        <li><a href="javascript:void(0);" class="J_Submit_A tabnav-tab" aria-selected="true" role="tab">副主任医师</a></li>
                        <li><a href="javascript:void(0);" class="J_Submit_A tabnav-tab" aria-selected="true" role="tab">主治医师</a></li>
                    </nav>
                </ul>
                <div class="condition-options">
                </div>
            </div>
        </div>
        <!--选择时间-->
        <div class="gfm-inline gfm-thin top" >
            <div style="margin-top:10px;margin-left:-20px">
                <span style="float:left;margin-right:10px">就诊日期</span>
                <div class="ta_date" id="div_date1">
                    <span class="date_title" id="date1"></span>
                </div>
            </div>
            <script type="text/javascript">
                var dateRange1 = new pickerDateRange('date1', {
                    aRecent90Days : 'aRecent90Days',
                    startDate: '2015-12-1',
                    endDate: '2015-12-1',
                    needCompare : false,
                    defaultText : ' — ',
                    autoSubmit : false,
                    inputTrigger : 'input_trigger1',
                    theme : 'ta'
                });
            </script>
        </div>
        <!-- .doc-list -->
        <ul class="g-expert-items indept-shiftcase-list J_DoctorList" id="J_ExpertList">
            <li class="J_ListItem">
                <div class="doc-box" style="display:inline">
                    <div class="doc-info" style="float:left;width:45%;display:inline">
                        <div class="doc-base-info" style="float:left;width:20%;">
                            <a target="_blank"  href=""onmousedown="return _smartlog(this,'DOCP_1')" class="img">
                                <img src="" alt="" title=""  onerror=""/>
                            </a>
                            <dl>
                                <dt>
                                    <a href="" class="name">xxx</a>
                                </dt>
                                <dd>
                                    <p class="doc-grade"><span class="level">xx医师</span></p>
                                    <p class="doc-hosp-dept">
                                        <a href="">xx科</a>
                                    </p>
                                </dd>
                            </dl>
                        </div>
                        <div class="doc-skill" style="margin-left:200px;width:20%;">
                            <p><label>擅长：</label>...</p>
                        </div>
                    </div>
                    <div class="doc-data" style="float:left;width:30%;display:inline">
                        <div class="order-num" style="float:left;width:14%">
                            <p class="num">***</p>
                            <p>预约量</p>
                        </div>
                        <div class="doc-comment" style="margin-left:60px;width:14px">
                            <p><label>疗效：</label><span>**%</span></p>
                            <p><label>态度：</label><span>**%</span></p>
                        </div>
                    </div>
                    <div class="doc-shiftcase J_ShiftCaseContent" style="float:right;width:20%">
                        <div class="to-center" style="margin-top:60px;display:inline">
                            <a class="gbb gbt-blue addpadding" href="#" style="margin-left:10px"
                               onclick="searchDoctor('fuck','fuck','fuck','fuck')">挂号</a>
                            <a class="gbb gbt-blue addpadding" href="#" style="margin-left:10px">咨询</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
