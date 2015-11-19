<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$model->q_selects = "#选项1#选项2#选项3#选项4#";
$model->q_answer = "#选项1#选项2#";
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
    ],
])
?>
<?= $form->field($model,'q_title'); ?>
<?= $form->field($model,'q_type')->dropDownList([
    1=>'单选题',2=>'多选题'/*,3=>'三级',4=>'四级',5=>'五级'*/
]); ?>

<div class="form-group field-question-know_id">
    <label class="control-label" for="question-know_id">知识点</label>
    <select id="question-know_id" class="form-control" name="Question[know_id]">
        <option value="0">请选择</option>
        <?php foreach($know as $val):?>
            <option value="<?php echo $val['know_id']?>">
                <?php
                    for($i=0 ;$i<$val['deep'] ;$i++){
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                ?>
                <?php echo $val['know_name']?>
            </option>
        <?php endforeach;?>
    </select>
</div>
<?= $form->field($model,'rq_id')->dropDownList(array_merge([0=>'请选择'],$rq),['id'=>'parent_list']); ?>
<?= $form->field($model,'label'); ?>
<?= $form->field($model,'q_selects')->textarea(); ?>
<?= $form->field($model,'q_answer')->textarea(); ?>
<?= Html::submitButton($model->isNewRecord ? '添加试题' : '修改试题', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end();?>