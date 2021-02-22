<?php


namespace app\controllers;

use app\models\Admin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\UploadedFile;



class LoginController extends Controller
{
    public $enableCsrfValidation=false;
    function actionLogin(){

        return $this->render('login');
    }

    function actionStore(){
        $request = \Yii::$app->request;
        $data=$request->post();
//        print_r($data);
        $adminmodel=new Admin();
        $res=$adminmodel->find()->where(['admin_name'=>$data['admin_name']])->one();
//        var_dump($res);
        if($data['admin_pwd']==$res['admin_pwd']){
            $session=\Yii::$app->session;
            $session->set('admin',$data['admin_name']);
            echo '<script>alert("登录成功");location.href="index.php?r=admin/index"</script>';
        }else{
            echo '<script>alert("登录失败");location.href="index.php?r=login/login"</script>';
        }
    }
    function actionQuit(){
        $session = Yii::$app->session;
        $session->remove('admin');
        echo '<script>alert("退出中。。。");location.href="index.php?r=login/login"</script>';

    }
}