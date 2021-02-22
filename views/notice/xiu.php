<div class="pd-2000">
    <form class="Huiform" id="loginform" action="" method="post">
        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th colspan="2">修改密码</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-r" width="30%">旧密码：</th>
                <td><input name="oldpassword" id="oldpassword" class="input-text" type="password" autocomplete="off" placeholder="密码" tabindex="1" datatype="*6-16" nullmsg="请输入旧密码！" errormsg="4~16个字符，区分大小写！">
                </td>
            </tr>
            <tr>
                <th class="text-r">新密码：</th>
                <td><input name="newpassword" id="newpassword" class="input-text" type="password" autocomplete="off" placeholder="设置密码" tabindex="2" datatype="*6-16"  nullmsg="请输入您的新密码！" errormsg="4~16个字符，区分大小写！" >
                </td>
            </tr>
            <tr>
                <th class="text-r">再次输入新密码：</th>
                <td><input name="newpassword2" id="newpassword2" class="input-text" type="password" autocomplete="off" placeholder="确认新密码" tabindex="3" datatype="*" recheck="newpassword" nullmsg="请再输入一次新密码！" errormsg="您两次输入的新密码不一致！">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn btn-success radius" id="admin-password-save" name="admin-password-save"><i class="icon-ok"></i> 确定</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="layer/layer.min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(".Huiform").Validform();
</script>