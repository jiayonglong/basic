<div class="pd-20">
    <div class="Huiform">
        <form action="index.php?r=admin/updateall" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <input type="hidden" name="admin_id" id="text_id" style="width: 500px;height: 30px" value="<?php echo $jyl['admin_id']?>">
                    <th width="100" class="text-r"><span class="c-red">*</span> 管理员名称：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="<?php echo $jyl['admin_name']?>" placeholder="" id="admin_name" name="admin_name" datatype="*2-16" nullmsg="用户名不能为空"></td>
                </tr>

                <tr>
                    <th class="text-r">管理员电话号：</th>
                    <td><input type="tel" style="width:300px" class="admin_plone" value="<?php echo $jyl['admin_plone']?>" placeholder="" id="admin_plone" name="admin_plone"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 修改</button></td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(".Huiform").Validform();
</script>
