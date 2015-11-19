<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '试题添加';
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ],
])
?>
    <!--<style>-->
    <!--    .form-control{width:50%;}-->
    <!--</style>-->
<?= $form->field($model, 'rq_title') ?>
<?= $form->field($model, 'rq_center') ?>
<?= $form->field($model, 'class_id')->dropDownList($classify) ?>
<?= $form->field($model, 'com_id')->dropDownList($company) ?>
<?= $form->field($model, 'rq_dity')->dropDownList([
    1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5
]) ?>
<?= $form->field($model, 'rq_total') ?>
<?= $form->field($model, 'rq_img')->fileInput() ?>
<?= $form->field($model, 'rq_desc')->textarea() ?>

<?= Html::submitButton($model->isNewRecord ? '添加真题' : '修改真题', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


<?php ActiveForm::end() ?>
