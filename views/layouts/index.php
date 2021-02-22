<!DOCTYPE HTML>
<html style="overflow-y:hidden;">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />

<script type="text/javascript" src="/js/html5.js"></script>
<script type="text/javascript" src="/js/respond.min.js"></script>
<script type="text/javascript" src="/js/PIE_IE678.js"></script>

<link href="/css/H-ui.css" rel="stylesheet" type="text/css" />
<link href="/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/font/font-awesome.min.css"/>

<link href="/font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>

<title>后台首页</title>
<meta name="keywords" content="企业后台管理系统,企业后台模板,cms后台管理系统,cms网站管理系统,cms后台模板,cms管理系统模板" />
<meta name="description" content="实用的cms企业后台管理模板html下载。" />
</head>
<body style="overflow:hidden">
<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.1" href="/">票务管理系统</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">H-ui</a> <span class="Hui-subtitle l">V2.1</span> <span class="Hui-userbox"><span class="c-white">超级管理员：admin</span> <a class="btn btn-danger radius ml-10" href="index.php?r=login/quit" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" id="nav-toggle" href="index.php?r=admin/login"></a> </header>
<div class="cl Hui-main">
  <aside class="Hui-aside" style="">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
      <dl id="menu-user">
        <dt><i class="icon-user"></i> 用户中心<b></b></dt>
        <dd>
          <ul>
            <li><a _href="index.php?r=user/list" href="index.php?r=user/list">用户列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-product">
        <dt><i class="icon-beaker"></i> 公告管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="index.php?r=notice/add" href="index.php?r=notice/add">添加公告</a></li>
            <li><a _href="index.php?r=notice/list" href="index.php?r=notice/list">公告展示</a></li>
          </ul>
        </dd>
      </dl>
        <dl id="menu-product">
            <dt><i class="icon-beaker"></i> 展厅管理<b></b></dt>
            <dd>
                <ul>
                    <li><a _href="index.php?r=hall/add" href="index.php?r=hall/add">添加展厅</a></li>
                    <li><a _href="index.php?r=hall/list" href="index.php?r=hall/list">展厅展示</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="icon-beaker"></i> 门票管理<b></b></dt>
            <dd>
                <ul>
                    <li><a _href="index.php?r=ticket/add" href="index.php?r=ticket/add">添加门票</a></li>
                    <li><a _href="index.php?r=ticket/list" href="index.php?r=ticket/list">门票展示</a></li>
                </ul>
            </dd>
        </dl>
      <dl id="menu-order">
        <dt><i class="icon-credit-card"></i> 订单管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="index.php?r=order/index" href="index.php?r=order/index">订单列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-admin">
        <dt><i class="icon-key"></i> 管理员管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="index.php?r=admin/add" href="index.php?r=admin/add">添加管理员</a></li>
            <li><a _href="index.php?r=admin/list" href="index.php?r=admin/list">管理员列表</a></li>
          </ul>
        </dd>
      </dl>
    </div>
  </aside>
  <div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);"></a></div>
  <section class="Hui-article">
    <div id="Hui-tabNav" class="Hui-tabNav">
      <div class="Hui-tabNav-wp">
        <ul id="min_title_list" class="acrossTab cl">
          <li class="active"><span title="我的桌面" data-href="index.php?r=admin/index">我的桌面</span><em></em></li>
        </ul>
      </div>
      <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-forward"></i></a></div>
    </div>
    <div id="iframe_box" class="Hui-articlebox">
        <?= $content ?>
    </div>
  </section>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="/layer/layer.min.js"></script>
<script type="text/javascript" src="/js/H-ui.js"></script>
<script type="text/javascript" src="/js/H-ui.admin.js"></script>

</body>
</html>