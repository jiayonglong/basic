<div class="pd-20">
    <div class="Huiform">
        <form action="/" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <th width="100" class="text-r"><span class="c-red">*</span> 用户名：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="用户名不能为空"></td>
                </tr>
                <tr>
                    <th class="text-r"><span class="c-red">*</span> 性别：</th>
                    <td><label>
                            <input name="sex" type="radio" id="six_1" value="1" checked>
                            男</label>
                        <label>
                            <input type="radio" name="sex" value="0" id="six_0">
                            女</label></td>
                </tr>
                <tr>
                    <th class="text-r"><span class="c-red">*</span> 手机：</th>
                    <td><input type="text" style="width:300px" class="input-text" value="" placeholder="" id="user-tel" name="user-tel"></td>
                </tr>
                <tr>
                    <th class="text-r">邮箱：</th>
                    <td><input type="text" style="width:300px" class="input-text" value="" placeholder="" id="user-email" name="user-email"></td>
                </tr>
                <tr>
                    <th class="text-r">头像：</th>
                    <td><input type="file" class="" name="" multiple></td>
                </tr>
                <tr>
                    <th class="text-r">地址：</th>
                    <td><input type="text" style="width:300px" class="input-text" value="" placeholder="" id="user-address" name="user-address"></td>
                </tr>
                <tr>
                    <th class="text-r">简介：</th>
                    <td><textarea class="input-text" name="user-info" id="user-info" style="height:100px;width:300px;"></textarea></td>
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
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(".Huiform").Validform();
</script>
