<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        .dropdown:hover .menu-top {
            display: block;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }

        .dropdown-submenu > a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #cccccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover > a:after {
            border-left-color: #ffffff;
        }

        .dropdown-submenu .pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left > .dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PCZF后台管理系统',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => '题库管理', 'url' => ['/site/about'],
                'items' => [
                    ['label' => '真题列表', 'url' => ['question/rquestion_list']],
                    ['label' => '知识点', 'url' => ['question/knowpoint']],
                    ['label' => '试题列表', 'url' => ['question/question']],
                ]
            ],
            ['label' => '分类管理', 'url' => ['/site/contact'],
                'items' => [
                    ['label' => '讨论区', 'url' => ['about']],
                    ['label' => '二级2', 'url' => ['#']],
                ]
            ],
            ['label' => '课程管理', 'url' => ['/site/contact'],
                'items' => [
                    ['label' => '二级1', 'url' => ['#']],
                    ['label' => '二级2', 'url' => ['#']],
                ]
            ],
            ['label' => '用户管理', 'url' => ['/site/contact'],
                'items' => [
                    ['label' => '二级1', 'url' => ['#']],
                    ['label' => '二级2', 'url' => ['#']],
                ]
            ],
            Yii::$app->user->isGuest ?
                ['label' => '登录', 'url' => ['/site/login']] :
                [
                    'label' => '退出 (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => '首页',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php
        if (Yii::$app->getSession()->hasFlash('success')) {
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success', //这里是提示框的class
                ],
                'body' => Yii::$app->getSession()->getFlash('success'), //消息体
            ]);
        }
        if (Yii::$app->getSession()->hasFlash('error')) {
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => Yii::$app->getSession()->getFlash('error'),
            ]);
        }
        ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
