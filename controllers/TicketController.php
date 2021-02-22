<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Hall;
use app\models\Ticket;
use yii\data\Pagination;
class TicketController extends Controller
{
    public $layout='index';
    public $enableCsrfValidation=false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    //公告添加
    public function actionTicket()
    {
        $request=\yii::$app->request;
        $ticketmodel=new Ticket();
        $data=$request->post();
        //print_r($data);die;
        $data['library_time']=strtotime($data['library_time']);//把时间转化时间戳
        $data['start_time']=strtotime($data['start_time']);
        $data['end_time']=strtotime($data['end_time']);
        $ticketmodel->hall_id=$data['hall_id'];
        $ticketmodel->ticket_type=$data['ticket_type'];
        $ticketmodel->ticket_price=$data['ticket_price'];
        $ticketmodel->ticket_number=$data['ticket_number'];
        $ticketmodel->library_time=$data['library_time'];
        $ticketmodel->start_time=$data['start_time'];
        $ticketmodel->end_time=$data['end_time'];
        $ticketmodel->ticket_state=$data['ticket_state'];

        if($ticketmodel->save()){
        return $this->redirect(array('ticket/list'));
        }

    }
    public function actionList(){
//        echo '2222';
        $data=yii::$app->request->get();
        //实例化查询类
        $query=new \yii\db\Query();
        //查询表
        $query->from('t_ticket');
        //判断名称的值是否存在，不存在则为空
        if(isset($data[''])&&$data['']!=''){
            $query->andWhere(['like','',$data['']]);   //是andWhere  不是addwhere  括号里是数组
        }else{
            $data['']='';
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
        $notice = new Hall();
        $hallInfo = Hall::find()->all();
        return $this->render('add',array('hallInfo'=>$hallInfo));
    }
    //编辑公告
    public function actionUpdate()
    {
        $news=new Ticket;
        $t_id = $_GET['t_id'];
        $jyl=$news->find()->where(['t_id'=>$t_id])->one();
        return $this->render('update',array('jyl'=>$jyl));
    }
    //执行编辑
    public function actionUpdateall(){
        $news=new Ticket;
        $request = \Yii::$app->request;
        //获取post传参
        $notice_id = $request->post('t_id');
//        print_r($notice_id);
        $notice_title = $request->post('notice_title');
        $notice_content = $request->post('notice_content');
        $pub_name = $request->post('pub_name');
        $data['library_time']=strtotime($data['library_time']);//把时间转化时间戳
        $data['start_time']=strtotime($data['start_time']);
        $data['end_time']=strtotime($data['end_time']);
        $ticketmodel->hall_id=$data['hall_id'];
        $ticketmodel->ticket_type=$data['ticket_type'];
        $ticketmodel->ticket_price=$data['ticket_price'];
        $ticketmodel->ticket_number=$data['ticket_number'];
        $ticketmodel->library_time=$data['library_time'];
        $ticketmodel->start_time=$data['start_time'];
        $ticketmodel->end_time=$data['end_time'];
        $ticketmodel->ticket_state=$data['ticket_state'];
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
        $news=new Ticket;
        $t_id = $_GET['t_id'];
        $data = $news->deleteAll(['t_id'=>$t_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=ticket/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=ticket/list'</script>";
        }
    }
    //修改密码
    public function actionXiu()
    {
        return $this->render('xiu');
    }
}
