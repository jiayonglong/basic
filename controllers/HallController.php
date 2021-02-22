<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Hall;
use yii\data\Pagination;
class HallController extends Controller
{
    public $layout='index';
    public $enableCsrfValidation=false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    //公告添加
    public function actionHall()
    {
//        echo '111';
        $hall = new Hall();
        $request = \Yii::$app->request;
        $data=$request->post();
//        var_dump($data);

        $hall->hall_name=$data['hall_name'];
        if($hall->save() && $hall->validate()){
            return $this->redirect(array('list'));
        }

    }
    public function actionList(){
//        echo '2222';
        $data=yii::$app->request->get();
        //实例化查询类
        $query=new \yii\db\Query();
        //查询表
        $query->from('t_hall');
        //判断名称的值是否存在，不存在则为空
        if(isset($data['hall_name'])&&$data['hall_name']!=''){
            $query->andWhere(['like','hall_name',$data['hall_name']]);   //是andWhere  不是addwhere  括号里是数组
        }else{
            $data['hall_name']='';
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
    //添加公告
    public function actionAdd()
    {
        return $this->render('add');
    }
    //编辑公告
    public function actionUpdate()
    {
        $news=new Hall;
        $hall_id = $_GET['hall_id'];
        $jyl=$news->find()->where(['hall_id'=>$hall_id])->one();
        return $this->render('update',array('jyl'=>$jyl));
    }
    //执行编辑
    public function actionUpdateall(){
        $news=new Hall;
        $request = \Yii::$app->request;
        //获取post传参
        $hall_id = $request->post('hall_id');
//        print_r($notice_id);
        $hall_name = $request->post('hall_name');
        $data = $news->updateAll(['hall_name'=>$hall_name],['hall_id'=>$hall_id]);
        if($data){
            echo "<script>alert('修改成功');location.href='index.php?r=hall/list'</script>";
            // location.href='index.php?r=index/list';
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=hall/list'</script>";
            // location.href="index.php?index/list";
        }
    }
    //删除公告
    public function actionDel(){
        $news=new Hall;
        $hall_id = $_GET['hall_id'];
        $data = $news->deleteAll(['hall_id'=>$hall_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=hall/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=hall/list'</script>";
        }
    }
    //修改密码
    public function actionXiu()
    {
        return $this->render('xiu');
    }
}
