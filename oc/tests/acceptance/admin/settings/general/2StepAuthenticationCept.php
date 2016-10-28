<?php 
$I = new AcceptanceTester($scenario);
$I->am('the administrator');
$I->wantTo('enable 2step authentication and see that it works');

$I->amOnPage('/oc-panel/auth/login');
$I->fillField('email','admin@reoc.lo');
$I->fillField('password','1234');
$I->click('auth_redirect');
$I->amOnPage('/oc-panel/');
$I->see('welcome admin');

// Enable google_authenticator
$I->wantTo('enable google_authenticator');
$I->amOnPage('/oc-panel/Config/update/google_authenticator');
$I->fillField('#formorm_config_value','1');
$I->click('formorm[submit]');
$I->see('Item updated. Please to see the changes delete the cache');

// Check 2 step authentication on profile edit
$I->wantTo('check 2 step authentication on profile edit');
$I->amOnPage('/oc-panel/profile/edit');
$I->see('2 Step Authentication','h3');
$I->seeElement('.btn.btn-primary');
$I->seeElement('.fa.fa-android');
$I->seeElement('.fa.fa-apple');

// Enable 2 step authentication and see the code
$I->click('a[href="http://reoc.lo/oc-panel/profile/2step/enable"]');
$I->see('2 Step Authentication Enabled');
$I->seeElement('.alert.alert-success');
$I->see('Google Authenticator Code');
$I->seeElement('.btn.btn-warning');

// Disable 2 step authentication and see the code 
$I->click('a[href="http://reoc.lo/oc-panel/profile/2step/disable"]');
$I->seeElement('.alert.alert-info');
$I->see('2 Step Authentication Disabled');
$I->dontSee('Google Authenticator Code');

// Disable google_authenticator
$I->wantTo('disable google_authenticator');
$I->amOnPage('/oc-panel/Config/update/google_authenticator');
$I->fillField('#formorm_config_value','0');
$I->click('formorm[submit]');
$I->see('Item updated. Please to see the changes delete the cache');

$I->amOnPage('/oc-panel/profile/edit');
$I->dontSee('2 Step Authentication','h3');
$I->dontSeeElement('.fa.fa-android');
$I->dontSeeElement('.fa.fa-apple');
