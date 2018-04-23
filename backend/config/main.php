<?php
$params = array_merge ( require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php' );

return [ 
		'language' => 'zh-CN',
		'id' => 'app-backend',
		'basePath' => dirname ( __DIR__ ),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap' => [ 
				'log' 
		],
		'modules' => [ 
				"admin" => [ 
						"class" => "mdm\admin\Module" 
				] 
		],
		"aliases" => [ 
				"@mdm/admin" => "@vendor/mdmsoft/yii2-admin" 
		],
		'as access' => [ 
				'class' => 'mdm\admin\components\AccessControl',
				'allowActions' => [
						// 这里是允许访问的action
						// controller/action
						// * 表示允许所有，后期会介绍这个
						'*' 
				]
				// 'site/*',//允许访问的节点，可自行添加
				// 'admin/*',//允许所有人访问admin节点及其子节点
				 
		],
		'components' => [ 
				'request' => [ 
						'csrfParam' => '_csrf-backend' 
				],
				'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true,
						'identityCookie' => [ 
								'name' => '_identity-backend',
								'httpOnly' => true 
						] 
				],
				'session' => [
						// this is the name of the session cookie used for login on the backend
						'name' => 'advanced-backend' 
				],
				'log' => [ 
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'error',
												'warning' 
										] 
								] 
						] 
				],
				'errorHandler' => [ 
						'errorAction' => 'site/error' 
				],
				"authManager" => [ //权限管理为数据库模式
						"class" => 'yii\rbac\DbManager',
						"defaultRoles" => ["guest"],
				],
				'urlManager' => [ //网址美化
						'enablePrettyUrl' => true,
						'showScriptName' => false,
						'rules' => [ ] 
				],
    		    'assetManager' =>[//可以实现css修改后立即生效
                   'class' => 'yii\web\AssetManager',
                   'appendTimestamp' => true,
                   'forceCopy' => false,
                ],
		]
		,
		'params' => $params 
];
