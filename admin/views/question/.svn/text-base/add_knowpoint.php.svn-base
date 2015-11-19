<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

$this->title = '添加知识点';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?= $this->render('_know_form',['model'=>$model]);?>
<script src="<?php echo WEB_PATH?>assets/admin/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    function sel_parent(level){
        $.ajax({
            url:'sel_parent',
            type:'post',
            data:{'level':level},
            dataType:'json',
            success:function(e){
                if(e != ''){
                    $("#parent_list").empty();
                    for(var i=0; i< e.length ; i++){
                        $("#parent_list").append("<option value='"+e[i].know_id+"'>"+e[i].know_name+"</option>");
                    }
                }else{
                    $("#parent_list").empty();
                    $("#parent_list").append("<option value='0'>请选择</option>");
                }
            }
        })
    }
</script>
