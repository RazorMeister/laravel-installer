<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       routes.php
 */

Route::group([
    'middleware' => ['web', 'checkIfInstalled'],
    'prefix' => 'install',
    'as' => 'installer.',
    'namespace' => 'RazorMeister\Installer\Controllers'
], function() {
    // Redirect from /install to /install/start
    Route::redirect('/', 'install/start');

    // Start page
    Route::get('start', 'InstallerController@start')->name('start');

    // Check required packages
    Route::get('packages', 'InstallerController@packages')->name('packages');

    // Check required permissions
    Route::get('permissions', 'InstallerController@permissions')->name('permissions')->middleware('checkPackages');

    // Save main app settings to .env file
    Route::get('mainSettings', 'InstallerController@mainSettings')->name('mainSettings')->middleware(['checkPackages', 'checkPermissions']);
    Route::post('mainSettings', 'InstallerController@mainSettingsSave')->name('mainSettings')->middleware(['checkPackages', 'checkPermissions']);

    // Set Up Db
    Route::post('setUpDb', 'InstallerController@setUpDb')->name('setUpDb')->middleware(['checkPackages', 'checkPermissions', 'checkSettings']);

    // Create new user
    Route::get('account', 'InstallerController@account')->name('account')->middleware(['checkPackages', 'checkPermissions', 'checkSettings']);
    Route::post('account', 'InstallerController@accountSave')->name('account')->middleware(['checkPackages', 'checkPermissions', 'checkSettings']);

    // Finish page
    Route::get('finish', 'InstallerController@finish')->name('finish')->middleware(['checkPackages', 'checkPermissions', 'checkSettings', 'checkAccount']);
    Route::post('finish', 'InstallerController@finishSave')->name('finish')->middleware(['checkPackages', 'checkPermissions', 'checkSettings', 'checkAccount']);
});
