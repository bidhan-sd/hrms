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

    Route::get('create-department',[
        'uses' => 'DepartmentController@createDepartment',
        'as'   => 'create-department'
    ]);
    Route::post('save-department-info',[
        'uses' => 'DepartmentController@saveDepartment',
        'as'   => 'save-department-info'
    ]);
    Route::get('manage-department',[
        'uses' => 'DepartmentController@manageDepartment',
        'as'   => 'manage-department'
    ]);
    Route::get('unpublished-department/{id}',[
        'uses' => 'DepartmentController@unpublishedDepartment',
        'as'   => 'unpublished-department'
    ]);
    Route::get('published-department/{id}',[
        'uses' => 'DepartmentController@publishedDepartment',
        'as'   => 'published-department'
    ]);
    Route::get('edit-department/{id}',[
        'uses' => 'DepartmentController@editDepartment',
        'as'   => 'edit-department'
    ]);
    Route::post('update-department-info',[
        'uses' => 'DepartmentController@updateDepartment',
        'as'   => 'update-department-info'
    ]);
    Route::get('delete-department/{id}',[
        'uses' => 'DepartmentController@deleteDepartment',
        'as'   => 'delete-department'
    ]);

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
    Route::post('appliedListFilter.java',[
        'uses' => 'AdvertisementController@appliedListFilter',
        'as'   => 'appliedListFilter'
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


    Route::post('assign-employee',[
        'uses' => 'EmployeeController@assignEmployee',
        'as'   => 'assign-employee'
    ]);
    Route::post('save-employee-info',[
        'uses' => 'EmployeeController@saveEmployee',
        'as'   => 'save-employee-info'
    ]);

    Route::get('manage-employee',[
        'uses' => 'EmployeeController@manageEmployee',
        'as'   => 'manage-employee'
    ]);


    Route::get('manage-supervisor',[
        'uses' => 'SupervisorController@manageSupervisor',
        'as'   => 'manage-supervisor'
    ]);

    Route::get('create-supervisor',[
        'uses' => 'SupervisorController@createSupervisor',
        'as'   => 'create-supervisor'
    ]);

    Route::get('addSupervisor/{employee_id}',[
        'uses' => 'SupervisorController@addSupervisor',
        'as'   => 'addSupervisor'
    ]);
    Route::post('save-supervisor-info',[
        'uses' => 'SupervisorController@saveSupervisor',
        'as'   => 'save-supervisor-info'
    ]);

    Route::get('create-departmentHead',[
        'uses' => 'DepartmentHeadController@createDepartmentHead',
        'as'   => 'create-departmentHead'
    ]);

    Route::get('manage-departmentHead-setup',[
        'uses' => 'DepartmentHeadController@manageDepartmentHeadSetup',
        'as'   => 'manage-departmentHead-setup'
    ]);
    Route::post('save-departmentHead-info',[
        'uses' => 'DepartmentHeadController@saveDepartmentHead',
        'as'   => 'save-departmentHead-info'
    ]);

    Route::get('create-role',[
        'uses' => 'RoleController@createRole',
        'as'   => 'create-role'
    ]);
    Route::post('save-role-info',[
        'uses' => 'RoleController@saveRole',
        'as'   => 'save-role-info'
    ]);
    Route::get('manage-role',[
        'uses' => 'RoleController@manageRole',
        'as'   => 'manage-role'
    ]);
    Route::get('unpublished-role/{id}',[
        'uses' => 'RoleController@unPublishedRole',
        'as'   => 'unpublished-role'
    ]);
    Route::get('published-role/{id}',[
        'uses' => 'RoleController@publishedRole',
        'as'   => 'published-role'
    ]);
    Route::get('edit-role/{id}',[
        'uses' => 'RoleController@editRole',
        'as'   => 'edit-role'
    ]);

    Route::post('update-role-info',[
        'uses' => 'RoleController@updateRole',
        'as'   => 'update-role-info'
    ]);

    Route::get('delete-role/{id}',[
        'uses' => 'RoleController@deleteRole',
        'as'   => 'delete-role'
    ]);

    Route::get('create-user',[
        'uses' => 'UserController@createUser',
        'as'   => 'create-user'
    ]);
    Route::get('manage-user',[
        'uses' => 'UserController@manageUser',
        'as'   => 'manage-user'
    ]);
/*
    Route::get('searchEmployee/{id}',[
        'uses' => 'UserController@searchUser',
        'as'   => 'searchEmployee'
    ]);
    Route::get('manage-employee',[
        'uses' => 'UserController@searchUser',
        'as'   => 'manage-employee'
    ]);*/

});