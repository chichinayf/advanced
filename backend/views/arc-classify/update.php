<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArcClassify */

$this->title = 'Update Arc Classify: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Arc Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arc-classify-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
