<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */

$this->title = 'Create Arc Files';
$this->params['breadcrumbs'][] = ['label' => 'Arc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arc-files-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
