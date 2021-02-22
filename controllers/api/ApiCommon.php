<?php
namespace app\controllers\api;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

 class ApiCommon extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function beforeAction($action)
    {
        header("Access-Control-Allow-Origin: http://localhost:8080");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
        header("Access-Control-llow-redentials: true");
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            \Yii::$app->response->setStatusCode(204);
            \Yii::$app->end(0);
        }
        return parent::beforeAction($action);
    }


//    public function behaviors()
//    {
//        return ArrayHelper::merge([
//            [
//                'class' => Cors::className(),
//                'cors' => [
//                    //'Origin' => ['http://localhost:1024'],
//                    'Origin' => ['http://localhost:8080'],
//                    'Access-Control-Request-Method' => ["GET, HEAD, POST, PUT, DELETE, TRACE, OPTIONS, PATCH"],
//                    'Access-Control-Allow-Credentials' => true,
//                ],
//            ],
//        ], parent::behaviors());
//
//    }
}