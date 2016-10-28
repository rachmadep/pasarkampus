<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Cron for advertisements
 *
 * @author      Chema <chema@open-classifieds.com>
 * @package     Cron
 * @copyright   (c) 2009-2014 Open Classifieds Team
 * @license     GPL v3
 * 
 */
class Cron_Subscription {

    /**
     * expired featured ads
     * @return void
     */
    public static function renew()
    {
        if (Core::config('general.subscriptions')==TRUE)
        {
            //get expired subscription that are active
            $subscriptions = new Model_Subscription();
            $subscriptions = $subscriptions
                                        ->where('status','=',1)
                                        ->where('expire_date','<=',Date::unix2mysql())
                                        ->order_by('created','desc')
                                        ->find_all();
            foreach ($subscriptions as $s) 
            {   
                //disable the plan
                $s->status = 0;
                try
                {
                    $s->save();
                }
                catch (Exception $e)
                {
                    throw HTTP_Exception::factory(500,$e->getMessage());
                }

                $plan = $s->plan;

                if($plan->loaded() AND $plan->status==1)
                {
                    //generate a new order
                    $order = Model_Order::new_order(NULL, $s->user, $plan->id_plan, $plan->price, core::config('payment.paypal_currency'), __('Subscription to ').$plan->name);

                    //free plan no checkout
                    if ($plan->price==0)
                    {
                        $order->confirm_payment('cash');
                    }
                    else
                    {
                        $checkout_url = $s->user->ql('default',array('controller'=>'plan','action'=>'checkout','id'=>$order->id_order));

                        $s->user->email('plan-expired', array(  '[PLAN.NAME]'      => $plan->name,
                                                                '[URL.CHECKOUT]'   => $checkout_url));
                    }

                }//if plan loaded

            }//end foreach
            
        }//if subscription active

    }//function

}