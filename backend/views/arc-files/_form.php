<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */
/* @var $form yii\widgets\ActiveForm */
use kartik\file\FileInput;

?>

<div class="arc-files-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
	<?=$form->field ( $model, 'file[]' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'pcm/wav','multiple' => true],'pluginOptions' => [// 最多上传的文件个数限制
        'maxFileCount' => 10, ]] );?>
	
    <?php ActiveForm::end(); ?>

</div>
