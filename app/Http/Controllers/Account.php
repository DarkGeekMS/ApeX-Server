<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Account
 *
 * Controls the authentication, info and messages of any user account.
 */

class Account extends Controller
{


    /**
     * signUp
     * Registers new user into the website.
     * Success Cases :
     * 1) return true to ensure that the user created successfully.
     * failure Cases:
     * 1) verify_password is not the same as the password.
     * 2) username and email are the same.
     * 3) username already exits.
     * 4) email already exists.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam username string required The choosen username.
     * @bodyParam password string required The choosen password.
     * @bodyParam verify_password required string The repeated value of the password.
     * @bodyParam userImage string required The name of the image for the user.
     */

    public function signUp()
    {
        return;
    }




    /**
     * login
     * Validates user's credentials and logs him in.
     * Success Cases :
     * 1) return true to ensure that the user loggedin successfully.
     * failure Cases:
     * 1) username is not found.
     * 2) invalid password.
     *
     * @bodyParam username string required The user's username.
     * @bodyParam password string required The user's password.
     */

    public function login()
    {
        return;
    }




    /**
     * mailVerify
     * Send a verification email to the user with a code in case of forgetting password.
     * Success Cases :
     * 1) return true to ensure that the email has been sent.
     * failure Cases:
     * 1) username is not found.
     *
     * @bodyParam username string required The user's username.
     */

    public function mailVerify()
    {
        return;
    }




    /**
     * checkCode
     * Check whether the user entered the correct reset code sent to his email.
     * Success Cases :
     * 1) return true to verify the code if it matches (the user is then redirected to the change password page).
     * failure Cases:
     * 1) Code is invalid.
     *
     * @bodyParam code int required The entered code.
     */

    public function checkCode()
    {
        return;
    }




    /**
     * logout
     * Logs out a user.
     * Success Cases :
     * 1) return true to ensure that the user is logout successfully.
     * failure Cases:
     * 1) user ID already logged out.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function logout()
    {
        return;
    }




    /**
     * deleteMsg
     * Delete private messages from the recipient's view of their inbox.
     * Success Cases :
     * 1) return true to ensure that the message is deleted successfully.
     * failure Cases:
     * 1) message id is not found.
     * 2) NoAccessRight token is not authorized.
     *
     * @bodyParam id string required The id of the message to be deleted.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function deleteMsg()
    {
        return;
    }




    /**
     * readMsg
     * Read a sent message.
     * Success Cases :
     * 1) return the details of the message.
     * 2) call moreChildren to retrieve replies to this message.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) message id not found.
     *
     * @bodyParam ID string required The id of the message.
     * @bodyParam token JWT required Used to verify the user recieving the message.
     */

    public function readMsg()
    {
        return;
    }





    /**
     * updates
     * Updates the preferences of the user.
     * Success Cases :
     * 1) return true to ensure that the data updated successfully.
     * 2) in case deactivating the account the account will be deleted.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     * 2) the changed email already exists.
     *
     * @bodyParam change_email string required Enable changing the email
     * @bodyParam change_password string required Enable changing the password.
     * @bodyParam deactivate_account string Enable deactivating the account.
     * @bodyParam media_autoplay bool Enabling media autoplay.
     * @bodyParam pm_notifications bool Enable pm notifications.
     * @bodyParam replies_notifications bool Enable notifications for replies.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function updates()
    {
        return;
    }





    /**
     * prefs
     * Returns the preferences of the user.
     * Success Cases :
     * 1) return the preferences of the logged-in user.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function prefs()
    {
        return;
    }




    /**
     * me
     * Returns the identity of the user logged in.
     * Success Cases :
     * 1) return the user ID of the sent token.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function me()
    {
        return;
    }




    /**
     * profileInfo
     * Displaying the profile info of the user.
     * Success Cases :
     * 1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
     * 2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function profileInfo()
    {
        return;
    }




    /**
     * karma
     * Returns the karma of the user.
     * Success Cases :
     * 1) return the karmas of the user.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam token JWT required Used to verify the user.
     */

    public function karma()
    {
        return;
    }




    /**
     * messages
     * Returns the inbox messages of the user.
     * Success Cases :
     * 1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
     * failure Cases:
     * 1) NoAccessRight token is not authorized.
     *
     * @bodyParam max int the maximum number of messages to be returned.
     * @bodyParam token JWT required Used to verify the user.
     */

    public function inbox()
    {
        return;
    }
}
