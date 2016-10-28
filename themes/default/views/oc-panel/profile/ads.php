<?php defined('SYSPATH') or die('No direct script access.');?>
<?=Alert::show()?>
<div id="page-my-dvertisements" class="page-header">
    <h1><?=_e('My Advertisements')?></h1>
</div>

<div class="panel panel-default">
    <table class="table table-bordered">
        <tr>
           <th><?=_e('Name')?></th>
            <th><?=_e('Category')?></th>
            <th><?=_e('Location')?></th>
            <th><?=_e('Status')?></th>
            <th><?=_e('Date')?></th>
            <?if( core::config('payment.to_featured')):?>
            <th><?=_e('Featured')?></th>
            <?endif?>
            <th></th>
        </tr>
        <? $i = 0; foreach($ads as $ad):?>
        <tbody>
            <tr>
    
                <? foreach($category as $cat){ if ($cat->id_category == $ad->id_category) $cat_name = $cat->seoname; }?>
                <td><a href="<?=Route::url('ad', array('controller'=>'ad','category'=>$cat_name,'seotitle'=>$ad->seotitle))?>"><?= $ad->title; ?></a>
                </td>
    
                <? foreach($category as $cat):?>
                    <? if ($cat->id_category == $ad->id_category): ?>
                        <td><?= $cat->name ?>
                    <?endif?>
                <?endforeach?>
    
                <?$locat_name = NULL;?>
                <?foreach($location as $loc):?>
                    <? if ($loc->id_location == $ad->id_location): 
                        $locat_name=$loc->name;?>
                        <td><?=$locat_name?></td>
                    <?endif?>
                <?endforeach?>
                <?if($locat_name == NULL):?>
                    <td>n/a</td>
                <?endif?>
    
    
                <td>
                <?if($ad->status == Model_Ad::STATUS_NOPUBLISHED):?>
                    <?=_e('Not published')?>
                <? elseif($ad->status == Model_Ad::STATUS_PUBLISHED):?>
                    <?=_e('Published')?>
                <? elseif($ad->status == Model_Ad::STATUS_SPAM):?>
                    <?=_e('Spam')?>
                <? elseif($ad->status == Model_Ad::STATUS_UNAVAILABLE):?>
                    <?=_e('Unavailable')?>
                <? elseif($ad->status == Model_Ad::STATUS_UNCONFIRMED):?>
                    <?=_e('Unconfirmed')?>
                <?endif?>
    
                <?if( ($order = $ad->get_order())!==FALSE ):?>
                    <?if ($order->status==Model_Order::STATUS_CREATED AND $ad->status != Model_Ad::STATUS_PUBLISHED):?>
                        <a class="btn btn-warning" href="<?=Route::url('default', array('controller'=> 'ad','action'=>'checkout' , 'id' => $order->id_order))?>">
                            <i class="glyphicon glyphicon-shopping-cart"></i> <?=_e('Pay')?>  <?=i18n::format_currency($order->amount,$order->currency)?> 
                        </a>
                    <?elseif ($order->status==Model_Order::STATUS_PAID):?>
                        (<?=_e('Paid')?>)
                    <?endif?>
                <?endif?>
    
                </td>
    
                <td><?= Date::format($ad->published, core::config('general.date_format'))?></td>
    
                <?if( core::config('payment.to_featured')):?>
                <td>
                    <?if($ad->featured == NULL):?>
                        <a class="btn btn-default" 
                            href="<?=Route::url('default', array('controller'=>'ad','action'=>'to_featured','id'=>$ad->id_ad))?>" 
                            onclick="return confirm('<?=__('Make featured?')?>');"
                            rel="tooltip" title="<?=__('Featured')?>" data-id="tr1" data-text="<?=__('Are you sure you want to make it featured?')?>">
                            <i class="glyphicon glyphicon-bookmark "></i> <?=_e('Featured')?>
                        </a>
                    <?else:?>
                        <?= Date::format($ad->featured, core::config('general.date_format'))?>
                    <?endif?>
                </td>
                <?endif?>
    
                <td>
                    <?if(core::config('advertisement.count_visits')):?>
                        <a class="btn btn-primary" 
                            href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'stats','id'=>$ad->id_ad))?>" 
                            rel="tooltip" title="<?=__('Stats')?>">
                            <i class="glyphicon glyphicon-align-left"></i>
                        </a>
                    <?endif?>
                    <a class="btn btn-primary" 
                        href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'update','id'=>$ad->id_ad))?>" 
                        rel="tooltip" title="<?=__('Update')?>">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <?if($ad->status != Model_Ad::STATUS_UNAVAILABLE AND $ad->status != Model_Ad::STATUS_UNCONFIRMED):?>
                        <a
                            href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'sold','id'=>$ad->id_ad))?>" 
                            class="btn btn-warning" 
                            title="<?=__('Mark as Sold?')?>" 
                            data-toggle="confirmation" 
                            data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                            data-btnCancelLabel="<?=__('No way!')?>">
                            <i class="glyphicon glyphicon-usd"></i>
                        </a>
                    <?endif?>
                    <? if( $ad->status == Model_Ad::STATUS_UNAVAILABLE 
                                AND !in_array(core::config('general.moderation'), Model_Ad::$moderation_status)  
                        ):?>
                        <?if ( ($order = $ad->get_order()) === FALSE OR ($order !== FALSE AND $order->status == Model_Order::STATUS_PAID) ):?>
                            <a
                                href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'activate','id'=>$ad->id_ad))?>" 
                                class="btn btn-success" 
                                title="<?=__('Activate?')?>" 
                                data-toggle="confirmation" 
                                data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                                data-btnCancelLabel="<?=__('No way!')?>">
                                <i class="glyphicon glyphicon-ok"></i>
                            </a>
                        <?endif?>
                    <?elseif($ad->status != Model_Ad::STATUS_UNAVAILABLE AND $ad->status != Model_Ad::STATUS_UNCONFIRMED):?>
                        <a
                            href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'deactivate','id'=>$ad->id_ad))?>" 
                            class="btn btn-warning" 
                            title="<?=__('Deactivate?')?>" 
                            data-toggle="confirmation" 
                            data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                            data-btnCancelLabel="<?=__('No way!')?>">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    <?endif?>
                    <?if( core::config('payment.to_top') ):?>
                        <a
                            href="<?=Route::url('default', array('controller'=>'ad','action'=>'to_top','id'=>$ad->id_ad))?>" 
                            class="btn btn-info" 
                            title="<?=__('Refresh listing, go to top?')?>" 
                            data-toggle="confirmation" 
                            data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                            data-btnCancelLabel="<?=__('No way!')?>">
                            <i class="glyphicon glyphicon-circle-arrow-up"></i>
                        </a>
                    <?endif?>
                </td>
            </tr>
        <?endforeach?>
        </tbody>
    </table>
</div>
<div class="text-center"><?=$pagination?></div>