<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArcClassify */

$this->title = 'Create Arc Classify';
$this->params['breadcrumbs'][] = ['label' => 'Arc Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arc-classify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
