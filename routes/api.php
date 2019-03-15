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

// account

Route::post('/sign_up', 'Account@signUp');
Route::post('/Sign_in', 'Account@login');
Route::post('/mail_verify', 'Account@mailVerify');
Route::post('/check_code', 'Account@checkCode');
Route::post('/sign_out', 'Account@logout');
Route::post('/del_msg', 'Account@deleteMsg');
Route::post('/read_msg', 'Account@readMsg');
Route::post('/me', 'Account@me');
Route::patch('/updateprefs', 'Account@updates');
Route::get('/prefs', 'Account@prefs');
Route::get('/info', 'Account@profileInfo');
Route::get('/karma', 'Account@karma');
Route::get('/messages', 'Account@inbox');



// administration

Route::post('/del_ac', 'Administration@deleteApexCom');
Route::post('/del_user', 'Administration@deleteUser');
Route::post('/add_mod', 'Administration@addModerator');



// ApexCom

Route::get('/about', 'ApexCom@about');
Route::post('/submit_post', 'ApexCom@submitPost');
Route::post('/subscribe', 'ApexCom@subscribe');
Route::post('/site_admin', 'ApexCom@siteAdmin');



// links and comments

Route::post('/comment', 'CommentandLinks@add');
Route::post('/DelComment', 'CommentandLinks@delete');
Route::post('/Edit', 'CommentandLinks@editText');
Route::post('/report', 'CommentandLinks@report');
Route::post('/vote', 'CommentandLinks@vote');
Route::post('/lock_post', 'CommentandLinks@lock');
Route::post('/Hide', 'CommentandLinks@hide');
Route::post('/save', 'CommentandLinks@save');
Route::get('/moreComments', 'CommentandLinks@moreChildren');



// general


Route::get('/search', 'General@search');
Route::get('/sort_posts', 'General@sortPostsBy');
Route::get('/Apex_names', 'General@apexNames');
Route::get('/get_subscribers', 'General@getSubscribers');


// moderation

Route::post('/block', 'Moderation@blockUser');
Route::post('/report_action', 'Moderation@ignoreReport');
Route::get('/review_reports', 'Moderation@reviewReports');



// user

Route::post('/block_user', 'User@block');
Route::post('/compose', 'User@compose');
Route::get('/user_data', 'User@userDataByAccountID');
