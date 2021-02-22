<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Notice;
use yii\data\Pagination;
class NoticeController extends Controller
{
    public $layout='index';
    public $enableCsrfValidation=false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    //公告添加
    public function actionNotice()
    {
//        echo '111';
        $notice = new Notice();
        $request = \Yii::$app->request;
        $data=$request->post();
//        var_dump($data);
        $data['pub_time'] = time();

        $notice->notice_title=$data['notice_title'];
        $notice->notice_content=$data['notice_content'];
        $notice->pub_name=$data['pub_name'];
        $notice->pub_time=$data['pub_time'];
        if($notice->save()){
            return $this->redirect(array('list'));
        }

    }
    public function actionList(){
//        echo '2222';
        $data=yii::$app->request->get();
        //实例化查询类
        $query=new \yii\db\Query();
        //查询表
        $query->from('t_notice');
        //判断名称的值是否存在，不存在则为空
        if(isset($data['notice_title'])&&$data['notice_title']!=''){
            $query->andWhere(['like','notice_title',$data['notice_title']]);   //是andWhere  不是addwhere  括号里是数组
        }else{
            $data['notice_title']='';
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
        $news=new Notice;
        $notice_id = $_GET['notice_id'];
        $jyl=$news->find()->where(['notice_id'=>$notice_id])->one();
        return $this->render('update',array('jyl'=>$jyl));
    }
    //执行编辑
    public function actionUpdateall(){
        $news=new Notice;
        $request = \Yii::$app->request;
        //获取post传参
        $notice_id = $request->post('notice_id');
//        print_r($notice_id);
        $notice_title = $request->post('notice_title');
        $notice_content = $request->post('notice_content');
        $pub_name = $request->post('pub_name');
        $data = $news->updateAll(['notice_title'=>$notice_title,'notice_content'=>$notice_content,'pub_name'=>$pub_name],['notice_id'=>$notice_id]);
        if($data){
            echo "<script>alert('修改成功');location.href='index.php?r=notice/list'</script>";
            // location.href='index.php?r=index/list';
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=notice/list'</script>";
            // location.href="index.php?index/list";
        }
    }
    //删除公告
    public function actionDel(){
        $news=new Notice;
        $notice_id = $_GET['notice_id'];
        $data = $news->deleteAll(['notice_id'=>$notice_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=notice/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=notice/list'</script>";
        }
    }
    //修改密码
    public function actionXiu()
    {
        return $this->render('xiu');
    }
}
