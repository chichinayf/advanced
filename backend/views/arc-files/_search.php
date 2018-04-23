<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ArcFilesSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arc-files-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'filepath') ?>

    <?= $form->field($model, 'temppath') ?>

    <?= $form->field($model, 'filesize') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?= $form->field($model, 'users.username') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
