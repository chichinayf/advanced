<?php

namespace backend\controllers;

use app\models\ArcFiles;
use app\models\search\ArcFilesSearchModel;
use common\helps\Arc;
use common\helps\UploadFiles;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\Html;

/**
 * 语音识别文件
 */
class ArcFilesController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArcFiles models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$searchModel = new ArcFilesSearchModel();//实现分业查询
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = $dataProvider->query;
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        if(isset($_POST['pageSize'])){//设置了参数，就把参数给pageSize session
            setcookie('pageSize',$_POST['pageSize']);
        }
        if(!empty($_COOKIE['pageSize'])){
            $pages->pageSize = (int)$_COOKIE['pageSize'];            
        }else{
            $pages->pageSize = 5;
        }
		$models = $query->offset($pages->offset)
		    ->limit($pages->limit)
		    ->all();
		$dataProvider->pagination = $pages;
		return $this->render('index', [
		    'models' => $models,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		    'pages' => $pages,
		]);
    }
    
    /**
     * Displays a single ArcFiles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * 多文件上传
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new ArcFiles();
        
        if (Yii::$app->request->isPost) {
        	$model->file = UploadedFile::getInstances($model, 'file');
        	if (UploadFiles::upload($model)) {
        		// 文件上传成功
        		echo Yii::$app->session->setFlash('success','上传成功！');
        	}
        }
        return $this->render('create', ['model' => $model]);
    }
    
    /**
     * 单文件上传可以实现实时的语音识别
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateSingle()
    {
    	
        $model = new ArcFiles();
        
        if (Yii::$app->request->isPost) {
        	$model->file = UploadedFile::getInstances($model, 'file');
        	$resultId = UploadFiles::upload_single($model);
        	if ($resultId) {
        		// 文件上传成功
        	    $model = $this->findModel($resultId);
        		echo Yii::$app->session->setFlash('success','识别成功！识别结果是 ：'.$model->arcresult);
        	}
        }
        return $this->render('create-single', ['model' => $model]);
    }
    
    /**
     * Updates an existing ArcFiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        
        if(!empty($post['arcresult']) && $post['arcresult']!="" ){//表示是语音识别过来的
	        $model->arcresult = $post['arcresult'];
	        $model->updatetime = (int)$post['updatetime'];
	        if ($model->validate () && $model->save()) {
	            return;
	        }
        }else{//表示是上传文件过来的
	        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	        	return $this->redirect(['view', 'id' => $model->id]);
	        }
        }
        return $this->render('update', [
        		'model' => $model,
        ]);
    }

    /**
     * 删除单条记录
     * @param unknown $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $basePath = Yii::$app->basePath;//项目的绝对路径
        $model = $this->findModel($id);
        $filepath = $model->filepath;
        if($model->delete()){
            if(unlink($basePath.$filepath)){
                echo "删除文件成功！";//删除该文件
            }else{
                echo "删除文件失败！";
            }
        }
        return $this->redirect(['index']);
    }
    /**
     * 删除多项
     * @param unknown $id
     * @return \yii\web\Response
     */
    public function actionDeleteIds()
    {
        $basePath = Yii::$app->basePath;//项目的绝对路径
        $post = Yii::$app->request->post();
        $idArr = $post['ids'];//把得到的id分割
        if(count($idArr)>1){//表示得到的是多个id,要删除多项
            foreach ($idArr as $k=>$v){
                $model = $this->findModel($v);
                $filepath = $model->filepath;
                if($model->delete()){
                    if(unlink($basePath.$filepath)){
                        echo "删除文件成功！";//删除该文件
                    }else{
                        echo "删除文件失败！";
                    }
                }
            }
        }
    }
    
    /**
     * 进行语音识别，拿到id的文件，然后对其进行相应的java接口进行相应的交互
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return \app\models\ArcFiles|NULL
     */
    public function actionArc($id)
    {
    	$url_base = Url::base();
    	$model = $this->findModel($id);
    	return $this->render('arc',['id'=>$id,'model'=>$model,'url_base'=>$url_base]);
    }
    
    /**
     * 进行语音识别，拿到id的文件，然后直接与阿里云进行交互，与上一种方法不一样
     * @throws NotFoundHttpException
     * @return \app\models\ArcFiles|NULL
     */
    public function actionArcRestful($id)
    {
        $url_base = Url::base();
        $model = $this->findModel($id);
    	return $this->render('arc-restful',['id'=>$id,'model'=>$model,'url_base'=>$url_base]);
    }
    
    /**
     * 通过不用本地提交文件，直接在服务器上实现识别的方式
     * @param unknown $id
     */
    public function actionArcRestfulOnline($id){
        //项目在服务器的绝对根路径
		$basePath = Yii::$app->basePath;
        $model = $this->findModel($id);
        $res = Arc::sendAsrPost('https://nlsapi.aliyun.com/recognize?model=chat',$basePath.$model->filepath);
        $result = json_decode($res);
        $model->arcresult = $result->result;
        $saveRes = $model->save();
        echo $model->arcresult;
        return;
    }
    
    /**
     * 实时的语音识别
     * @return string
     */
    public function actionRealtime(){
        return $this->render('realtime');
    }

    /**
     * Finds the ArcFiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArcFiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArcFiles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页面不存在。');
    }
    
}
