<?php

Route::get('/', function () {
    return view('front-end.master');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('career',[
    'uses' => 'FrontendController@career',
    'as' => 'career',
]);

Route::get('advertisement-single.java/{id}',[
    'uses' => 'FrontendController@advertisementSingle',
    'as' => 'advertisement-single',
]);
Route::get('apply-online.java/{id}/{post_name}',[
    'uses' => 'FrontendController@applyOnline',
    'as' => 'apply-online',
]);
Route::post('save-onlineApply.java',[
    'uses' => 'FrontendController@saveOnlineApply',
    'as' => 'save-onlineApply',
]);

Route::group(['middleware' => 'auth'], function(){

    Route::get('manage-advertisement',[
        'uses' => 'AdvertisementController@manageAdvertisement',
        'as'   => 'manage-advertisement'
    ]);
    Route::get('create-advertisement',[
        'uses' => 'AdvertisementController@createAdvertisement',
        'as'   => 'create-advertisement'
    ]);
    Route::post('save-advertisement-info',[
        'uses' => 'AdvertisementController@saveAdvertisement',
        'as'   => 'save-advertisement-info'
    ]);
    Route::get('single-advertisement/{id}',[
        'uses' => 'AdvertisementController@singleAdvertisement',
        'as'   => 'single-advertisement'
    ]);
    Route::get('unpublished-advertisement/{id}',[
        'uses' => 'AdvertisementController@unpublishedAdvertisement',
        'as'   => 'unpublished-advertisement'
    ]);
    Route::get('published-advertisement/{id}',[
        'uses' => 'AdvertisementController@publishedAdvertisement',
        'as'   => 'published-advertisement'
    ]);
    Route::get('edit-advertisement/{id}',[
        'uses' => 'AdvertisementController@editAdvertisement',
        'as'   => 'edit-advertisement'
    ]);

    Route::post('update-advertisements',[
        'uses' => 'AdvertisementController@updateAdvertisement',
        'as'   => 'update-advertisement'
    ]);
    Route::get('delete-advertisement/{id}',[
        'uses' => 'AdvertisementController@deleteAdvertisement',
        'as'   => 'delete-advertisement'
    ]);
    Route::get('applied-list',[
        'uses' => 'AdvertisementController@appliedList',
        'as'   => 'applied-list'
    ]);
    Route::post('save-shortList',[
        'uses' => 'AdvertisementController@saveShortList',
        'as'   => 'save-shortList'
    ]);
    Route::get('short-list',[
        'uses' => 'AdvertisementController@shortList',
        'as'   => 'short-list'
    ]);
    Route::post('save-writtenList',[
        'uses' => 'AdvertisementController@saveWrittenList',
        'as'   => 'save-writtenList'
    ]);
    Route::get('written-list',[
        'uses' => 'AdvertisementController@writtentList',
        'as'   => 'written-list'
    ]);
    Route::post('save-vivaList',[
        'uses' => 'AdvertisementController@saveVavaList',
        'as'   => 'save-vivaList'
    ]);
    Route::get('viva-list',[
        'uses' => 'AdvertisementController@vivaList',
        'as'   => 'viva-list'
    ]);
    Route::post('save-finalList',[
        'uses' => 'AdvertisementController@saveFinalList',
        'as'   => 'save-finalList'
    ]);
    Route::get('final-list',[
        'uses' => 'AdvertisementController@finalList',
        'as'   => 'final-list'
    ]);

});