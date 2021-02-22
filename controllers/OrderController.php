<?php


namespace app\controllers;

use app\models\Order;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Notice;

class OrderController extends Controller
{
    public $enableCsrfValidation=false;
    public $layout ="index";
    function actionIndex(){
        $ordermodel=new Order();
        $query=$ordermodel->find();
//        print_r($noticedata);die;
        $pageSize=2;
        $pages=new Pagination(['totalCount'=>$query->count(),'pageSize'=>$pageSize]);
        $orderdata=$query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['orderdata'=>$orderdata,'pages'=>$pages]);
    }
}