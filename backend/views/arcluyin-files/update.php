<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */

$this->title = 'Update Arc Files: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Arc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arc-files-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
