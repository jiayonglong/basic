<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Ticket extends ActiveRecord
{


    public static function tableName()
    {
        return 't_ticket';
    }

        public function rules()
        {
        return[
        [['hall_id','ticket_type','library_time','ticket_number','start_time','end_time','ticket_state'],'integer'],
        [['ticket_price'],'number'],
        ];
        }

        public function attributeLabels()
        {
            return[
            't_id'=>'TTD',
            'hall_id'=>'Hall ID',
            'ticket_type'=>'Ticket Type',
            'library_time'=>'Library Time',
            'ticket_number'=>'Ticket Number',
            'ticket_price'=>'Ticket Price',
            'start_time'=>'Start Time',
            'end_time'=>'End Time',
            'ticket_state'=>'Ticket State',
            ];
        }

}
?>