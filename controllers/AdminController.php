<?php

namespace app\controllers;
use app\models\Admin;
use app\models\Notice;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
class AdminController extends Controller
{
    public $layout='index';
    public $enableCsrfValidation=false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('welcome');
    }
    //添加管理员页面
    public function actionAdd(){
        return $this->render('add');
    }
    //执行添加
    public function actionAdmin(){
        $user = new Admin();
        $request = \Yii::$app->request;
        $data=$request->post();
//        var_dump($data);
        $data['login_time'] = time();

        $user->admin_name=$data['admin_name'];
        $user->admin_pwd=$data['admin_pwd'];
        $user->admin_plone=$data['admin_plone'];
        $user->login_time=$data['login_time'];
        if($user->save()){
            return $this->redirect(array('list'));
        }
    }
    //管理员展示
    public function actionList(){
        $data=yii::$app->request->get();
        //实例化查询类
        $query=new \yii\db\Query();
        //查询表
        $query->from('t_admin');
        //判断名称的值是否存在，不存在则为空
        if(isset($data['admin_name'])&&$data['admin_name']!=''){
            $query->andWhere(['like','admin_name',$data['admin_name']]);   //是andWhere  不是addwhere  括号里是数组
        }else{
            $data['admin_name']='';
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
    //管理员删除
    public function actionDel(){
        $admin=new Admin;
        $admin_id = $_GET['admin_id'];
        $data = $admin->deleteAll(['admin_id'=>$admin_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=admin/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=admin/list'</script>";
        }
    }
    //编辑管理员
    public function actionUpdate()
    {
        $admin=new Admin;
        $admin_id = $_GET['admin_id'];
        $jyl=$admin->find()->where(['admin_id'=>$admin_id])->one();
        return $this->render('update',array('jyl'=>$jyl));
    }
    //执行编辑
    public function actionUpdateall(){
        $admin=new Admin;
        $request = \Yii::$app->request;
        //获取post传参
        $admin_id = $request->post('admin_id');
//        print_r($notice_id);
        $admin_name = $request->post('admin_name');
        $admin_plone = $request->post('admin_plone');
        $data = $admin->updateAll(['admin_name'=>$admin_name,'admin_plone'=>$admin_plone],['admin_id'=>$admin_id]);
        if($data){
            echo "<script>alert('修改成功');location.href='index.php?r=admin/list'</script>";
            // location.href='index.php?r=index/list';
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=admin/list'</script>";
            // location.href="index.php?index/list";
        }
    }
}
