<?php

namespace backend\controllers;

use Yii;
use app\models\ArcFiles;
use app\models\search\ArcFilesSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\ArcClassify;
use app\models\search\ArcClassifyTypeFilesSearchModel;

/**
 * 语音识别录音文件
 */
class ArcluyinFilesController extends CommonController
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
    	$luyinType = ['type' => 1];//录音文件表示类型为1的
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->where($luyinType)
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
     * Creates a new ArcFiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArcFiles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArcFiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
