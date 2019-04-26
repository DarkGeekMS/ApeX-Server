<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.verify']], function () {

    // account
    Route::post('/del_msg', 'AccountController@deleteMsg');
    Route::post('/read_msg', 'AccountController@readMsg');
    Route::post('/me', 'AccountController@me');
    Route::post('/prefs', 'AccountController@prefs');
    Route::patch('/updateprefs', 'AccountController@updates');
    Route::patch('/changepassword', 'AccountController@changePassword');
    Route::post('/blocklist', 'AccountController@blockList');
    Route::post('/sign_out', 'AccountController@logout');
    Route::post('/info', 'AccountController@profileInfo');
    Route::post('/inbox_messages', 'AccountController@inbox');
    Route::post('/sign_out', 'AccountController@logout');


    // administration

    Route::delete('/del_apexCom', 'AdministrationController@deleteApexCom');
    Route::delete('/del_user', 'AdministrationController@deleteUser');
    Route::post('/add_moderator', 'AdministrationController@addModerator');


    // links and comments

    Route::post('/comment', 'CommentandLinksController@add');
    Route::delete('/delete', 'CommentandLinksController@delete');
    Route::patch('/edit', 'CommentandLinksController@editText');
    Route::post('/report', 'CommentandLinksController@report');
    Route::post('/vote', 'CommentandLinksController@vote');
    Route::post('/lock_post', 'CommentandLinksController@lock');
    Route::post('/Hide', 'CommentandLinksController@hide');
    Route::post('/save', 'CommentandLinksController@save');
    Route::post('/moreComments', 'CommentandLinksController@moreChildren');

    // user

    Route::post('/block_user', 'UserController@block');
    Route::post('/compose', 'UserController@compose');
    Route::post('/user_data', 'UserController@userData');

    // moderation

    Route::post('/block', 'ModerationController@blockUser');
    Route::post('/report_action', 'ModerationController@ignoreReport');
    Route::post('/review_reports', 'ModerationController@reviewReports');

    // ApexCom

    Route::post('/get_ApexComs', 'ApexComController@getApexComs');
    Route::post('/about', 'ApexComController@about');
    Route::post('/submit_post', 'ApexComController@submitPost');
    Route::post('/subscribe', 'ApexComController@subscribe');
    Route::post('/site_admin', 'ApexComController@siteAdmin');

    //General

    Route::post('/sort_posts', 'GeneralController@userSortPostsBy');
    Route::post('/search', 'GeneralController@userSearch');
    Route::post('/get_subscribers', 'GeneralController@getSubscribers');
});

// account
Route::post('/sign_up', 'AccountController@signUp');
Route::post('/sign_in', 'AccountController@login');
Route::post('/mail_verify', 'AccountController@mailVerify');
Route::post('/check_code', 'AccountController@checkCode');

// ApexCom
Route::get('/about', 'ApexComController@guestAbout');

// links and comments
Route::get('/moreComments', 'CommentandLinksController@guestMoreChildren');

// general
Route::get('/search', 'GeneralController@guestSearch');
Route::get('/sort_posts', 'GeneralController@guestSortPostsBy');
Route::get('/Apex_names', 'GeneralController@apexNames');
Route::get('/get_subscribers', 'GeneralController@guestGetSubscribers');

//user
Route::get('/user_data', 'UserController@guestUserData');
