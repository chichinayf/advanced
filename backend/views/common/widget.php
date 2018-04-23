<?php
use yii\bootstrap\Progress;
use yii\bootstrap\Alert;
?>
<div id="loading">
	<?php
	echo Progress::widget ( [
			'percent' => 100,
			'label' => '正在识别中，请等待...',
			'barOptions' => [
					'class' => 'progress-bar-success'
			],
			'options' => [
					'class' => 'active progress-striped'
			]
	] );
	?>
</div>
<div id="success" hidden="hidden">
	<?php
	echo Progress::widget ( [ 
			'percent' => 100,
			'label' => '恭喜您，识别完成',
			'barOptions' => [ 
					'class' => 'progress-bar-success' 
			] 
	] );
	?>
</div>
<div id="faild" hidden="hidden">
	<?php
	echo Progress::widget ( [ 
			'percent' => 100,
			'label' => '识别失败，请确认文件有效，如果确认有效，请尝试语音识别2',
			'barOptions' => [ 
					'class' => 'progress-bar-danger' 
			] 
	] );
	?>
</div>
<div id="alert" hidden="hidden">
	<?php
		Alert::begin ( [ 
				'options' => [ 
						'class' => 'alert-success' 
				] 
		] );
		echo '恭喜您，识别结果如下：';
		Alert::end ();
	?>
</div>