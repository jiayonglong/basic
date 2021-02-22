<div class="pd-20">
    <div class="Huiform">
        <form action="index.php?r=admin/admin" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 管理员名字：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="admin_name" name="admin_name" datatype="*2-16" nullmsg="管理员名字不能为空"></td>
                </tr>

                <tr>
                    <th class="text-r">管理员密码：</th>
                    <td><input type="password" style="width:200px" class="input-text" value="" placeholder="" id="admin_pwd" name="admin_pwd" datatype="*2-16" nullmsg="密码不能为空"></td>
                </tr>
                <tr>
                    <th class="text-r">管理员电话号：</th>
                    <td><input type="tel" style="width:300px" class="admin_plone" value="" placeholder="" id="admin_plone" name="admin_plone"></td>
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
