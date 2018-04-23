<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Arc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arc-files-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该条文件吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'filepath',
            ['attribute' =>'filesize',
            		'value'=>
            		function($model){
            			return  Yii::$app->formatter->asSize($model->filesize);   //主要通过此种方式实现
            		},
   		 	],
             ['attribute' => 'time',
	             'value'=>
	                function($model){
	                    return  date('Y-m-d H:i:s',$model->time);   //主要通过此种方式实现
	                },
            ],
            'users.username',
            ['attribute' => 'arcresult',
             'value'=>
	            function($model){
            		return  $model->arcresult;   //主要通过此种方式实现
	            },
            ],
        ],
        // 'template' 属性调整表格每一行的样式
        'template' => '<tr><th style="width: 120px;">{label}</th><td style="word-wrap:break-word;word-break:break-all;max-height:300px;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: auto;"><div style="overflow:auto">{value}</div></td></tr>', 
    ]) ?>

</div>
