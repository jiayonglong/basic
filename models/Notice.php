<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Notice extends ActiveRecord
{


    public static function tableName()
    {
        return 't_notice';
    }

    public function attributeLabels()
    {
        return [
            'notice_title' => '名称',
            'notice_content' => '内容',
        ];
    }

    public  function  rules()
    {
        return [
            [['notice_title'], 'required','message'=>'名称必须填写.'],
            [['notice_content'], 'required','message'=>'内容必须填写.'],
        ];
    }

}
?>