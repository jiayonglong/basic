<?php

namespace app\controllers;
use app\models\Users;
use app\models\Notice;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
class UserController extends Controller
{
    public $layout='index';
    public $enableCsrfValidation=false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    //用户展示
    public function actionList(){
        $data=yii::$app->request->get();
        //实例化查询类
        $query=new \yii\db\Query();
        //查询表
        $query->from('t_user');
        //判断名称的值是否存在，不存在则为空
        if(isset($data['user_name'])&&$data['user_name']!=''){
            $query->andWhere(['like','user_name',$data['user_name']]);   //是andWhere  不是addwhere  括号里是数组
        }else{
            $data['user_name']='';
        }
        $pages= new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'  => 2   //每页显示条数

        ]);
        $data = $query->offset($pages->offset)  //查询出来的每一页的
        ->limit($pages->limit)
            ->all();
        return $this->render('list',array('data'=>$data,'pages'=>$pages));
    }
    //用户删除
    public function actionDel(){
        $user=new Users();
        $user_id = $_GET['user_id'];
        $data = $user->deleteAll(['user_id'=>$user_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=user/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=user/list'</script>";
        }
    }
}
