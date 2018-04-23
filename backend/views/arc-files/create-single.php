<?php
use yii\helpers\Html;

$this->title = '新增人工智能语音文件';
$this->params ['breadcrumbs'] [] = [ 
		'label' => '语音识别文件',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="arc-files-create">
	<h4>只能单文件上传，但可以进行实时的语音识别</h4>
	<div hidden="hidden">
    <?= $this->render('/common/widget')?>
	<?= $this->render('/common/dialog')?>
	<h4><?= Html::encode('识别结果如下：') ?></h4>
		<p>
		<div id='results'></div>
        <?= Html::textarea('新增','', ['id'=>'result','class' => 'alert fade in','style'=>'width:100%','rows'=>'10']);?>
    </p>
	</div>
    <?=$this->render ( '_form_single', [ 'model' => $model ] )?>
    

</div>