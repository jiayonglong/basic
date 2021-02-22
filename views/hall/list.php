<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 公告管理 <span class="c-gray en">&gt;</span> 公告列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">

    <?php
    $form=ActiveForm::begin([
        'action'=>Url::toRoute(['hall/list']), //跳转的地址
        'method'=>'get',

    ]);
    echo '名称:','',Html::input('t_hall','hall_name');
    echo Html::submitButton('查询');
    ActiveForm::end();
    ?>
<!--    <div class="text-c"> 日期范围：-->
<!---->
<!--        <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name=""><button type="submit" class="btn btn-success" id="" name=""><i class="icon-search"></i> 搜用户</button>-->
<!---->
<!--    </div>-->
    <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a href="javascript:;" onClick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>
    <a href="javascript:;" onClick="user_add('550','','添加公告','index.php?r=hall/add')" class="btn btn-primary radius"><i class="icon-plus"></i> 添加展厅</a></span>
        <span class="r">共有数据：<strong>88</strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg  table-sort">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="80">ID</th>
            <th width="100">展厅名称</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <center>
        <tbody>
        <?php foreach($data as $key=>$val):?>
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $val['hall_id']?></td>
                <td><?php echo $val['hall_name']?></td>
                <td>
                    <a href="index.php?r=hall/del&hall_id=<?php echo $val['hall_id'];?>">删除</a>
                    <a href="index.php?r=hall/update&hall_id=<?php echo $val['hall_id'];?>">修改</a>
                </td>
            </tr>
        <?php endforeach;?>
<!--        <tr class="text-c">-->
<!---->
<!--            <td>1</td>-->
<!---->
<!--            <td><u style="cursor:pointer" class="text-primary" onclick="user_show('10001','360','','张三','user-show.html')">张三</u></td>-->
<!--            <td>大型网站内容发布会</td>-->
<!--            <td>2021年1月15日11:19:44</td>-->
<!--            <td>贾永龙</td>-->
<!--            <td class="f-14 user-manage"><a title="编辑" href="javascript:;" onClick="user_edit('4','550','','编辑','index.php?r=notice/update')" class="ml-5" style="text-decoration:none"><i class="icon-edit"></i></a> <a style="text-decoration:none" class="ml-5" onClick="user_password_edit('10001','370','228','修改密码','index.php?r=notice/xiu')" href="javascript:;" title="修改密码"><i class="icon-key"></i></a> <a title="删除" href="javascript:;" onClick="user_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a></td>-->
<!--        </tr>-->
        </tbody>
        </center>
    </table>
    <div id="pageNav" class="pageNav">
        <?= LinkPager::widget([
            'pagination' => $pages,
            'nextPageLabel' => '下一页', // 修改上下页按钮
            'firstPageLabel' => '首页', // 设置首页尾页按钮
        ]); ?>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="layer/layer.min.js"></script>
<script type="text/javascript" src="js/pagenav.cn.js"></script>
<!--<script type="text/javascript" src="js/H-ui.js"></script>-->
<!--<script type="text/javascript" src="plugin/My97DatePicker/WdatePicker.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="js/H-ui.admin.js"></script>




<!--代码整理：js代码 www.jsdaima.com-->