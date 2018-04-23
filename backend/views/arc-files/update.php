<?php

/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */
$this->title = '修改人工智能语音文件: ';
$this->params['breadcrumbs'][] = ['label' => 'Arc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arc-files-update">

	<h4>"网站后台根目录"<?= $model->filepath ?></h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
