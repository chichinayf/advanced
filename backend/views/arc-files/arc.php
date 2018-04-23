<?php
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ArcFilesSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '人工智能语音识别结果（JAVA）';
$this->params ['breadcrumbs'] [] = $this->title;
$filepath = Yii::$app->BasePath.$model->filepath;
$filepath = json_encode($filepath);
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
	$.ajax({
		type:"post",
		url:"http://localhost:8080/MySSH/arc/login.action",/*url写异域的请求地址*/
	   dataType : "jsonp", 
	   jsonp: "callback",
	   async: false, 
	   cache: false,
	   data:{filepath:<?= $filepath ?>},
	   success: function(data){  
	    if (data != null && data != "") { 
	        $("#result").text(data.text);
	        writeToModel(data,<?= $id ?>);
	    }else{
			$("#loading").attr("hidden","hidden");
			$("#success").attr("hidden","hidden");
			$("#faild").removeAttr("hidden");
	    }                        
	   },
	   error: function(error){
		   krajeeDialog.alert('服务端错误，请联系超级管理员！');
		   $("#success").attr("hidden","hidden");
		   $("#loading").attr("hidden","hidden");
			$("#faild").removeAttr("hidden");
	   }
	});
});
/**
 * 将数据写到数据库里面
 */
function writeToModel(mydata,id){
	var url ="?r=arc-files/update&id="+id; 
	$.ajax({
		type:"post",
		async:true,
		cache:false,
		url:url,/*url写异域的请求地址*/
		data:{
			updatetime:new Date().getTime(),
			arcresult:mydata.text
		},
		success: function(datas){
			krajeeDialog.alert("识别成功！");
			$("#loading").attr("hidden","hidden");
	        $("#success").removeAttr("hidden");
		},
		error: function(error){
			krajeeDialog.alert('保存数据失败，请联系超级管理员');
			$("#success").attr("hidden","hidden");
		   $("#loading").attr("hidden","hidden");
			$("#faild").removeAttr("hidden");
		}
    });
}
</script>