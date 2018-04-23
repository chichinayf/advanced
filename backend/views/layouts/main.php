<?php
use yii\helpers\Html;
use common\models\User;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
	
	/**
	 * Do not use this code in your template.
	 * Remove it.
	 * Instead, use the code $this->layout = '//main-login'; in your controller.
	 */
	echo $this->render ( 'main-login', [ 
			'content' => $content 
	] );
} else {
	if (Yii::$app->user->isGuest) { // 没登录就直接跳转到登录页面
		$login_url = Yii::$app->getHomeUrl().'index.php?r=site%2Flogin';
		Yii::$app->getResponse()->redirect($login_url);
	}
	if (class_exists ( 'backend\assets\AppAsset' )) {
		backend\assets\AppAsset::register ( $this );
	} else {
		app\assets\AppAsset::register ( $this );
	}
	
	dmstr\web\AdminLteAsset::register ( $this );
	
	$directoryAsset = Yii::$app->assetManager->getPublishedUrl ( '@vendor/almasaeed2010/adminlte/dist' );
	
	$user = Yii::$app->user;
	$username = '';
	$is_logining = '';
	$role_name = '';
	if (! empty ( $user->identity )) {
		$username = Yii::$app->user->identity->username;
		$user_id = Yii::$app->user->identity->id;
		$is_logining = Yii::$app->user->isGuest;
		if ($is_logining) {
			$is_logining = '离线';
		} else {
			$is_logining = '在线';
		}
		$role = Yii::$app->authManager->getRolesByUser ( $user_id );
		$role = end ( $role );
		$role_name = $role->name;
	}
	?>
    <?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags()?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <?php $this->head()?>
    </head>
<body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody()?>
    <div class="wrapper">

        <?=$this->render ( 'header.php', [ 'directoryAsset' => $directoryAsset,'username' => $username,'is_logining' => $is_logining,'role_name' => $role_name ] )?>

        <?=$this->render ( 'left.php', [ 'directoryAsset' => $directoryAsset ,'username' => $username,'is_logining' => $is_logining,'role_name' => $role_name] )?>

        <?=$this->render ( 'content.php', [ 'content' => $content,'directoryAsset' => $directoryAsset ] )?>

    </div>

    <?php $this->endBody()?>
    </body>
</html>
<?php $this->endPage()?>
<?php } ?>
