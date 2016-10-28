<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="pad_10tb">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="checkout_bill">
					<h1><?=_e('Checkout')?></h1>
					<p class="text-right"><em><?=_e('Date')?>: <?= Date::format($order->created, core::config('general.date_format'))?></em></p>	
					<div class="">
						<table class="table table-hover">
							<thead>
								<tr>
									<th><?=_e('Product')?></th>
									<th class="text-center"><?=_e('Price')?></th>
								</tr>
							</thead>
							<tbody>
								<?if($order->id_product == Model_Order::PRODUCT_AD_SELL AND isset($order->ad->cf_shipping) AND Valid::numeric($order->ad->cf_shipping) AND $order->ad->cf_shipping > 0):?>
									<tr>
										<td class="col-md-9"><?=$order->description?> <em>(<?=Model_Order::product_desc($order->id_product)?>)</em></td>
										<td class="col-md-3 text-center"><?=i18n::format_currency($order->amount - $order->ad->cf_shipping, $order->currency)?></td>
									</tr>
									<tr>
										<td class="col-md-9"><?=_e('Shipping')?></td>
										<td class="col-md-3 text-center"><?=i18n::format_currency($order->ad->cf_shipping, $order->currency)?></td>
									</tr>
								<?else:?>
									<tr>
										<td class="col-md-9">
											<b><?=Model_Order::product_desc($order->id_product)?> 
											<?if ($order->id_product == Model_Order::PRODUCT_TO_FEATURED):?>
												<?=$order->featured_days?> <?=_e('Days')?>
											<?endif?>
											</b>
										</td>
										<td class="col-md-3 text-center">
											<div class="dropdown inline-block">
												<?if ($order->id_product == Model_Order::PRODUCT_TO_FEATURED AND is_array($featured_plans=Model_Order::get_featured_plans()) AND count($featured_plans) > 1):?>
													<button class="btn btn-xs btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
														<?=_e('Change plan')?> 
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<?foreach ($featured_plans as $days => $price):?>
															<?if ($order->featured_days != $days):?>
																<li>
																	<a href="<?=Route::url('default',array('controller'=>'ad', 'action'=>'checkout','id'=>$order->id_order))?>?featured_days=<?=$days?>">
																		<small><?=$days?> <?=_e('Days')?> - <?=core::config('payment.paypal_currency')?> <?=$price?></small>
																	</a>
																</li>
															<?endif?>
														<?endforeach?>
													</ul>
												<?endif?>
											</div>
										</td>
									</tr>
								<?endif?>
								<tr>
									<td class="col-md-9">
										<em><?=$order->ad->title?></em>
									</td>
									<td class="col-md-3 text-center"><?=i18n::format_currency(($order->coupon->loaded())?$order->original_price():$order->amount, $order->currency)?></td>
								</tr>
								<tr>
									<td class="text-right"><h4><strong><?=_e('Total')?>: </strong></h4></td>
									<td class="text-center text-danger"><h4><strong><?=i18n::format_currency($order->amount, $order->currency)?></strong></h4></td>
								</tr>
							</tbody>
						</table>

						<?if ($order->amount>0):?>

						<?if (Core::config('payment.paypal_account')!=''):?>
							<p class="text-right">
								<a class="btn btn-success" href="<?=Route::url('default', array('controller'=> 'paypal','action'=>'pay' , 'id' => $order->id_order))?>">
									<?=_e('Pay with Paypal')?> <span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</p>
						<?endif?>
					   
						<?if ($order->id_product!=Model_Order::PRODUCT_AD_SELL):?>
							<?if ( ($user = Auth::instance()->get_user())!=FALSE AND ($user->id_role == Model_Role::ROLE_ADMIN OR $user->id_role == Model_Role::ROLE_MODERATOR)):?>
								<ul class="list-inline text-right">
									<li>
										<a title="<?=__('Mark as paid')?>" class="btn btn-warning" href="<?=Route::url('oc-panel', array('controller'=> 'order', 'action'=>'pay','id'=>$order->id_order))?>">
											<i class="glyphicon glyphicon-usd"></i> <?=_e('Mark as paid')?>
										</a>
									</li>
								</ul>
							<?endif?>
							<?if ( ($alt = $order->alternative_pay_button()) != '') :?>
								<div class="text-right">
									<ul class="list-inline">
										<li class="text-left"><?=$alt?></li>
									</ul>
								</div>
							<?endif?>
							
						<?endif?>

						<?else:?>
							<ul class="list-inline text-right">
								<li>
									<a title="<?=__('Click to proceed')?>" class="btn btn-success" href="<?=Route::url('default', array('controller'=> 'ad', 'action'=>'checkoutfree','id'=>$order->id_order))?>">
										<?=_e('Click to proceed')?>
									</a>
								</li>
							</ul>
						<?endif?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?if (core::config('payment.fraudlabspro')!=''): ?>
<script>
    (function(){
        function s() {
            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.async = true;
            e.src = ('https:' === document.location.protocol ? 'https://' : 'http://') + 'cdn.fraudlabspro.com/s.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(e, s);
        }             
        (window.attachEvent) ? window.attachEvent('onload', s) : window.addEventListener('load', s, false);
    })();
</script>
<?endif?>