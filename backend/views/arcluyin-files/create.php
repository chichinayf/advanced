<?php

$this->title = '新增人工智能语音文件';
$this->params['breadcrumbs'][] = ['label' => '语音识别文件', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arc-files-create">
	
	<h4>可一次性多文件上传，然后在文件列表里面进行识别</h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
