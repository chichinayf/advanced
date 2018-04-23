<?php
use yii\bootstrap\Alert;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ArcFilesSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '人工智能语音识别结果（RESTFUL）';
?>
<div class="arc-files-index">

	
	<?= $this->render('/common/widget')?>
	<?= $this->render('/common/dialog')?>
	<h4><?= Html::encode('识别结果如下：') ?></h4>
	<p>
        <?= Html::textarea('新增','', ['id'=>'result','class' => 'alert fade in','style'=>'width:100%','rows'=>'10']);?>
    </p>

</div>

<script type="text/javascript">
$(function(){ 
    /**
     * 将数据写到数据库里面
     */
	var url ="arc-restful-online?id="+<?= $id ?>; 
	$.ajax({
		type:"get",
		url:url,/*url写异域的请求地址*/
		success: function(datas){
			krajeeDialog.alert("识别成功！");
			$("#loading").attr("hidden","hidden");
	        $("#success").removeAttr("hidden");
	        $("#result").text(datas);
		},
		error: function(error){
			krajeeDialog.alert('保存数据失败，请联系超级管理员');
			$("#success").attr("hidden","hidden");
		   $("#loading").attr("hidden","hidden");
			$("#faild").removeAttr("hidden");
		}
    });
});
</script>