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
    Route::post('/DeleteMessage', 'AccountController@deleteMsg');
    Route::post('/ReadMessage', 'AccountController@readMsg');
    Route::post('/Me', 'AccountController@me');
    Route::post('/UpdatePreferences', 'AccountController@updates');
    Route::post('/GetPreferences', 'AccountController@prefs');
    Route::post('/BlockList', 'AccountController@blockList');
    Route::post('/SignOut', 'AccountController@logout');
    Route::post('/ProfileInfo', 'AccountController@profileInfo');
    Route::post('/InboxMessages', 'AccountController@inbox');
    Route::post('/SignOut', 'AccountController@logout');


    // administration

    Route::delete('/DeleteApexcom', 'AdministrationController@deleteApexCom');
    Route::delete('/DeleteUser', 'AdministrationController@deleteUser');
    Route::post('/AddModerator', 'AdministrationController@addModerator');


    // links and comments

    Route::post('/AddReply', 'CommentandLinksController@add');
    Route::delete('/Delete', 'CommentandLinksController@delete');
    Route::patch('/EditText', 'CommentandLinksController@editText');
    Route::post('/Report', 'CommentandLinksController@report');
    Route::post('/Vote', 'CommentandLinksController@vote');
    Route::post('/LockPost', 'CommentandLinksController@lock');
    Route::post('/Hide', 'CommentandLinksController@hide');
    Route::post('/Save', 'CommentandLinksController@save');
    Route::post('/RetrieveComments', 'CommentandLinksController@moreChildren');

    // user

    Route::post('/BlockUser', 'UserController@block');
    Route::post('/ComposeMessage', 'UserController@compose');
    Route::post('/UserData', 'UserController@userData');

    // moderation

    Route::post('/ApexcomBlockUser', 'ModerationController@blockUser');
    Route::post('/IgnoreReport', 'ModerationController@ignoreReport');
    Route::post('/ReviewReports', 'ModerationController@reviewReports');

    // ApexCom

    Route::post('/GetApexcoms', 'ApexComController@getApexComs');
    Route::post('/AboutApexcom', 'ApexComController@about');
    Route::post('/SubmitPost', 'ApexComController@submitPost');
    Route::post('/Subscribe', 'ApexComController@subscribe');
    Route::post('/SiteAdmin', 'ApexComController@siteAdmin');

    //General

    Route::post('/SortPosts', 'GeneralController@userSortPostsBy');
    Route::post('/Search', 'GeneralController@userSearch');
    Route::post('/GetSubscribers', 'GeneralController@getSubscribers');
});

// account
Route::post('/SignUp', 'AccountController@signUp');
Route::post('/SignIn', 'AccountController@login');
Route::post('/MailVirification', 'AccountController@mailVerify');
Route::post('/CheckCode', 'AccountController@checkCode');
Route::patch('/ChangePassword', 'AccountController@changePassword');


// ApexCom
Route::get('/AboutApexcom', 'ApexComController@guestAbout');

// links and comments
Route::get('/RetrieveComments', 'CommentandLinksController@guestMoreChildren');

// general
Route::get('/Search', 'GeneralController@guestSearch');
Route::get('/SortPosts', 'GeneralController@guestSortPostsBy');
Route::get('/ApexComs', 'GeneralController@apexNames');
Route::get('/GetSubscribers', 'GeneralController@guestGetSubscribers');

//user
Route::get('/UserData', 'UserController@guestUserData');
