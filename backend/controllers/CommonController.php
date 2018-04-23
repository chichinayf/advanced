<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;

class CommonController extends Controller {
	
	/**
	 * 权限的之前进行权限的验证，没有权限的不能访问相应的模块
	 *
	 * {@inheritdoc}
	 *
	 * @see \yii\web\Controller::beforeAction()
	 */
	public function beforeAction($action) {
		if (!parent::beforeAction($action)) {
			return false;
		}
		$action = Yii::$app->controller->action->id;
		$controller = Yii::$app->controller->id;
		$permissionName = '/'.$controller.'/'.$action;
// 		if (!Yii::$app->user->can($permissionName) 
// 				&& Yii::$app->getErrorHandler()->exception === null 
// 				&& !Yii::$app->user->isGuest) {
// 			//有权限访问该模块
// 			//表示没有权限访问该页面的模块，显示错误的页面
// 			ob_start();
// 			ob_clean();
// 			echo $this->render('@app/views/common/error');
// 			flush();
// 			exit();
// 		}else{
			return true;
// 		}
	}
	
	/**
	 * 弹窗，弹出窗口
	 * @param string $view 是视图，controller/action
	 * @param array $data 是数据，['model'=>$model]
	 * @return string
	 */
// 	public function actionAlert($view,$data){
		
// 	}
}