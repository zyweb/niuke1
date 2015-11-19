<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron" style="margin-top:100px;">
        <h1>欢迎来到PCZF后台管理系统!</h1>

        <p class="lead">Nothing is impossible!</p>
        <?php if(\Yii::$app->user->isGuest){?>
            <p><a class="btn btn-lg btn-success" href="index.php/site/login">现在去登录</a></p>
        <?php }else{?>
            <p><a class="btn btn-lg btn-success" href="javascript:void(0)">Welcome</a></p>
        <?php }?>
    </div>

</div>

