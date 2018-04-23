<aside class="main-sidebar">

	<section class="sidebar">

		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= $directoryAsset ?>/img/user2-160x160.jpg"
					class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p><?= $username?>(<?= $role_name?>)</p>

				<a href="#"><i class="fa fa-circle text-success"></i><?= $is_logining?></a>
			</div>
		</div>

		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="搜索..." />
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn'
						class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<?php
		$array = [ 
				[ 
						'label' => '菜单管理',
						'options' => [ 
								'class' => 'header' 
						] 
				],
				[ 
						'label' => '生成MVC（Gii）',
						'icon' => 'file-code-o',
						'url' => [ 
								'/gii' 
						] 
				],
				[ 
						'label' => '调试',
						'icon' => 'dashboard',
						'url' => [ 
								'/debug' 
						] 
				],
				[ 
						'label' => '登录',
						'url' => [ 
								'site/login' 
						],
						'visible' => Yii::$app->user->isGuest 
				],
    		    [
            		    'label' => '用户中心',
            		    'icon' => 'dashboard',
            		    'url' => [
            		        '#'
            		    ]
    		    ],
				[ 
						'label' => '人工智能语音识别',
						'icon' => 'fa fa-circle-o',
						'url' => 'javascript:;',
						'items' => [ 
    						    [
        						    'label' => '一句话识别',
        						    'icon' => 'dashboard',
        						    'url' => [
        						        '#'
        						    ],
    						        'items' => [
        						            [
        						            'label' => '文件列表',
        						            'icon' => 'fa fa-circle-o',
        						            'url' => [
        						                '/arc-files/index'
        						            ]
        						            ],
        						            [
        						                'label' => '文件上传',
        						                'icon' => 'fa fa-circle-o',
        						                'url' => [
        						                    '/arc-files/create' //多文件上传
        						                ]
        						            ],
        						            [
        						                'label' => '文件上传（语音识别）',
        						                'icon' => 'fa fa-circle-o',
        						                'url' => [
        						                    '/arc-files/create-single' //单文件上传
        						                ]
        						            ],
    						         ]
    						    ],
    						    [
            						    'label' => '实时语音识别',
            						    'icon' => 'fa fa-circle-o',
        						        'items' => [
        						            [
        						                'label' => '本机识别',
        						                'icon' => 'circle-o',
        						                'url' => 'realtime'
        						            ],
        						            [
        						                'label' => '一句话识别衍生',
        						                'icon' => 'circle-o',
        						                'url' => 'realtime'
        						            ],
        						        ]
    						    ],
						    
						] 
				],
				[ 
						'label' => 'CRM管理',
						'icon' => 'share',
						'url' => '#',
						'items' => [ 
								[ 
										'label' => '企业管理',
										'icon' => 'dashboard',
										'url' => [ 
												'#' 
										] 
								],
								[ 
										'label' => '短信管理',
										'icon' => 'dashboard',
										'url' => [ 
												'#' 
										] 
								],
								[ 
										'label' => '客户管理',
										'icon' => 'circle-o',
										'url' => '#',
										'items' => [ 
												[ 
														'label' => '我的客户',
														'icon' => 'circle-o',
														'url' => '#' 
												],
												[ 
														'label' => '公海客户',
														'icon' => 'circle-o',
														'url' => '#',
												],
												[ 
														'label' => '团队客户',
														'icon' => 'circle-o',
														'url' => '#',
												],
												[ 
														'label' => '客户回收设置',
														'icon' => 'circle-o',
														'url' => '#',
												],
										] 
								],
								[
										'label' => '共享管理',
										'icon' => 'dashboard',
										'url' => [
												'#'
										]
								],
								[
										'label' => '标签管理',
										'icon' => 'dashboard',
										'url' => [
												'#'
										]
								],
								[
										'label' => '自定义字段',
										'icon' => 'dashboard',
										'url' => [
												'#'
										]
								],
								[
										'label' => '引号管理',
										'icon' => 'dashboard',
										'url' => [
												'#'
										]
								],
								[
										'label' => '销售漏斗',
										'icon' => 'dashboard',
										'url' => [
												'#'
										]
								],
    						    [
            						    'label' => '商品管理',
            						    'icon' => 'fa fa-circle-o',
            						    'url' => 'javascript:;',
            						    'items' => [
            						        [
            						            'label' => '商品列表',
            						            'icon' => 'fa fa-circle-o',
            						            'url' => [
            						                '/goods/index'
            						            ]
            						        ],
            						        [
            						            'label' => '商品新增',
            						            'icon' => 'fa fa-circle-o',
            						            'url' => [
            						                '/goods/create'
            						            ]
            						        ]
            						    ]
    						    ],
						] ,
				],
    		    [
        		    'label' => '权限管理',
        		    'icon' => 'fa fa-circle-o',
        		    'url' => 'javascript:;',
        		    'items' => [
        		        [
        		            'label' => '路由列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/route'
        		            ]
        		        ],
        		        [
        		            'label' => '权限列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/permission'
        		            ]
        		        ],
        		        [
        		            'label' => '角色列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/role'
        		            ]
        		        ],
        		        [
        		            'label' => '用户与角色列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/assignment'
        		            ]
        		        ],
        		        [
        		            'label' => '规则列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/rule'
        		            ]
        		        ],
        		        [
        		            'label' => '菜单列表',
        		            'icon' => 'fa fa-circle-o',
        		            'url' => [
        		                '/admin/menu'
        		            ]
        		        ]
        		    ]
    		    ],
    		    [
        		    'label' => '其他工具',
        		    'icon' => 'share',
        		    'url' => '#',
        		    'items' => [
        		        [
        		            'label' => '一级菜单示范0',
        		            'icon' => 'dashboard',
        		            'url' => [
        		                '/test'
        		            ]
        		        ],
        		        [
        		            'label' => '一级菜单示范',
        		            'icon' => 'circle-o',
        		            'url' => '#',
        		            'items' => [
        		                [
        		                    'label' => '二级菜单示范1',
        		                    'icon' => 'circle-o',
        		                    'url' => '#'
        		                ],
        		                [
        		                    'label' => '二级菜单示范2',
        		                    'icon' => 'circle-o',
        		                    'url' => '#',
        		                    'items' => [
        		                        [
        		                            'label' => '三级菜单示范1',
        		                            'icon' => 'circle-o',
        		                            'url' => '#'
        		                        ],
        		                        [
        		                            'label' => '三级菜单示范2',
        		                            'icon' => 'circle-o',
        		                            'url' => '#'
        		                        ]
        		                    ]
        		                ]
        		            ]
        		        ]
        		    ]
    		    ],
		];
		if ($role_name != "超级管理员") {
			foreach ( $array as $k => $arr ) {
				if ($arr ['label'] == '生成MVC（Gii）' || $arr ['label'] == '调试') {
					unset ( $array [$k] );
				}
			}
		}
		?>
        <?=dmstr\widgets\Menu::widget ( [ 'options' => [ 'class' => 'sidebar-menu tree','data-widget' => 'tree' ],'items' => $array ] )?>

    </section>

</aside>