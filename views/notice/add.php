<div class="pd-20">
    <div class="Huiform">
        <form action="index.php?r=notice/notice" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 公告名称：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="notice_title" name="notice_title" datatype="*2-16" nullmsg="用户名不能为空"></td>
                </tr>

                <tr>
                    <th class="text-r">公告内容：</th>
                    <td><textarea class="input-text" name="notice_content" id="user-info" style="height:100px;width:300px;"></textarea></td>
                </tr>
                <tr>
                    <th class="text-r">发布人：</th>
                    <td><input type="text" style="width:300px" class="pub_name" value="" placeholder="" id="user-address" name="pub_name"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button></td>
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
