<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Code extends ActiveRecord
{


    public static function tableName()
    {
        return 'code';
    }

    public function attributeLabels()
    {
        return [

        ];
    }

    public  function  rules()
    {
        return [

        ];
    }

}
?>