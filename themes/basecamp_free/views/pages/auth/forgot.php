<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="pad_10tb">
	<div class="container">
		<div class="row">
			<div class="<?=(Theme::get('sidebar_position')!='none')?'col-xs-12':'col-xs-12'?> <?=(Theme::get('sidebar_position')=='left')?'pull-right':'pull-left'?>">
				<div class="page-header">
					<h3><?=_e('Remember password')?></h3>
				</div>
				<div class="auth-page forgot-pass">
					<?=View::factory('pages/auth/forgot-form')?>
				</div>	
			</div>
		
			<?=View::fragment('sidebar_front','sidebar')?>
	    </div>
	</div>
</div>