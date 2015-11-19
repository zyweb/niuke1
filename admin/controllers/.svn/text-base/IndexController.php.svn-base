<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use PHPMailer;

//use daixianceng\smser\CloudSmser;
//use Cloud;
class IndexController extends Controller
{

    public function actionIndex()
    {
        /*
        //邮件
        $mer =  new \PHPMailer;
        $message = 'Hello World';
        $mer->Host = 'smtp.163.com';
        $mer->Port = 25;
        $mer->IsSMTP();
        $mer->SMTPAuth= true;
        $mer->Username = "shaobo123_ok@163.com";//你的用户名，或者完整邮箱地址
        $mer->Password = "uskfvkxfjkfoceuv";//邮箱密码
        $mer->SetFrom('shaobo123_ok@163.com','陈科良');//发送的邮箱和发送人
        $mer->AddAddress('982610242@qq.com');
        $mer->Subject = 'YII注册信息';
        $mer->Body = $message;

        if ($mer->Send()) {
            echo 1;
        }
        else{
            echo 2;
        }
         */
        
        /*//自定义类
        $cloud = new \Cloud();
        $http = 'http://api.sms.cn/mtutf8/'; //短信接口
        $uid = 'php1402a'; //用户账号
        $pwd = 'php1402a'; //密码
        $mobile = '18611257422'; //号码，以英文逗号隔开
        $mobileids = 'php1402A'; //号码唯一编号
        $content = '【八维】你好！！！';
        //即时发送
        $res = $cloud->sendSMS($http,$uid,$pwd,$mobile,$content,$mobileids);
        echo $res;
         * 
         */
        //扩展
        $res = Yii::$app->smser->send('18611257422','【尊称】你好！！');
        echo $res;
    }
}
