<?php defined('SYSPATH') or die('No direct script access.');?>

<footer>
	<div class="container">
		<div class="row footer-widgets">
			<?$i=0; foreach ( Widgets::render('footer') as $widget):?>
				<div class="col-md-3">
					<?=$widget?>
				</div>
				<? $i++; if ($i%4 == 0) echo '<div class="clearfix"></div>';?>
			<?endforeach?>
		</div>
		
		<div class="main-footer-content">			
			<!-- IMPORTANT! This is the license for the Open Classifieds software, do not remove!-->
				<p class="ocLicence text-center">&copy;
				<?if (Theme::get('premium')!=1):?>
					Web Powered by <a href="http://open-classifieds.com?utm_source=<?=URL::base()?>&utm_medium=oc_footer&utm_campaign=<?=date('Y-m-d')?>" title="Best PHP Script Classifieds Software">Open Classifieds</a> 
					2009 - <?=date('Y')?>
				<?else:?>
					<?=core::config('general.site_name')?> <?=date('Y')?>
				<?endif?>
				</p>
			<!-- IMPORTANT! This is the license for the Open Classifieds software, do not remove!-->	
           
			<?if(Cookie::get('user_location')):?>
				<p class="text-center">
					<a href="<?=Route::url('default')?>?user_location=0"><span class="glyphicon glyphicon-globe"></span> <?=_e('Change Location')?></a>
				</p>
			<?endif?>
		</div>
	</div>
</footer>