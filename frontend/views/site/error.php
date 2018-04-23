<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
		上面的错误会发生主要因为网页的服务器没有处理您的请求。
    </p>
    <p>
		如果您认为是服务器的原因请联系我们，谢谢！<br />
    </p>

</div>
