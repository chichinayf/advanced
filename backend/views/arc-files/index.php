<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\file\d;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ArcFilesSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\User;
$this->title = '人工智能语音文件列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arc-files-index auto-wide">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('/common/dialog')?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
    	'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'pager'=>[
			//'options'=>['class'=>'hidden']//关闭自带分页
			'firstPageLabel'=>"第一页",
			'prevPageLabel'=>'上一页',
			'nextPageLabel'=>'下一页',
			'lastPageLabel'=>'最后一页',
    	],
    	'showFooter' => true,  //设置显示最下面的footer
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class'=> 'yii\grid\CheckboxColumn',
            'name'=>'id',  //设置每行数据的复选框属性
            'footer' => '<button id="deleteMany" href="#" class="btn btn-default btn-xs btn-delete" url="'. Url::toRoute('admin/delete') .'">删除</button>',
            'footerOptions' => ['colspan' => 1],  //设置删除按钮垮列显示；
            ],
            ['attribute' =>'name',
                'footer' => '<input id="num"  type="number" href="#" class="btn btn-default btn-xs btn-delete" placeholder="每页显示的条数"/>',
                'value'=>
                function($model){
                    if(strlen($model->name)>20){
                        return  mb_substr($model->name, 0,20).'...';   //主要通过此种方式实现
                    }else{
                        return $model->name;
                    }
                },
                'options'=>[
                    'width'=>'15%',
                ]
            ],
            ['attribute' =>'filesize',
            		'value'=>
            		function($model){
            		   Yii::$app->formatter->sizeFormatBase = 1023.9;
            			return  Yii::$app->formatter->asShortSize($model->filesize,2);   //主要通过此种方式实现
            		},
   		 	],
            ['attribute' => 'time',
	             'value'=>
	                function($model){
	                    return  date('Y-m-d H:i:s',$model->time);   //主要通过此种方式实现
	                },
            ],
            ['attribute' => 'arcresult',
	            'value'=>
	            function($model){
	                	if(strlen($model->arcresult)>4){
		            		return  mb_substr($model->arcresult, 0,4).'...';   //主要通过此种方式实现
	                	}else{
	                		return $model->arcresult;
	                	}
	            },
	            'options'=>[
                    'width'=>'15%',
	            ]
            ],
            [
	            'attribute' => 'username',
	            'value' => 
                function($model){
                        $users = new User();
                        $user = $users->findOne($model->user);
	                	if(strlen($user->username)>6){
		            		return  mb_substr($user->username, 0,6).'...';   //主要通过此种方式实现
	                	}else{
	                		return $user->username;
	                	}
	            },
                'options'=>[
                    'width'=>'15%',
                ]
            ],//下面是新增加的按按钮
            ['class' => 'yii\grid\ActionColumn',
            	'header'=>'操作',
            	'template' => ' {view} {update} {arc} {arc-restful} {delete}',
            	'buttons' => [
            		'arc' => function ($url, $model, $key) {
            		return  Html::a('<span class="btn btn-dange">识别1</span>', $url, ['title' => '调用JAVA接口进行语音识别（分担本地的压力）'] ) ;
            		},
            		'arc-restful' => function ($url, $model, $key) {
            		return  Html::a('<span class="btn btn-dange">识别2</span>', $url, ['title' => '调用RESTFUL接口进行语音识别（分担服务器的压力）'] ) ;
            		},
            	],
//             	'headerOptions' => ['width' => '180']
            ]
        ],
    ]); ?>
</div>

<script type="text/javascript">
$(function(){ 
    $("#deleteMany").click(function(){
        var deleteIds = $("#grid").yiiGridView("getSelectedRows");
        if(deleteIds == null || deleteIds == ""){
        	krajeeDialog.alert("请选择要删除的记录！");
        	return false;
        }
    	krajeeDialog.confirm("确认是否要删除这些记录？",function(result){
			if(result){
                var url = "delete-ids";
                $.ajax({
                	type:"post",
                	async:true,
                	cache:false,
                	url:url,/*url写异域的请求地址*/
                	data:{
                    	ids:deleteIds
                	},
                	success: function(datas){
                		krajeeDialog.alert("刪除成功！");
                		location.reload();
                	},
                	error: function(error){
                		krajeeDialog.alert('删除数据失败，请联系超级管理员！');
                	}
                });
			}
        });
    });

    $("#num").blur(function(){//当鼠标失去焦点时就出发事件，实现分页的页改变
        var url = "<?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>";
        $.ajax({
        	type:"post",
        	async:true,
        	cache:false,
        	url:url,/*url写异域的请求地址*/
        	data:{
            	pageSize:$("#num").val()
        	},
        	success: function(datas){
        		window.location.reload()
        	},
        	error: function(error){
        	}
        });
    });
});
</script>
