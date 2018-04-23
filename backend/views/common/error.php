<?php
use yii\bootstrap\Alert;
?>
<div class="error-page">
	<h2 class="headline text-info">
		<p></p>
		<p></p>
		<br /> <i class="fa fa-warning text-yellow"></i>
	</h2>
	<div class="error-content">
		<p>
			<br />
		</p>
		<p>
			<br />
		</p>
		<br /> <br /> <br /> <br /> <br />
		<form class='search-form'>
			<div class='input-group'>
				<?php
				Alert::begin ( [ 
						'options' => [ 
								'class' => 'alert-warning' 
						] 
				] );
				echo '对不起，您现在还没有或的此操作的权限，如有问题请联系超级管理员！';
				Alert::end ();
				
				?>
				</div>
		</form>
	</div>
</div>
