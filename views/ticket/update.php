<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/PIE_IE678.js"></script>
    <![endif]-->
    <link type="text/css" rel="stylesheet" href="css/H-ui.css"/>
    <link type="text/css" rel="stylesheet" href="css/H-ui.admin.css"/>
    <link type="text/css" rel="stylesheet" href="font/font-awesome.min.css"/>


    <!--[if IE 7]>
    <link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <title>添加票表_js代码</title>
</head>
<body>
<div class="pd-20">
    <div class="Huiform">
        <form action="index.php?r=ticket/ticket" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 厅院名称：</th>

                    <select name="hall_id" id="" style="width:200px" class="input-text" datatype="*2-16">
                        <option value="">--请选择--</option>
                        <?php foreach($hallInfo as $v) {?>
                            <option value="<?php echo $v['hall_id']?>"><?php echo $v['hall_name']?></option>
                        <?php }?>
                    </select>

                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 门票类型：</th>
                    <td class="permission-list">
                        <label class="item"><input name="ticket_type" type="checkbox" value="1"> 普通票</label>
                        <label class="item"><input name="ticket_type" type="checkbox" value="2"> 学生票</label>
                        <label class="item"><input name="ticket_type" type="checkbox" value="3"> 儿童票</label>
                    </td>
                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 门票价格：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="ticket_price" name="ticket_price" datatype="*2-16" nullmsg="公告标题不能为空"></td>
                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 门票数量：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="ticket_number" name="ticket_number" datatype="*2-16" nullmsg="公告标题不能为空"></td>
                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 入馆时间:</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="library_time" name="library_time" datatype="*2-16" nullmsg="公告标题不能为空"></td>
                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 开始售票时间:</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="start_time" name="start_time" datatype="*2-16" nullmsg="开始售票时间不能为空"></td>
                </tr>

                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 结束售票时间:</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="end_time" name="end_time" datatype="*2-16" nullmsg="结束售票时间不能为空"></td>
                </tr>

                <tr>
                    <th class="text-r"><span class="c-red">*</span> 是否售完：</th>
                    <td><label>
                            <input name="ticket_state" type="radio" id="ticket_state" value="0" checked>
                            未售完</label>
                        <label>
                            <input type="radio" name="ticket_state" value="1" id="ticket_state">
                            已售完</label></td>
                </tr>

                <tr>
                    <th></th>
                    <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 添加</button></td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="layer/layer.min.js"></script>
<script type="text/javascript" src="js/pagenav.cn.js"></script>
<!--<script type="text/javascript" src="js/H-ui.js"></script>-->
<!--<script type="text/javascript" src="plugin/My97DatePicker/WdatePicker.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(".Huiform").Validform();
</script>

</body>
</html>

<!--代码整理：js代码 www.jsdaima.com-->