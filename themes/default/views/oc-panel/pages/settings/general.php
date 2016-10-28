<?php defined('SYSPATH') or die('No direct script access.');?>

<?=Form::errors()?>

<ul class="list-inline pull-right">
    <li>
        <a class="btn btn-primary ajax-load" href="<?=Route::url('oc-panel',array('controller'=>'config'))?>" title="<?=__('All configurations')?>">
            <?=__('All configurations')?>
        </a>
    </li>
</ul>

<h1 id="page-general-configuration"" class="page-header page-title"><?=__('General Configuration')?></h1>

<hr>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <?=FORM::open(Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general')), array('class'=>'config', 'enctype'=>'multipart/form-data'))?>
            <div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left" id="tab-settings">
                        <li class="active">
                            <a data-toggle="tab" href="#tabSettingsGeneral" aria-expanded="true"><?=__('General')?></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tabSettingsRegional" aria-expanded="false"><?=__('Regional')?></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tabSettingsAdditionalFeatures" aria-expanded="false"><?=__('Additional Features')?></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tabSettingsComments" aria-expanded="false"><?=__('Comments')?></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tabSettingsRecaptcha" aria-expanded="false"><?=__('reCAPTCHA')?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tabSettingsGeneral" class="tab-pane active fade">
                            <h4><?=__('General Settings')?></h4>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['maintenance']['id'], __("Maintenance Mode"), array('class'=>'control-label', 'for'=>$forms['maintenance']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-to-activate-maintenance-mode/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['maintenance']['key'], 1, (bool) $forms['maintenance']['value'], array('id' => $forms['maintenance']['id'].'1'))?>
                                    <?=Form::label($forms['maintenance']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['maintenance']['key'], 0, ! (bool) $forms['maintenance']['value'], array('id' => $forms['maintenance']['id'].'0'))?>
                                    <?=Form::label($forms['maintenance']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Enables the site to maintenance")?>
                                </span>
                            </div>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['site_name']['id'], __('Site name'), array('class'=>'control-label', 'for'=>$forms['site_name']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/change-site-name-site-description/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::input($forms['site_name']['key'], $forms['site_name']['value'], array(
                                    'placeholder' => 'Open-classifieds', 
                                    'class' => 'form-control', 
                                    'id' => $forms['site_name']['id'],
                                    'data-rule-required'=>'true',
                                ))?> 
                                <span class="help-block">
                                    <?=__("Here you can declare your display name. This is seen by everyone!")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['site_description']['id'], __('Site description'), array('class'=>'control-label', 'for'=>$forms['site_description']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/change-site-name-site-description/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::textarea($forms['site_description']['key'], $forms['site_description']['value'], array(
                                    'placeholder' => __('Description of your site in no more than 160 characters.'),
                                    'rows' => 3, 'cols' => 50, 
                                    'class' => 'form-control', 
                                    'id' => $forms['site_description']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__('Description used for the <meta name="description"> of the home page. Might be used by Google as search result snippet. (max. 160 chars)')?>
                                </span>
                            </div>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['disallowbots']['id'], __("Disallows (blocks) Bots and Crawlers on this website"), array('class'=>'control-label', 'for'=>$forms['disallowbots']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/allowdisallow-bots-crawlers/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['disallowbots']['key'], 1, (bool) $forms['disallowbots']['value'], array('id' => $forms['disallowbots']['id'].'1'))?>
                                    <?=Form::label($forms['disallowbots']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['disallowbots']['key'], 0, ! (bool) $forms['disallowbots']['value'], array('id' => $forms['disallowbots']['id'].'0'))?>
                                    <?=Form::label($forms['disallowbots']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Disallows Bots and Crawlers on the website")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['private_site']['id'], __("Private Site"), array('class'=>'control-label', 'for'=>$forms['private_site']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/private-site/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['private_site']['key'], 1, (bool) $forms['private_site']['value'], array('id' => $forms['private_site']['id'].'1'))?>
                                    <?=Form::label($forms['private_site']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['private_site']['key'], 0, ! (bool) $forms['private_site']['value'], array('id' => $forms['private_site']['id'].'0'))?>
                                    <?=Form::label($forms['private_site']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Enables the site to private_site")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['google_authenticator']['id'], __("2 Step Authentication"), array('class'=>'control-label', 'for'=>$forms['google_authenticator']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/2-step-verification/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['google_authenticator']['key'], 1, (bool) $forms['google_authenticator']['value'], array('id' => $forms['google_authenticator']['id'].'1'))?>
                                    <?=Form::label($forms['google_authenticator']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['google_authenticator']['key'], 0, ! (bool) $forms['google_authenticator']['value'], array('id' => $forms['google_authenticator']['id'].'0'))?>
                                    <?=Form::label($forms['google_authenticator']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("2 step Google Authenticator")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['cookie_consent']['id'], __("Cookie consent"), array('class'=>'control-label', 'for'=>$forms['cookie_consent']['id']))?>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['cookie_consent']['key'], 1, (bool) $forms['cookie_consent']['value'], array('id' => $forms['cookie_consent']['id'].'1'))?>
                                    <?=Form::label($forms['cookie_consent']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['cookie_consent']['key'], 0, ! (bool) $forms['cookie_consent']['value'], array('id' => $forms['cookie_consent']['id'].'0'))?>
                                    <?=Form::label($forms['cookie_consent']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Enables an alert to accept cookies")?>
                                </span>
                            </div>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['moderation']['id'], __('Moderation'), array('class'=>'control-label', 'for'=>$forms['moderation']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-ads-moderation-works/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::select($forms['moderation']['key'], array(0=>__("Post directly"),1=>__("Moderation on"),2=>__("Payment on"),3=>__("Email confirmation on"),4=>__("Email confirmation with Moderation"),5=>__("Payment with Moderation")), $forms['moderation']['value'], array(
                                    'placeholder' => $forms['moderation']['value'], 
                                    'class' => 'form-control', 
                                    'id' => $forms['moderation']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("Moderation is how you control newly created advertisements. You can set it up to fulfill your needs. For example, 'Post directly' will enable new ads to be posted directly, and get published as soon they submit.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['landing_page']['id'], __('Landing page'), array('class'=>'control-label', 'for'=>$forms['landing_page']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/home-or-listing/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::select($forms['landing_page']['key'], 
                                        array('{"controller":"home","action":"index"}'=>'HOME','{"controller":"ad","action":"listing"}'=>'LISTING','{"controller":"user","action":"index"}'=>'USERS'), $forms['landing_page']['value'], array(
                                    'class' => 'form-control', 
                                    'id' => $forms['landing_page']['id'], 
                                ))?> 
                                <span class="help-block">
                                    <?=__("It changes landing page of website")?>
                                </span>
                            </div>

                            <?$pages = array(''=>__('Deactivated'))?>
                            <?foreach (Model_Content::get_pages() as $key => $value) {
                                $pages[$value->seotitle] = $value->title;
                            }?>
                            <div class="form-group">
                                <?= FORM::label($forms['alert_terms']['id'], __('Accept Terms Alert'), array('class'=>'control-label', 'for'=>$forms['alert_terms']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/activate-access-terms-alert/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::select($forms['alert_terms']['key'], $pages, $forms['alert_terms']['value'], array( 
                                    'class' => 'form-control', 
                                    'id' => $forms['alert_terms']['id'], 
                                ))?> 
                                <span class="help-block">
                                    <?=__("If you choose to use alert terms, you can select page you want to render. And to edit content, select link 'Content' on your admin panel sidebar. Find page named <name_you_specified> click 'Edit'. In section 'Description' add content that suits you.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['private_site_page']['id'], __('Private Site landing page content'), array('class'=>'control-label', 'for'=>$forms['private_site_page']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/private-site/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::select($forms['private_site_page']['key'], $pages, $forms['private_site_page']['value'], array( 
                                    'class' => 'tips form-control', 
                                    'id' => $forms['private_site_page']['id'],
                                ))?>
                                <span class="help-block">
                                    <?=__("Adds content to private site landing page")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['contact_page']['id'], __('Contact page content'), array('class'=>'control-label', 'for'=>$forms['contact_page']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-to-add-text-contact-page/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::select($forms['contact_page']['key'], $pages, $forms['contact_page']['value'], array( 
                                    'class' => 'form-control', 
                                    'id' => $forms['contact_page']['id'], 
                                ))?> 
                                <span class="help-block">
                                    <?=__("Adds content to contact page")?>
                                </span>
                            </div>

                            <hr>

                            <div class="form-group">
                                <?=FORM::label($forms['email_domains']['key'], __('Allowed email domains'), array('class'=>'control-label', 'for'=>$forms['email_domains']['key']))?>
                                <?=FORM::input($forms['email_domains']['key'], $forms['email_domains']['value'], array(
                                    'placeholder' => __('For email domain push enter.'), 
                                    'class' => 'form-control', 
                                    'id' => $forms['email_domains']['key'], 
                                    'data-role'=>'tagsinput',
                                ))?> 
                                <span class="help-block">
                                    <?=__("You need to write your email domains to enable the service.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?= FORM::label($forms['api_key']['id'], __('API Key'), array('class'=>'control-label', 'for'=>$forms['api_key']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/api-documentation/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::input($forms['api_key']['key'], $forms['api_key']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['api_key']['id'],
                                ))?>
                                <span class="help-block">
                                    <?=__("Integrate anything using your site API Key.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['analytics']['id'], __('Analytics Tracking ID'), array('class'=>'control-label', 'for'=>$forms['analytics']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-to-add-tracking-codes/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['analytics']['key'], $forms['analytics']['value'], array(
                                    'placeholder' => 'UA-XXXXX-YY', 
                                    'class' => 'form-control', 
                                    'id' => $forms['analytics']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("Once logged in your Google Analytics, you can find the Tracking ID in the Accounts List or in the Property Settings")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['akismet_key']['id'], __('Akismet Key'), array('class'=>'control-label', 'for'=>$forms['akismet_key']['id']))?>
                                <a target="_blank" href="https://akismet.com/">
                                    <i class="fa fa-external-link-square"></i>
                                </a>
                                <?=FORM::input($forms['akismet_key']['key'], $forms['akismet_key']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['akismet_key']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("Providing akismet key will activate this feature. This feature deals with spam posts and emails.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['gcm_apikey']['id'], __('GCM API Key'), array('class'=>'control-label', 'for'=>$forms['gcm_apikey']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/native-apps/#push-notifications">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['gcm_apikey']['key'], $forms['gcm_apikey']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['gcm_apikey']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("Push notifications for your native app. Using Google Cloud Messaging, insert your API Key here.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['html_head']['id'], __('HTML in HEAD element'), array('class'=>'control-label', 'for'=>$forms['html_head']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/html-in-head-element/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::textarea($forms['html_head']['key'], $forms['html_head']['value'], array(
                                    'placeholder' => '',
                                    'rows' => 3, 'cols' => 50, 
                                    'class' => 'form-control', 
                                    'id' => $forms['html_head']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("To include your custom HTML code (validation metadata, reference to JS/CSS files, etc.) in the HEAD element of the rendered page.")?>
                                </span>
                            </div>

                            <div class="form-group">
                                <?=FORM::label($forms['html_footer']['id'], __('HTML in footer'), array('class'=>'control-label', 'for'=>$forms['html_footer']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/html-in-footer/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::textarea($forms['html_footer']['key'], $forms['html_footer']['value'], array(
                                    'placeholder' => '',
                                    'rows' => 3, 'cols' => 50, 
                                    'class' => 'form-control', 
                                    'id' => $forms['html_footer']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("To include your custom HTML code (reference to JS or CSS files, etc.) in the footer of the rendered page.")?>
                                </span>
                            </div>
                            <hr>
                            <p>
                                <?=FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
                            </p>
                        </div>
                        <div id="tabSettingsRegional" class="tab-pane fade">
                            <h4><?=__('Regional Settings')?></h4>

                            <hr>

                            <div class="form-group">
                                <?=FORM::label($forms['number_format']['id'], __('Money format'), array('class'=>'control-label','for'=>$forms['number_format']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-to-currency-format/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['number_format']['key'], $forms['number_format']['value'], array(
                                    'placeholder' => "20", 
                                    'class' => 'form-control', 
                                    'id' => $forms['number_format']['id']
                                ))?> 
                                <span class="help-block">
                                    <?=__("Number format is how you want to display numbers related to advertisements. More specific advertisement price. Every country have a specific way of dealing with decimal digits.")?>
                                </span>
                            </div>
                            <div class="form-group">
                                <?=FORM::label($forms['date_format']['id'], __('Date format'), array('class'=>'control-label', 'for'=>$forms['date_format']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/change-date-format/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['date_format']['key'], $forms['date_format']['value'], array(
                                    'placeholder' => "d/m/Y", 
                                    'class' => 'form-control', 
                                    'id' => $forms['date_format']['id'], 
                                ))?> 
                                <span class="help-block">
                                    <?=__("Each advertisement has a publish date. By selecting format, you can change how it is shown on your website.")?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?=__("Time Zone")?>:</label>  
                                <a target="_blank" href="https://docs.yclas.com/how-to-change-time-zone/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?= FORM::select($forms['timezone']['key'], Date::get_timezones(), core::request('TIMEZONE',date_default_timezone_get()), array(
                                        'placeholder' => "Madrid [+1:00]", 
                                        'class' => 'tips form-control', 
                                        'id' => $forms['timezone']['id'], 
                                ))?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?=__("Measurement Units")?>:</label>
                                <?=FORM::select($forms['measurement']['key'], array('metric' => __("Metric"), 'imperial' => __("Imperial")), $forms['measurement']['value'], array(
                                        'placeholder' => $forms['measurement']['value'], 
                                        'class' => 'form-control', 
                                        'id' => $forms['measurement']['id'],
                                ))?>
                                <span class="help-block">
                                    <?=__("Measurement units used by the system.")?>
                                </span>
                            </div>
                            <hr>
                            <p>
                                <?=FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
                            </p>
                        </div>
                        <div id="tabSettingsAdditionalFeatures" class="tab-pane fade">
                            <h4><?=__("Enable Additional Features")?></h4>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['search_by_description']['id'], __("Include search by description"), array('class'=>'control-label', 'for'=>$forms['search_by_description']['id']))?>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['search_by_description']['key'], 1, (bool) $forms['search_by_description']['value'], array('id' => $forms['search_by_description']['id'].'1'))?>
                                    <?=Form::label($forms['search_by_description']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['search_by_description']['key'], 0, ! (bool) $forms['search_by_description']['value'], array('id' => $forms['search_by_description']['id'].'0'))?>
                                    <?=Form::label($forms['search_by_description']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Once set to TRUE, enables search to look for key words in description")?>
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <?= FORM::label($forms['search_multi_catloc']['id'], __("Multi select category and location search"), array('class'=>'control-label', 'for'=>$forms['search_multi_catloc']['id']))?>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['search_multi_catloc']['key'], 1, (bool) $forms['search_multi_catloc']['value'], array('id' => $forms['search_multi_catloc']['id'].'1'))?>
                                    <?=Form::label($forms['search_multi_catloc']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['search_multi_catloc']['key'], 0, ! (bool) $forms['search_multi_catloc']['value'], array('id' => $forms['search_multi_catloc']['id'].'0'))?>
                                    <?=Form::label($forms['search_multi_catloc']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("Once set to TRUE, enables multi select category and location search")?>
                                </span>
                            </div>
                            <hr>
                            <p>
                                <?=FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
                            </p>
                        </div>
                        <div id="tabSettingsComments" class="tab-pane fade">
                            <h4><?=__("Comments Configuration")?></h4>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['blog_disqus']['id'], __('Disqus for blog'), array('class'=>'control-label', 'for'=>$forms['blog_disqus']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/how-to-create-a-blog/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['blog_disqus']['key'], $forms['blog_disqus']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'tips form-control', 
                                    'id' => $forms['blog_disqus']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("You need to write your disqus ID to enable the service.")?>
                                </span>
                            </div>
                            <div class="form-group">
                                <?=FORM::label($forms['faq_disqus']['id'], __('Disqus for FAQ'), array('class'=>'control-label', 'for'=>$forms['faq_disqus']['id']))?>
                                <a target="_blank" href="https://docs.yclas.com/create-frequent-asked-questions-faq/">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['faq_disqus']['key'], $forms['faq_disqus']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['faq_disqus']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("You need to write your disqus ID to enable the service.")?>
                                </span>
                            </div>
                            <hr>
                            <p>
                                <?=FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
                            </p>
                        </div>
                        <div id="tabSettingsRecaptcha" class="tab-pane fade">
                            <h4><?=__("reCAPTCHA Configuration")?></h4>

                            <hr>

                            <div class="form-group">
                                <?= FORM::label($forms['recaptcha_active']['id'], __("Enable reCAPTCHA as captcha provider"), array('class'=>'control-label', 'for'=>$forms['recaptcha_active']['id']))?>
                                <a target="_blank" href="https://www.google.com/recaptcha/intro/index.html">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <div class="radio radio-primary">
                                    <?=Form::radio($forms['recaptcha_active']['key'], 1, (bool) $forms['recaptcha_active']['value'], array('id' => $forms['recaptcha_active']['id'].'1'))?>
                                    <?=Form::label($forms['recaptcha_active']['id'].'1', __('Enabled'))?>
                                    <?=Form::radio($forms['recaptcha_active']['key'], 0, ! (bool) $forms['recaptcha_active']['value'], array('id' => $forms['recaptcha_active']['id'].'0'))?>
                                    <?=Form::label($forms['recaptcha_active']['id'].'0', __('Disabled'))?>
                                </div>
                                <span class="help-block">
                                    <?=__("If advertisement is marked as spam, user is also marked. Can not publish new ads or register until removed from Black List! Also will not allow users from disposable email addresses to register.")?>
                                </span>
                            </div>
                            <div class="form-group">
                                <?=FORM::label($forms['recaptcha_sitekey']['id'], __('reCAPTCHA Site Key'), array('class'=>'control-label', 'for'=>$forms['recaptcha_sitekey']['id']))?>
                                <a target="_blank" href="https://www.google.com/recaptcha/admin#list">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['recaptcha_sitekey']['key'], $forms['recaptcha_sitekey']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['recaptcha_sitekey']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("You need to write reCAPTCHA Site Key to enable the service.")?>
                                </span>
                            </div>
                            <div class="form-group">
                                <?=FORM::label($forms['recaptcha_secretkey']['id'], __('reCAPTCHA Secret Key'), array('class'=>'control-label', 'for'=>$forms['recaptcha_secretkey']['id']))?>
                                <a target="_blank" href="https://www.google.com/recaptcha/admin#list">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                <?=FORM::input($forms['recaptcha_secretkey']['key'], $forms['recaptcha_secretkey']['value'], array(
                                    'placeholder' => "", 
                                    'class' => 'form-control', 
                                    'id' => $forms['recaptcha_secretkey']['id'],
                                ))?> 
                                <span class="help-block">
                                    <?=__("You need to write your reCAPTCHA Secret Key to enable the service.")?>
                                </span>
                            </div>
                            <hr>
                            <p>
                                <?=FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
