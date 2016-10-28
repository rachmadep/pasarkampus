<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="page-header">
    <h1><?=_e('Orders')?></h1>
</div>

<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?=_e('Status') ?></th>
                    <th><?=_e('Product') ?></th>
                    <th><?=_e('Amount') ?></th>
                    <th><?=_e('Ad') ?></th>
                    <th><?=_e('Date') ?></th>
                    <th><?=_e('Date Paid') ?></th>
                </tr>
            </thead>
            <tbody>
                <?foreach($orders as $order):?>
                    <tr id="tr<?=$order->pk()?>">
    
                        <td><?=$order->pk()?></td>
    
                        <td>
                            <?if ($order->status == Model_Order::STATUS_CREATED):?>
                            <a class="btn btn-warning" href="<?=Route::url('default', array('controller'=> 'ad','action'=>'checkout' , 'id' => $order->id_order))?>">
                            <i class="glyphicon glyphicon-shopping-cart"></i> <?=_e('Pay')?>   
                            </a>
                            <?else:?>
                                <?=Model_Order::$statuses[$order->status]?>
                            <?endif?>
                        </td>
    
                        <td><?=Model_Order::product_desc($order->id_product)?></td>
    
                        <td><?=i18n::format_currency($order->amount, $order->currency)?></td>
    
                        <td><a href="<?=Route::url('ad', array('category'=> $order->ad->category->seoname,'seotitle'=>$order->ad->seotitle)) ?>" title="<?=HTML::chars($order->ad->title)?>">
                            <?=Text::limit_chars($order->ad->title, 30, NULL, TRUE)?></a></td>
    
                        <td><?=$order->created?></td>
    
                        <td><?=$order->pay_date?></td>
    
                    </tr>
                <?endforeach?>
            </tbody>
        </table>
    </div>
</div>
<div class="text-center"><?=$pagination?></div>