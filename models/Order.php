<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Order extends ActiveRecord
{


    public static function tableName()
    {
        return 't_order';
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