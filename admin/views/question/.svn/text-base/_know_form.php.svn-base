<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
    ],
])
?>
<?= $form->field($model,'know_name'); ?>
<?= $form->field($model,'level')->dropDownList([
    1=>'一级',2=>'二级'/*,3=>'三级',4=>'四级',5=>'五级'*/
],[
    'onchange'=>'sel_parent(this.value)'
]); ?>

<?= $form->field($model,'parent_id')->dropDownList([0=>'请选择'],['id'=>'parent_list']); ?>
<?= Html::submitButton($model->isNewRecord ? '添加知识点' : '修改知识点', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>



<?php ActiveForm::end();?>