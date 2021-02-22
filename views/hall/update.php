<div class="pd-20">
    <div class="Huiform">
        <form action="index.php?r=hall/updateall" method="post">
            <table class="table table-bg">
                <tbody>
                <tr>
                    <input type="hidden" name="hall_id" id="text_id" style="width: 500px;height: 30px" value="<?php echo $jyl['hall_id']?>">
                    <th width="100" class="text-r"><span class="c-red">*</span> 展厅名称：</th>
                    <td><input type="text" style="width:200px" class="input-text" value="<?php echo $jyl['hall_name']?>" placeholder="" id="hall_name" name="hall_name" datatype="*2-16" nullmsg="展厅名称不能为空"></td>
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
