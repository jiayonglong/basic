
<?php

use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!--[if lt IE 9]>
<!--    <script type="text/javascript" src="js/html5.js"></script>-->
<!--    <script type="text/javascript" src="js/respond.min.js"></script>-->
<!--    <script type="text/javascript" src="js/PIE_IE678.js"></script>-->
<![endif]-->
<link type="text/css" rel="stylesheet" href="css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 公告管理 <span class="c-gray en">&gt;</span> 公告列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
    <div class="text-c">
        <input type="text" name="" id="" placeholder=" 订单名称" style="width:250px" class="input-text"><button name="" id="" class="btn btn-success" type="submit"><i class="icon-search"></i> 搜订单名称</button>
    </div>
    <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="80">ID</th>
            <th>订单号</th>
            <th width="80">订单时间</th>
            <th width="80">购买数量</th>
            <th width="120">订单价格</th>
            <th>时间</th>
            <th>订单详情ID</th>
            <th width="70">操作</th>
        </tr>
        </thead>
        <?php foreach($orderdata as $v) {?>
            <tbody>
            <tr class="text-c">
                <td><input type="checkbox" value="" name=""></td>
                <td><?php echo $v['order_id']?></td>
                <td><?php echo $v['order_sn']?></td>
                <td><?php echo $v['order_time']?></td>
                <td><?php echo $v['buy_number']?></td>
                <td><?php echo $v['order_price']?></td>
                <td><?php echo $v['library_time']?></td>
                <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('10001','650','','查看','article-zhang.html')" title="查看"><?php echo $v['details_id']?></u></td>
                <td class="f-14 article-manage">
                    <a style="text-decoration:none" class="ml-5" href="index.php?r=notice/edit" title="编辑"><i class="icon-edit"></i></a>
                    <a style="text-decoration:none" class="ml-5" onClick="notice_del(this,)" href="javascript:;" title="删除"><i class="icon-trash"></i></a>
                </td>

            </tr>
            </tbody>
        <?php }?>
    </table>
    <div id="pageNav" class="pageNav" style="width: 100%;float:left;text-align: center;">
        <?= LinkPager::widget([
            'pagination' => $pages,
            'nextPageLabel' => '下一页',
            'prevPageLabel' => '上一页',

        ]); ?>

    </div>
</div>


<script>

    function notice_del(obj,id){
        console.log(id);
        var a=$(obj).parents("tr");
        console.log(a)
        if(confirm('确认要删除吗？',function (index){
            $.a jax({
                url : 'index.php?r=notice/delete',
                dataType : 'json',
                type : 'post',
                data : {'notice_id':id},
                success:function(res){
                    // if(res.code==0){
                    //     alert(res.msg);
                    // }
                    console.log(res.code)
                }
            });
        })){

        }
        return;
    }
</script>

<!--代码整理：js代码 www.jsdaima.com-->
