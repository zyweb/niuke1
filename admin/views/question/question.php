<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '试题列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<style>
    tr:hover{background:#f9f9f9;}
    .question{list-style: none;padding:0;margin:0;}
    .question li{background:#d3d3d3;margin:5px 0;padding:5px;border-radius:5px;}
</style>
<p>
    <?= Html::a('添加试题', ['question/add_question'], ['class' => 'btn btn-success']) ?>
</p>

    <table class="table table-bordered">
        <thead>
        <th><a>序号</a></th>
        <th><a>试题名称</a></th>
        <th><a>类型</a></th>
        <th><a>知识点</a></th>
        <th><a>所属真题</a></th>
        <th><a>考点</a></th>
        <th><a>选项</a></th>
        <th><a>答案</a></th>
        <th><a>参加人数</a></th>
        <th><a>操作</a></th>
        </thead>
        <?php foreach($model as $val):?>
            <tr>
                <td width="20"><?= Html::encode($val['q_id'])?></td>
                <td><?= Html::encode($val['q_title'])?></td>
                <td><?= Html::encode($val['q_type'])?></td>
                <td><?= Html::encode($val['know_id'])?></td>
                <td><?= Html::encode($val['rq_id'])?></td>
                <td><?= Html::encode($val['label'])?></td>
                <td>
                    <ul class="question">
                        <?php foreach($val['q_selects'] as $v):?>
                        <li><?= Html::encode($v)?></li>
                        <?php endforeach;?>
                    </ul>

                </td>
                <td>
                    <ul class="question">
                        <?php foreach($val['q_answer'] as $v):?>
                            <li><?= Html::encode($v)?></li>
                        <?php endforeach;?>
                    </ul>
                </td>
                <td><?= Html::encode($val['join_sum'])?></td>
                <td>
                    <a href="upd_question?id=<?php echo $val['q_id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="del_question?id=<?php echo $val['q_id']?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php endforeach;?>

    </table>
<?= LinkPager::widget(['pagination' => $pages]) ?>