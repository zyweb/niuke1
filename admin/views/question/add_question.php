<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;


$this->title = '添加试题';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
<?= $this->render('_question_form',['model'=>$model,'know'=>$know,'rq'=>$rq]);?>