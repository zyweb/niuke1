<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '知识点';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<style>
    tr:hover{background:#f9f9f9;}
    span:hover{cursor:pointer;}
</style>
<p>
    <?= Html::a('添加知识点', ['question/add_knowpoint'], ['class' => 'btn btn-success']) ?>
</p>
<table class="table table-bordered">
    <thead>
    <th><a>序号</a></th>
    <th><a>知识点名称</a></th>
    <th><a>等级</a></th>
    <th><a>操作</a></th>
    </thead>
    <?php foreach($model as $val):?>
        <tr class="p<?php echo $val['parent_id']?>" style="
            <?php
                // 下级分类默认不显示
                if($val['parent_id'] != 0){
                    echo "display:none";
                }
            ?>
            ">
            <td width="5%"><span><?= Html::encode($val['know_id'])?></span></td>
            <td width="70%">
                <span onclick="show_child(<?php echo $val['know_id']?>)" title="点击显示下级分类" style="margin-left:<?php echo $val['deep']*4?>em;">
                    <?= Html::encode($val['know_name'])?>
                </span>
            </td>
            <td width="15%"><span style="margin-left:<?php echo $val['deep']*3?>em;"><?= Html::encode($val['level'])?></span></td>
            <td>
                <a href=""><span title="查看试题" class="glyphicon glyphicon-eye-open"></span></a>
                <a href=""><span title="修改知识点"class="glyphicon glyphicon-pencil"></span></a>
                <a href=""><span title="删除知识点"class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach;?>

</table>
<?= Html::jsFile('@web/assets/admin/js/jquery-1.11.3.min.js')?>

<script>
    function show_child(p){
        $(".p"+p).fadeToggle();
    }
</script>