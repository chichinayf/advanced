<?php
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
/**
 * 这是弹窗窗口,用法是只需要传入一个$view参数
 */
echo Html::a ( '来一个弹框', '#', [
		'id' => 'create',
		'data-toggle' => 'modal',
		'data-target' => '#create-modal', // 关联下面Model的id属性
		'class' => 'btn btn-success'
] );
Modal::begin ( [
		'id' => 'create-modal',
		'header' => '<h4 class="modal-title">提示</h4>',
		'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>'
] );
$requestUrl = Url::toRoute ( $view ); // 弹窗的html内容，下面的js会调用获得该页面的Html内容，直接填充在弹框中
$js = <<<JS
    $.get('{$requestUrl}', {},
        function (data) {
            $('.modal-body').html(data);
        }
    );
JS;
$this->registerJs ( $js );
Modal::end ();