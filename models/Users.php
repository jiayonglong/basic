<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Users extends ActiveRecord
{


    public static function tableName()
    {
        return 't_admin';
    }

    public function attributeLabels()
    {
        return [
            'admin_name' => '管理员名称',
            'admin_pwd' => '管理员密码',
        ];
    }

    public  function  rules()
    {
        return [
            [['admin_name'], 'required','message'=>'管理员名称必须填写.'],
            [['admin_pwd'], 'required','message'=>'管理员必须填写.'],
        ];
    }

}
?>