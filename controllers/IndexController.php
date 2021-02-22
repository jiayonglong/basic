<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Text;
use yii\data\Pagination;
class IndexController extends Controller
{
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $news=new Text();
        return $this->render('index',['news'=>$news]);
    }
     public function actionFen()
    {
        $query = Text::find();
        $pagination = new Pagination([
        'defaultPageSize' => 5,
        'totalCount' => $query->count(),
        ]);
        $countries = $query->orderBy('text_data')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('fen',['countries'=>$countries,'pagination'=>$pagination,]);

    }
    public function actionList()
    {
        $news=new Text();
        $request = \Yii::$app->request;
         //获取post传参
         $data=$request->post();
        if($news->load($data) && $news->save() && $news->validate()){
            $this->redirect('index.php?r=index/show');
        }
        // $text_data = $request->post('text_data');
        // $text_pwd = $request->post('text_pwd');
        // $news->text_data=$text_data;
        // $news->text_pwd=$text_pwd; 
        // $news->save();
        // $this->redirect('index.php?r=index/show');
       // return $this->render('list');
    }
    public function actionShow(){
      $data=yii::$app->request->get();
      //实例化查询类
      $query=new \yii\db\Query();
      //查询表
      $query->from('text');
      //判断名称的值是否存在，不存在则为空
      if(isset($data['text_data'])&&$data['text_data']!=''){
        $query->andWhere(['like','text_data',$data['text_data']]);   //是andWhere  不是addwhere  括号里是数组
      }else{
        $data['text_data']='';
      }
      //判断内容是否为空，否则的话就为空
      if(isset($data['text_pwd'])&&$data['text_pwd']!=''){
          $query->andWhere(['like','text_pwd',$data['text_pwd']]);
      }else{
          $data['text_pwd']='';
      }
      $pages= new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'  => 5   //每页显示条数

            ]);
      $data = $query->offset($pages->offset)  //查询出来的每一页的
                  ->limit($pages->limit)
                  ->all();  
       return $this->render('list',array('data'=>$data,'pages'=>$pages));

    }
    public function actionDel(){
        $news=new Text;
        $text_id = $_GET['text_id'];
        $data = $news->deleteAll(['text_id'=>$text_id]);
        if($data){
            echo "<script>alert('删除成功');location.href='index.php?r=index/show'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='index.php?r=index/show'</script>";
        }
    }
    public function actionUpdate(){
        $news=new Text;
        $text_id = $_GET['text_id'];
        $jyl=$news->find()->where(['text_id'=>$text_id])->one();
        return $this->render('update',array('jyl'=>$jyl));
    }
    public function actionUpdateall(){
         $news=new Text;
        $request = \Yii::$app->request;
         //获取post传参
        $text_id = $request->post('text_id');
        print_r($text_id);
        $text_data = $request->post('text_data');
        $text_pwd = $request->post('text_pwd');
        $data = $news->updateAll(['text_data'=>$text_data,'text_pwd'=>$text_pwd],['text_id'=>$text_id]);
        if($data){
            echo "<script>alert('修改成功');location.href='index.php?r=index/show'</script>";
            // location.href='index.php?r=index/list';
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=index/show'</script>";
            // location.href="index.php?index/list";
        }
    }
}
