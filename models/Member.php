<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Member extends ActiveRecord
{


    public static function tableName()
    {
        return 'member';
    }

    public function attributeLabels()
    {
        return [
            'pwd' => '密码',
        ];
    }

    public  function  rules()
    {
        return [

        ];
    }

}
?>