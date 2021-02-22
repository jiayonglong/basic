<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Hall extends ActiveRecord
{


    public static function tableName()
    {
        return 't_hall';
    }

    public function attributeLabels()
    {
        return [
            'hall_name' => '展厅名称',
        ];
    }
    public  function  rules()
    {
        return [
            [['hall_name'], 'required','message'=>'展厅名称不能为空'],
        ];
    }
}
?>