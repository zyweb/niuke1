<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '真题列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<style>
    tr:hover{background:#f9f9f9;}
</style>
<p>
    <?= Html::a('添加真题', ['question/add_rquestion'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table table-bordered">
    <thead>
        <th><a>序号</a></th>
        <th><a>封面</a></th>
        <th><a>真题名称</a></th>
        <th><a>考点</a></th>
        <th><a>所属类型</a></th>
        <th><a>所属公司</a></th>
        <th><a>总分</a></th>
        <th><a>难度系数</a></th>
        <th><a>介绍</a></th>
        <th><a>操作</a></th>
    </thead>
    <?php foreach($model as $val):?>
    <tr>
        <td width="20"><?= Html::encode($val['rq_id'])?></td>
        <td width="100"><?= Html::img('@web/'.$val['rq_img'],[
                'alt' => $val['rq_title'],
                'style' => 'width:100px;'
            ])?></td>
        <td><?= Html::encode($val['rq_title'])?></td>
        <td><?= Html::encode($val['rq_center'])?></td>
        <td><?= Html::encode($val['class_id'])?></td>
        <td><?= Html::encode($val['com_id'])?></td>
        <td><?= Html::encode($val['rq_total'])?></td>
        <td><?= Html::encode($val['rq_dity'])?></td>
        <td width="20%"><?= Html::encode(mb_substr($val['rq_desc'],0,20,'utf-8'))?></td>
        <td>
            <a href=""><span class="glyphicon glyphicon-pencil"></span></a>
            <a href=""><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;?>

</table>
<?= LinkPager::widget(['pagination' => $pages]) ?>
