<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Text extends ActiveRecord
{



 public function attributeLabels()
    {
        return [
            'text_data' => '名称',
            'text_pwd' => '内容',   
        ];
    }

    public  function  rules()
   {
    return [
        [['text_data'], 'required','message'=>'名称必须填写.'], 
         [['text_pwd'], 'required','message'=>'内容必须填写.'],
    ];
   }

}
?>