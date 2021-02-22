<?php
namespace app\controllers\api;
use app\models\Member;
use yii\web\Controller;

class LoginController extends ApiCommon {
    public $enableCsrfValidation=false;
    /**
     * 登录
     */
    public function actionLogin(){
//        session_start();
        $session = \Yii::$app->session;
        $g = $session->get('VerifyCode');
//        dd($g);
        $request = \Yii::$app->request;
        $data = $request->post();
        if(!$data['tel']){
            return json_encode(['code'=>10000,'msg'=>'手机号不能为空']);
        }
        if(!$data['pwd']){
            return json_encode(['code'=>10001,'msg'=>'密码不能为空']);
        }
        $info = Member::find()->where(['tel'=>$data['tel']])->one();
        //图片验证码没有判断
        if($info){
//            $secretKey = \Yii::$app->params['secretKey'];
//            $info['m_pwd'] = base64_decode($info['m_pwd']);
//            $info['m_pwd'] = \Yii::$app->getSecurity()->decryptByPassword($info['m_pwd'], $secretKey);
            if($data['pwd']){
                if($info['error_num']==3) {
                    if (time() - $info['error_time'] < 86400) {
                        return json_encode(['code' => 10004, 'msg' => '错误次数过多请24小时后再登录']);
                    }
                }
                $info->error_num = 0;
                $info->save();
                //存session
                return json_encode(['code'=>200,'msg'=>'登录成功']);
            }else{
                //用户名或密码错误3次给出提示24小时后才可以登录
                if($info['error_num']>=2){
                    if($info['error_num']==3){
                        if(time()-$info['error_time']>=86400){
                            $info->error_num =0;
                            $info->save();
                        }else{
                            return json_encode(['code'=>10004,'msg'=>'错误次数过多请24小时后再登录']);
                        }
                    }else{
                        $info->error_num = $info['error_num']+1;
                        $info->error_time = time();
                        $info->save();
                        return json_encode(['code'=>10004,'msg'=>'错误次数过多请24小时后再登录']);
                    }
                }
                $info->error_num = $info['error_num']+1;
                $info->error_time = time();
                $info->save();
                return json_encode(['code'=>10002,'msg'=>'用户名或密码错误']);
            }
        }else{
            return json_encode(['code'=>10005,'msg'=>'用户不存在']);
        }
    }
}