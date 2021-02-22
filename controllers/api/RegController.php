<?php
namespace app\controllers\api;
use app\models\Code;
use app\models\Member;
use yii\web\Controller;

class RegController extends ApiCommon {
    public $enableCsrfValidation =false;
    /**
     * 注册
     */
    public function actionReg(){
        $request = \Yii::$app->request;
        $data = $request->post();
//        print_r($data);die;
        //手机号非空
        if(!$data['tel']){
            return json_encode(['code'=>10001,'msg'=>'手机号不能为空']);
        }
        //邮箱非空
        if(!$data['email']){
            return json_encode(['code'=>10002,'msg'=>'邮箱不能为空']);
        }
        //密码判断非空
        if(!$data['pwd']){
            return json_encode(['code'=>10003,'msg'=>'密码不能为空']);
        }
        //判断两次密码是否一致
        if($data['pwd'] !== $data['pwdtwo']){
            return json_encode(['code'=>10004,'msg'=>'两次密码输入不一致']);
        }
        //手机号唯一性验证
        $tel_info = Member::find()->where(['tel'=>$data['tel']])->one();
        if($tel_info){
            return json_encode(['code'=>10005,'msg'=>'该手机号已经注册过了']);
        }
        //邮箱唯一性验证
        $email_info = Member::find()->where(['email'=>$data['email']])->one();
        if($email_info){
            return json_encode(['code'=>10006,'msg'=>'该邮箱已经注册过了']);
        }
        if(!$data['code']){
            return json_encode(['code'=>10007,'msg'=>'短信验证码不能为空']);
        }
        //判断验证码错误次数
        //错误一次出现图片验证码
        $code_info = Code::find()->where(['tel'=>$data['tel']])->orderBy('addtime desc')->one();
        if(!$code_info){
            return json_encode(['code'=>10010,'msg'=>'您还没发送验证码']);
        }
        if($data['code']!== $code_info['code']){
            //判断是否到有效期
            if($code_info['error_num']>1){
                if(time()-$code_info['error_time'] >= 3600){
                    $code_info->error_num = 0;
//                    $code_info->error_time = time();
                    $code_info->save();
                }else{
                    if($code_info['error_num']==2){
                        $code_info->error_num = $code_info['error_num']+1;
                        $code_info->error_time = time();
                        $code_info->save();
                    }
                    //错误三次拉入黑名单，根据ip限制
                    return json_encode(['code'=>10009,'msg'=>'验证码错误次数过多，请1小时后再试！']);
                }
            }
            $code_info->error_num = $code_info['error_num']+1;
            $code_info->error_time = time();
            $code_info->save();
            //获取图片路径
            $url = $this->actionGetimg();
            return json_encode(['code'=>10008,'msg'=>'验证码错误','data'=>$url]);
        }
        //验证码输入正确后判断它的次数是否已经大于等于3次了
        //如果大于等于3次，判断它的错误时间
        if($code_info['error_num']>=3){
            if(time()-$code_info['error_time'] >= 3600){
                $code_info->error_num = 0;
//                    $code_info->error_time = time();
                $code_info->save();
            }else{
                return json_encode(['code'=>10009,'msg'=>'验证码错误次数过多，请1小时后再重试！']);
            }
        }
        if(time()-$code_info['addtime']>=900){
            return json_encode(['code'=>10011,'msg'=>'验证码超时请重新获取']);
        }
        //判断图片验证码是否正确
        //开启session
//        if(array_key_exists('imgcode',$data)){
//            //如果有imgcode判断图片验证码
//            session_start();
//            if(empty($_SESSION["VerifyCode"])){
//                return json_encode(['code'=>10011,'msg'=>'图片验证码失效，请刷新重试']);
//            }
//            if(!$data['imgcode']){
//                return json_encode(['code'=>10012,'msg'=>'图片验证码不能为空']);
//            }
//            $str = strtolower($_SESSION["VerifyCode"]);//将随机生成的验证码转换成小写
//            $imgcode =strtolower($data["imgcode"]);//接收用户输入的验证码转换成小写
//            //有问题
//            if($str != $imgcode){
//                return json_encode(['code'=>10013,'msg'=>'图片验证码输入错误']);
//            }
//        }
//        $secretKey = \Yii::$app->params['secretKey'];
        //加密：encryptByPassword  解密：decryptByPassword
//        $m_pwd = \Yii::$app->getSecurity()->encryptByPassword($data['pwd'], $secretKey);
        //使用base64对密码进行处理
//        $m_pwd = base64_encode($m_pwd);
        $model = new Member();
        $model->tel = $data['tel'];
        $model->email = $data['email'];
        $model->m_pwd = $data['pwd'];
        $model->addtime = time();
//        dd($model);
        $res = $model->save();
        if($res){
            $code_info->error_num = 0;
            $code_info->save();
            return json_encode(['code'=>200,'msg'=>'注册成功']);
        }
    }
    /**
     * 发送短信验证码
     */
    public function actionSendcode(){
        $request = \Yii::$app->request;
        $tel = $request->post('tel');
        if(empty($tel)){
            return json_encode(['code'=>10001,'msg'=>'手机号不能为空']);
        }
        $info = Member::find()->where(['tel'=>$tel])->one();
        if($info){
            return json_encode(['code'=>10002,'msg'=>'该手机号已经注册过了']);
        }
        $oneinfo = Code::find()->where(['tel'=>$tel])->orderBy('addtime desc')->one();
        //验证码1小时内最多只能发送3条
//        if($oneinfo['getnum']>2){
//            if(time()-$oneinfo['addtime']>3600){
//                $oneinfo->get_num=0;
//            }else{
//                return json_encode(['code'=>10004,'msg'=>'一小时内最多只能发送3条短信，请稍后再试']);
//            }
//        }
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "969205f207c44e9d950e0be77e786bdc";
        $headers = array();
        $code = rand(100000,999999);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=".$tel."&param=code%3A".$code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $curl_result = curl_exec($curl);
//        var_dump($curl_result);
        $curl_arr = json_decode($curl_result,true);
//        var_dump($curl_arr);
        if(!empty($curl_arr) && $curl_arr['return_code'] == '00000'){
//            echo 123;
            $ip = \Yii::$app->request->getUserIP();
            $model = new Code();
            if(!empty($oneinfo)){
                $oneinfo->addtime = time();
                $oneinfo->code = $code;
//               $oneinfo->get_num = $oneinfo['get_num']+1;
                $oneinfo->save();
            }else{
                $model->tel=$tel;
                $model->code = $code;
                $model->ip = $ip;
                $model->addtime = time();
//                $model->get_num = $oneinfo['get_num']+1;
                $model->save();
            }
            return json_encode(['code'=>200,'msg'=>'短信验证码发送成功']);
        }
        return json_encode(['code'=>10003,'msg'=>'验证码发送失败，请稍后再试']);
    }
    /**
     * 获取图片验证码路径
     */
    public function actionGetimg(){
//        session_start();
//        $session = \Yii::$app->session;
//        $g = $session->get('VerifyCode');
//        dd($g);
        $host = \Yii::$app->request->getHostInfo();
        $url = $host.'?r=api/reg/vcode&'.rand(100000,999999);
        return $url;
    }
    /**
     * 图片验证码
     */
    //vCode 字符数目，字体大小，图片宽度、高度
    public function actionVcode($num = 4, $size = 20, $width = 0, $height = 0) {
        //开启session记录验证码数据
        session_start();
        !$width && $width = $num * $size * 4 / 5 + 15;
        !$height && $height = $size + 10;
        //设置验证码字符集合
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
        //保存获取的验证码
        $code = '';
        //随机选取字符
        for ($i = 0; $i < $num; $i++) {
            $code .= $str[mt_rand(0, strlen($str)-1)];
        }
//        $_SESSION["VerifyCode"]=$code;
        $session = \Yii::$app->session;
        $session->set('VerifyCode',$code);
        //创建验证码画布
        $im = imagecreatetruecolor($width, $height);
        //背景色
        $back_color = imagecolorallocate($im, mt_rand(0,100),mt_rand(0,100), mt_rand(0,100));
        //文本色
        $text_color = imagecolorallocate($im, mt_rand(100, 255), mt_rand(100, 255), mt_rand(100, 255));
        imagefilledrectangle($im, 0, 0, $width, $height, $back_color);
        // 画干扰线
        for($i = 0;$i < 5;$i++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
        }
        // 画干扰点
        for($i = 0;$i < 50;$i++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
        }
        //随机旋转角度数组
        $array=array(5,4,3,2,1,0,-1,-2,-3,-4,-5);
        // 输出验证码
        // imagefttext(image, size, angle, x, y, color, fontfile, text)

        @imagefttext($im, $size , array_rand($array), 12, $size + 6, $text_color, 'D:\img', $code);
        //no-cache在每次请求时都会访问服务器
        //max-age在请求1s后再次请求会再次访问服务器，must-revalidate则第一发送请求会访问服务器，之后不会再访问服务器
        // header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
        header("Cache-Control: no-cache");
        header("Content-type: image/png;charset=gb2312");
        //将图片转化为png格式
        imagepng($im);
        imagedestroy($im);
        exit;
    }
}