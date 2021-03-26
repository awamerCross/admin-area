<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('login'  , 'AuthController@showLoginForm')->name('show.login');
    Route::post('login' , 'AuthController@login')        ->name('login');
    Route::post('logout', 'AuthController@logout')       ->name('logout');


    Route::group(['middleware' => ['admin', 'check-role']], function () {

        /*------------ start Of Dashboard----------*/
        Route::get('dashboard', [
            'uses'      => 'HomeController@dashboard',
            'as'        => 'dashboard',
            'icon'      => '<i class="nav-icon fa fa-book"></i>',
            'title'     => 'الرئيسيه',
            'type'      => 'parent'
        ]);

        /*------------ start Of Roles----------*/
        Route::get('roles', [
            'uses'      => 'RoleController@index',
            'as'        => 'roles.index',
            'title'     => 'قائمة الصلاحيات',
            'icon'      => '<i class="nav-icon fa fa-book"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete']
        ]);

        #add role page
        Route::get('roles/create', [
            'uses'      => 'RoleController@create',
            'as'        => 'roles.create',
            'title'     => 'اضافة صلاحيه',

        ]);

        #store role
        Route::post('roles/store', [
            'uses'      => 'RoleController@store',
            'as'        => 'roles.store',
            'title'     => 'تمكين اضافة صلاحيه'
        ]);

        #edit role page
        Route::get('roles/{id}/edit', [
            'uses'      => 'RoleController@edit',
            'as'        => 'roles.edit',
            'title'     => 'تعديل صلاحيه'
        ]);

        #update role
        Route::put('roles/{id}', [
            'uses'      => 'RoleController@update',
            'as'        => 'roles.update',
            'title'     => 'تمكين تعديل صلاحيه'
        ]);

        #delete role
        Route::delete('roles/{id}', [
            'uses'      => 'RoleController@destroy',
            'as'        => 'roles.delete',
            'title'     => 'حذف صلاحيه'
        ]);


        /*------------ start Of users Controller ----------*/

        Route::get('users', [
            'as'        => 'users',
            'icon'      => '<i class="fa fa-users"></i>',
            'title'     => 'المشرفين',
            'type'      => 'parent',
            'sub_route' => true,
            'child'     => ['admins.index', 'admins.store', 'admins.update', 'admins.delete',
                            'clients.index', 'clients.store', 'clients.update', 'clients.delete']
        ]);

        /************ Admins ************/
        #index
        Route::get('admins', [
            'uses'      => 'AdminController@index',
            'as'        => 'admins.index',
            'title'     => ' المشرفين',
            'icon'      => '<i class="nav-icon fa fa-users"></i>',

        ]);
        #store
        Route::post('admins/store', [
            'uses'      => 'AdminController@store',
            'as'        => 'admins.store',
            'title'     => 'اضافة مشرف'
        ]);

        #update
        Route::put('admins/{id}', [
            'uses'      => 'AdminController@update',
            'as'        => 'admins.update',
            'title'     => ' تعديل مشرف'
        ]);

        #delete
        Route::delete('admins/{id}', [
            'uses'      => 'AdminController@destroy',
            'as'        => 'admins.delete',
            'title'     => 'حذف مشرف'
        ]);

        /************ Admins ************/
         #index
        Route::get('clients', [
            'uses'      => 'ClientController@index',
            'as'        => 'clients.index',
            'title'     => 'العملاء',
            'icon'      => '<i class="nav-icon fa fa-users"></i>',

        ]);
        #store
        Route::post('clients/store', [
            'uses'      => 'ClientController@store',
            'as'        => 'clients.store',
            'title'     => 'اضافة عميل'
        ]);

        #update
        Route::put('clients/{id}', [
            'uses'      => 'ْClientController@update',
            'as'        => 'clients.update',
            'title'     => ' تعديل عميل'
        ]);

        #delete
        Route::delete('clients/{id}', [
            'uses'      => 'ْClientController@destroy',
            'as'        => 'clients.delete',
            'title'     => 'حذف عميل'
        ]);


        /*------------ start Of Settings ----------*/
        Route::get('settings', [
            'uses'      => 'SettingController@index',
            'as'        => 'settings.index',
            'title'     => 'الاعدادات',
            'icon'      => '<i class="nav-icon fa fa-book"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['settings.update']
        ]);

        #update
        Route::put('settings', [
            'uses'      => 'SettingController@update',
            'as'        => 'settings.update',
            'title'     => ' تحديث الاعدادات'
        ]);

    });
});
