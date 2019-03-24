---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>

---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Account

Controls the authentication, info and messages of any user account.
<!-- START_311b0f388598aca8ed7f8fdf74916333 -->
## SignUp
Registers new user into the website.

Success Cases :
1) return user data and JWT token to ensure that the user created successfully.
failure Cases:
1) username already exits.
2) email already exists.

> Example request:

```bash
curl -X POST "http://localhost/api/sign_up" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"email":"BVAdCHRlXAUDxV9r","username":"AG536hG0GV29dgTx","password":"P5niVu6o9DBP54pt"}'

```

```javascript
const url = new URL("http://localhost/api/sign_up");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "BVAdCHRlXAUDxV9r",
    "username": "AG536hG0GV29dgTx",
    "password": "P5niVu6o9DBP54pt"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "user": {
        "email": "hello@gmail.com",
        "username": "MohamedRamzy1234",
        "id": "t2_13",
        "avatar": "storage\/avatars\/users\/default.png",
        "updated_at": "2019-03-19 18:30:05",
        "created_at": "2019-03-19 18:30:05"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwv"
}
```
> Example response (400):

```json
{
    "email": [
        "The email has already been taken."
    ],
    "username": [
        "The username has already been taken."
    ]
}
```
> Example response (400):

```json
{
    "email": [
        "The email has already been taken."
    ]
}
```
> Example response (400):

```json
{
    "username": [
        "The username has already been taken."
    ]
}
```

### HTTP Request
`POST api/sign_up`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.
    username | string |  required  | The choosen username.
    password | string |  required  | The choosen password.

<!-- END_311b0f388598aca8ed7f8fdf74916333 -->


<!-- START_67f683fe8a80401986f3d12a170787b0 -->
## login
Validates user&#039;s credentials and logs him in.

Success Cases :
1) return JWT token to ensure that the user loggedin successfully.
failure Cases:
1) username is not found.
2) invalid password.

> Example request:

```bash
curl -X POST "http://localhost/api/Sign_in" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"H9cEykjfSVg0Sp4i","password":"rtKT3V0BzWY6GHWY"}'

```

```javascript
const url = new URL("http://localhost/api/Sign_in");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "H9cEykjfSVg0Sp4i",
    "password": "rtKT3V0BzWY6GHWY"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9X2luIiwiaWF0IjoxNTUzMD"
}
```
> Example response (400):

```json
{
    "error": "invalid_credentials"
}
```
> Example response (400):

```json
{
    "error": "could_not_create_token"
}
```

### HTTP Request
`POST api/Sign_in`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.

<!-- END_67f683fe8a80401986f3d12a170787b0 -->


<!-- START_9c2b68d84a5e58731426b62d8716d169 -->
## mailVerify
Send a verification email to the user with a code in case of forgetting password.

Success Cases :
1) return true to ensure that the email has been sent.
failure Cases:
1) username is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/mail_verify" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"qqKrVwCG3l11Bc1e"}'

```

```javascript
const url = new URL("http://localhost/api/mail_verify");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "qqKrVwCG3l11Bc1e"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/mail_verify`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.

<!-- END_9c2b68d84a5e58731426b62d8716d169 -->


<!-- START_4b5bbd8dc31ae3073c29c9b679f448b5 -->
## checkCode
Check whether the user entered the correct reset code sent to his email.

Success Cases :
1) return true to verify the code if it matches (the user is then redirected to the change password page).
failure Cases:
1) Code is invalid.

> Example request:

```bash
curl -X POST "http://localhost/api/check_code" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"code":14}'

```

```javascript
const url = new URL("http://localhost/api/check_code");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/check_code`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | integer |  required  | The entered code.

<!-- END_4b5bbd8dc31ae3073c29c9b679f448b5 -->


<!-- START_61c037b1e23dc1e0f83fb62a8024cf9d -->
## Logout
Logs out a user.

Success Cases :
1) return token equals to null to ensure that the user is logout successfully.
failure Cases:
1) Token invalid

> Example request:

```bash
curl -X POST "http://localhost/api/sign_out" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"xDC797HqAbhhSO6I"}'

```

```javascript
const url = new URL("http://localhost/api/sign_out");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "xDC797HqAbhhSO6I"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "token": null
}
```
> Example response (400):

```json
{
    "token_error": "wrong number of segments"
}
```

### HTTP Request
`POST api/sign_out`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_61c037b1e23dc1e0f83fb62a8024cf9d -->


<!-- START_17ab3166922a15e0dcef5180e5c57447 -->
## deleteMsg
Delete private messages from the recipient&#039;s view of their inbox.

Success Cases :
1) return true to ensure that the message is deleted successfully.
failure Cases:
1) message id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/del_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"Iy6RzlKFrpRRcupF","token":"DgJTDJCMNChE4uHY"}'

```

```javascript
const url = new URL("http://localhost/api/del_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "Iy6RzlKFrpRRcupF",
    "token": "DgJTDJCMNChE4uHY"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/del_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_17ab3166922a15e0dcef5180e5c57447 -->


<!-- START_293bfba07d359f07b62946a6702243f5 -->
## readMsg
Read a sent message.

Success Cases :
1) return the details of the message.
2) call moreChildren to retrieve replies to this message.
failure Cases:
1) NoAccessRight token is not authorized.
2) message id not found.

> Example request:

```bash
curl -X POST "http://localhost/api/read_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"nkbDEAQgKAJxQnx4","token":"cqcTIYxgjeEh4fWp"}'

```

```javascript
const url = new URL("http://localhost/api/read_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "nkbDEAQgKAJxQnx4",
    "token": "cqcTIYxgjeEh4fWp"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/read_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The id of the message.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_293bfba07d359f07b62946a6702243f5 -->


<!-- START_d131f717df7db546af1657d1e7ce10f6 -->
## Me
Returns the identity of the user logged in.

Success Cases :
1) return the user object of the sent token as json.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/me" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"Xyr3FCDy762oBzCn"}'

```

```javascript
const url = new URL("http://localhost/api/me");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "Xyr3FCDy762oBzCn"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "user": {
        "id": "t2_2",
        "fullname": null,
        "email": "111@gmail.com",
        "username": "MohamedRamzy123",
        "avatar": "storage\/avatars\/users\/default.png",
        "karma": 1,
        "notification": 1,
        "type": 1,
        "created_at": "2019-03-18 09:36:09",
        "updated_at": "2019-03-18 09:36:09"
    }
}
```
> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/me`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_d131f717df7db546af1657d1e7ce10f6 -->


<!-- START_7d778b4cd1f31a8abdc1f7156cf2439a -->
## updates
Updates the preferences of the user.

Success Cases :
1) return true to ensure that the data updated successfully.
2) in case deactivating the account the account will be deleted.
failure Cases:
1) NoAccessRight token is not authorized.
2) the changed email already exists.

> Example request:

```bash
curl -X PATCH "http://localhost/api/updateprefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"0VyYtc1q6E9H2wvg","change_password":"KoJdQeuhPXZO73yv","deactivate_account":"lxVvdvJNXb7iCKxe","media_autoplay":true,"pm_notifications":false,"replies_notifications":true,"token":"PpCHXJakoNQxNhaX"}'

```

```javascript
const url = new URL("http://localhost/api/updateprefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "0VyYtc1q6E9H2wvg",
    "change_password": "KoJdQeuhPXZO73yv",
    "deactivate_account": "lxVvdvJNXb7iCKxe",
    "media_autoplay": true,
    "pm_notifications": false,
    "replies_notifications": true,
    "token": "PpCHXJakoNQxNhaX"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`PATCH api/updateprefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    change_email | string |  required  | Enable changing the email
    change_password | string |  required  | Enable changing the password.
    deactivate_account | string |  optional  | Enable deactivating the account.
    media_autoplay | boolean |  optional  | Enabling media autoplay.
    pm_notifications | boolean |  optional  | Enable pm notifications.
    replies_notifications | boolean |  optional  | Enable notifications for replies.
    token | JWT |  required  | Used to verify the user.

<!-- END_7d778b4cd1f31a8abdc1f7156cf2439a -->


<!-- START_7d73dd7c706d7ec669a1276ac0d40162 -->
## prefs
Returns the preferences of the user.

Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/api/prefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"6euMTbY532vKkoT4"}'

```

```javascript
const url = new URL("http://localhost/api/prefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "6euMTbY532vKkoT4"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/prefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_7d73dd7c706d7ec669a1276ac0d40162 -->


<!-- START_4f5bd90551adf77b8dfc04a29b6a85ea -->
## profileInfo
Displaying the profile info of the user.

Success Cases :
1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/api/info" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"RR9f8kyYZu4UWr7v"}'

```

```javascript
const url = new URL("http://localhost/api/info");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "RR9f8kyYZu4UWr7v"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/info`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_4f5bd90551adf77b8dfc04a29b6a85ea -->


<!-- START_5f6a60fdc5acad163e3c29c7bbc137ed -->
## karma
Returns the karma of the user.

Success Cases :
1) return the karmas of the user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/api/karma" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"H1GIYs26CHFfTZbY"}'

```

```javascript
const url = new URL("http://localhost/api/karma");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "H1GIYs26CHFfTZbY"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/karma`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_5f6a60fdc5acad163e3c29c7bbc137ed -->


<!-- START_c61e9c2b3fdeea56ee207c8db3d88546 -->
## messages
Returns the inbox messages of the user.

Success Cases :
1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/api/messages" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"max":12,"token":"Xs9nXTJbCwFtyTPp"}'

```

```javascript
const url = new URL("http://localhost/api/messages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 12,
    "token": "Xs9nXTJbCwFtyTPp"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned.
    token | JWT |  required  | Used to verify the user.

<!-- END_c61e9c2b3fdeea56ee207c8db3d88546 -->


#Adminstration

To manage the controls of admins and moderators
<!-- START_3fcde72848e7849d8989cf01b3685b96 -->
## deleteApexCom
Deleting the ApexCom by the admin.

Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X DELETE "http://localhost/api/del_ac" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"azn6UAdVzont51Wr","token":"r2dJURyAzvs3ngWS"}'

```

```javascript
const url = new URL("http://localhost/api/del_ac");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "azn6UAdVzont51Wr",
    "token": "r2dJURyAzvs3ngWS"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`DELETE api/del_ac`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_3fcde72848e7849d8989cf01b3685b96 -->


<!-- START_e296e67bb691dee7c255f187ef41231e -->
## deleteUser
Delete a user from the application by the admin or self-delete (Account deactivation).

Success Cases :
1) return true to ensure that the user is deleted successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin or the same user token id.

> Example request:

```bash
curl -X DELETE "http://localhost/api/del_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"zE6w7kQYaSNqMc36","token":"loR3aABQ5MmwFdCJ"}'

```

```javascript
const url = new URL("http://localhost/api/del_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "zE6w7kQYaSNqMc36",
    "token": "loR3aABQ5MmwFdCJ"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`DELETE api/del_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    token | JWT |  required  | Used to verify the admin or the same user ID.

<!-- END_e296e67bb691dee7c255f187ef41231e -->


<!-- START_3072ddc0a02e0bfd3ae74e0e57d93f77 -->
## addModerator
Adding (or Deleting) a moderator to ApexCom.

Success Cases :
1) return true to ensure that the moderator is added successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/api/add_mod" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"oaV1uxC7U8zDDaKF","token":"aXUR5Ufsd4ZzGRh3","UserID":"THCU5Txd4kq4Xluu"}'

```

```javascript
const url = new URL("http://localhost/api/add_mod");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "oaV1uxC7U8zDDaKF",
    "token": "aXUR5Ufsd4ZzGRh3",
    "UserID": "THCU5Txd4kq4Xluu"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`POST api/add_mod`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexComID | string |  required  | The ID of the ApexCom.
    token | JWT |  required  | Used to verify the Admin ID.
    UserID | string |  required  | The user ID to be added as a moderator.

<!-- END_3072ddc0a02e0bfd3ae74e0e57d93f77 -->


#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_931d45747883f17f4898d055e7277e3d -->
## about
to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count).

Success Cases :
1) return the information about the ApexCom.
failure Cases:
1) NoAccessRight the token does not support to view the about information.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/about" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"cXBfTurqr7FUVlg8","token":"SASMp2XMCifkTOFf"}'

```

```javascript
const url = new URL("http://localhost/api/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "cXBfTurqr7FUVlg8",
    "token": "SASMp2XMCifkTOFf"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`GET api/about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_931d45747883f17f4898d055e7277e3d -->


<!-- START_2a2f591ef5501e8aaaaa6c4d241d3b09 -->
## posts
to post text , image or video in any ApexCom.

Success Cases :
1) return true to ensure that the post was added to the ApexCom successfully.
failure Cases:
1) NoAccessRight the token does not support to Create a post in this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.
3) Not including text , image or video in the request.
4) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/submit_post" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"WYNPleSbZIO1t80h","body":"cqXKOv9Gd23mnop1","img_name":"thsKPJeopk0Dr27u","video_url":"yvqgXfgAfXRcB9QP","isLocked":false,"token":"sSHfuLbbTclI3AWC"}'

```

```javascript
const url = new URL("http://localhost/api/submit_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "WYNPleSbZIO1t80h",
    "body": "cqXKOv9Gd23mnop1",
    "img_name": "thsKPJeopk0Dr27u",
    "video_url": "yvqgXfgAfXRcB9QP",
    "isLocked": false,
    "token": "sSHfuLbbTclI3AWC"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/submit_post`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the post is posted.
    body | string |  optional  | The text body of the post.
    img_name | string |  optional  | The attached image to the post.
    video_url | string |  optional  | The url to attached video to the post.
    isLocked | boolean |  optional  | To allow or disallow comments on the posted post.
    token | JWT |  required  | Verifying user ID.

<!-- END_2a2f591ef5501e8aaaaa6c4d241d3b09 -->


<!-- START_95d2609383a86210e2424765cf8031d1 -->
## subscribe
for a user to subscribe in any ApexCom.

Success Cases :
1) return true to ensure that the subscription or unsubscribtion has been done successfully.
failure Cases:
1) NoAccessRight the token does not support to subscribe this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/subscribe" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"8CirBdmwFuq0x8tx","token":"qXCOxAqFeBU35vPr"}'

```

```javascript
const url = new URL("http://localhost/api/subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "8CirBdmwFuq0x8tx",
    "token": "qXCOxAqFeBU35vPr"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`POST api/subscribe`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community required to be subscribed.
    token | JWT |  required  | Verifying user ID.

<!-- END_95d2609383a86210e2424765cf8031d1 -->


<!-- START_83008eaf25318b2ebea682cd9cd6b43b -->
## siteAdmin
used by the site admin to create new ApexCom.

Success Cases :
1) return true to ensure that the ApexCom was created  successfully.
failure Cases:
1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
2) Wrong or unsufficient submitted information.

> Example request:

```bash
curl -X POST "http://localhost/api/site_admin" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"RKFYgh9QFiDyQX6Q","description":"1l8QErD48PLPBo0T","rules":"Krpw8hAMjI54qTm6","avatar":"WASHM5Igw2Xyy5fg","banner":"JYUWR6L5uToyx4j4","token":"HO2zvZdkbMPCVjV9"}'

```

```javascript
const url = new URL("http://localhost/api/site_admin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "RKFYgh9QFiDyQX6Q",
    "description": "1l8QErD48PLPBo0T",
    "rules": "Krpw8hAMjI54qTm6",
    "avatar": "WASHM5Igw2Xyy5fg",
    "banner": "JYUWR6L5uToyx4j4",
    "token": "HO2zvZdkbMPCVjV9"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`POST api/site_admin`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the community.
    description | string |  required  | The description of the community.
    rules | string |  required  | The rules of the community.
    avatar | string |  optional  | The icon image to the community.
    banner | string |  optional  | The header image to the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_83008eaf25318b2ebea682cd9cd6b43b -->


#Links and comments

controls the comments , replies and private messages for each user
<!-- START_e795fade4d25e2473e7fd22cababfe99 -->
## add
submit a new comment or reply to a comment on a post or reply to any message.

Success Cases :
1) return true to ensure that the comment , reply is added successfully.
failure Cases:
1) post fullname (ID) is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/comment" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/comment");

    let params = {
            "content": "ELm199ApNqryOjjI",
            "parent": "S6p7EVqTuqWJIV6d",
            "token": "lUCPRwj18J6eSr0b",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "comment not exists"
}
```
> Example response (404):

```json
{
    "error": "message not exists"
}
```
> Example response (400):

```json
{
    "token_error": "invalid Action"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/comment`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    content |  optional  | string required The body of the comment.
    parent |  optional  | string required The fullname of the thing to be replied to.
    token |  optional  | JWT required Verifying user ID.

<!-- END_e795fade4d25e2473e7fd22cababfe99 -->


<!-- START_4f136192702be68001efc45896913292 -->
## delete
to delete a post or comment or reply from any ApexCom by the owner of the thing,
the moderator of this ApexCom or any admin.

Success Cases :
1) return true to ensure that the post, comment or reply is deleted successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
3) post , comment or reply fullname (ID) is not found.

> Example request:

```bash
curl -X DELETE "http://localhost/api/delete" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/delete");

    let params = {
            "name": "4Fd1lOfEfJ89F78s",
            "token": "noIzdw6MkpVbwGdp",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "comment not exists"
}
```
> Example response (400):

```json
{
    "token_error": "invalid user"
}
```
> Example response (400):

```json
{
    "token_error": "invalid action"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`DELETE api/delete`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  optional  | string required The fullname of the post,comment or reply to be deleted.
    token |  optional  | JWT required Verifying user ID.

<!-- END_4f136192702be68001efc45896913292 -->


<!-- START_42247571823affd457153bd9d4c423d7 -->
## editText
to edit the text of a post , comment or reply by its owner.

Success Cases :
1) return true to ensure that the post or comment updated successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) NoAccessRight the token is not for the owner of the post or comment to be edited.
3) post or commet fullname (ID) is not found.

> Example request:

```bash
curl -X PATCH "http://localhost/api/Edit" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"guJJXle17UEtG5CE","content":"5rSfRu6MpZIXgS5E","ID":"IZ9CD8v5eG3jhXeA"}'

```

```javascript
const url = new URL("http://localhost/api/Edit");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "guJJXle17UEtG5CE",
    "content": "5rSfRu6MpZIXgS5E",
    "ID": "IZ9CD8v5eG3jhXeA"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`PATCH api/Edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    ID | JWT |  required  | Verifying user ID.

<!-- END_42247571823affd457153bd9d4c423d7 -->


<!-- START_513d4e19011ae1f92bd8858b5eb059b2 -->
## report
report a post , comment or a message to the ApexCom moderator
( message&#039;s reports will be sent to the site admin), posts or comments will be hidden implicitly as well.

( moderators don't report posts).
Success Cases :
1) return true to ensure that the report is sent to the moderator of the ApexCom.
failure Cases:
1) send reason (index) out of the associative array range.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/report" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"content":"tXzHMtnpAeCH8xKQ","token":"sP32FKHoOEoSzYcg"}'

```

```javascript
const url = new URL("http://localhost/api/report");

    let params = {
            "name": "zYL8XkojeYYfrngt",
            "token": "Kd9F0b4RjiP0AwYv",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "content": "tXzHMtnpAeCH8xKQ",
    "token": "sP32FKHoOEoSzYcg"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "report content not found"
}
```
> Example response (404):

```json
{
    "error": "comment_not_found"
}
```
> Example response (400):

```json
{
    "error": "invalid Action"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/report`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    content | string |  optional  | The reason for the report from an associative array.
    token | JWT |  required  | Verifying user ID.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  optional  | string required The fullname of the post,comment or message to report.
    token |  optional  | JWT required Verifying user ID.

<!-- END_513d4e19011ae1f92bd8858b5eb059b2 -->


<!-- START_1ce8121bc6bb159652da3758695c4f33 -->
## vote
cast a vote on a post , comment or reply.

Success Cases :
1) return total number of votes on this post,comment or reply.
failure Cases:
1) NoAccessRight token is not authorized.
2) fullname of the thing to vote on is not found.
3) direction of the vote is not integer between -1 , 1.

> Example request:

```bash
curl -X POST "http://localhost/api/vote" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"dir":1}'

```

```javascript
const url = new URL("http://localhost/api/vote");

    let params = {
            "name": "DpXbSGTsFN2GlenH",
            "token": "SvL40gfAMyDT7W0b",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "dir": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (400):

```json
{
    "error": "Invalid Action"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/vote`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    dir | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  optional  | string required The fullname of the post,comment or reply to vote on.
    token |  optional  | JWT required Verifying user ID.

<!-- END_1ce8121bc6bb159652da3758695c4f33 -->


<!-- START_4a071a0a5195e750a36b0b89a51e2235 -->
## lock
to lock or unlock a post so it can&#039;t recieve new comments.

check the user id the post owner or admin in the ApexCom or moderator in the ApexCom holds the post
to be able to lock this post otherwise error message Not Allowed will return.
Success Cases :
1) return true to ensure that the post was locked/unlock.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.
3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.

> Example request:

```bash
curl -X POST "http://localhost/api/lock_post" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/lock_post");

    let params = {
            "name": "umU1rpuQzGazr3NH",
            "token": "JaMI1WI6XzrbNwcn",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (400):

```json
{
    "token_error": "Not allowed"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/lock_post`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  optional  | string required The fullname of the post to be locked.
    token |  optional  | JWT required Verifying user ID.

<!-- END_4a071a0a5195e750a36b0b89a51e2235 -->


<!-- START_ebf64eb08a02a3600dbec8e628a60a56 -->
## hide
to hide or UnHide a post from the user view.

check valid user and post and if the post was hidden it removes it from hiddens and vice versa.
Success Cases :
1) return true to ensure that the post hidden.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/Hide" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/Hide");

    let params = {
            "name": "aKlYeHptjYMyM0dg",
            "token": "4xxCvtWJytwitehX",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/Hide`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  optional  | string required The fullname of the post to be hidden.
    token |  optional  | JWT required Verifying user ID.

<!-- END_ebf64eb08a02a3600dbec8e628a60a56 -->


<!-- START_097a5f7f0c0183fb32d32b0e9bba6b31 -->
## save
Save or UnSave a post or a comment.

Success Cases :
1) return true to ensure that the post saved successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/save" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"GqLMlwlo8gJCk37B"}'

```

```javascript
const url = new URL("http://localhost/api/save");

    let params = {
            "token": "xwSKjE9tuXm6jMcs",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "GqLMlwlo8gJCk37B"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "Wrong number of segments"
}
```

### HTTP Request
`POST api/save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    token |  optional  | JWT required Used to verify the user.

<!-- END_097a5f7f0c0183fb32d32b0e9bba6b31 -->


<!-- START_42544bc9403ef51f80610dbe397862b5 -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).

Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X GET -G "http://localhost/api/moreComments" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/moreComments");

    let params = {
            "parent": "MUAOOCvQ94mADbFw",
            "ID": "crzH5GWZfhqSW6Ml",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/moreComments`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    parent |  optional  | string required The fullname of the posts whose comments are being fetched
    ID |  optional  | JWT required Verifying user ID.

<!-- END_42544bc9403ef51f80610dbe397862b5 -->


#Moderation

Controls the Moderators actions.
<!-- START_bfe5eadf66f0e0ddc26472dc0275da31 -->
## blockUser
to block a user from ApexCom he is moderator in so that he can&#039;t interact in this ApexCom anymore.

Success Cases :
1) return true to ensure that the post or comment is removed successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be removed.
2) user fullname (id) is not found , already blocked or not subscribed in this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/api/block" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"sc0c5PlZnNchwKw4","user_id":"0Bja29QIkCFFR19e","_token":"uMeF9dTo6cBDclMC"}'

```

```javascript
const url = new URL("http://localhost/api/block");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "sc0c5PlZnNchwKw4",
    "user_id": "0Bja29QIkCFFR19e",
    "_token": "uMeF9dTo6cBDclMC"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/block`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the user is blocked.
    user_id | string |  required  | The fullname of the user to be blocked.
    _token | JWT |  required  | Verifying user ID.

<!-- END_bfe5eadf66f0e0ddc26472dc0275da31 -->


<!-- START_85b1e06ff0cc2a00de486d21459568f9 -->
## ignoreReport
to delete the ignored report from  ApexCom&#039;s reports.

Success Cases :
1) return true to ensure that the report is deleted successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
2) report fullname (id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/report_action" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"report_id":"SgMZtGnONCaARNmo","_token":"0Hj6CLlSp16RtNM6"}'

```

```javascript
const url = new URL("http://localhost/api/report_action");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "SgMZtGnONCaARNmo",
    "_token": "0Hj6CLlSp16RtNM6"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/report_action`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    report_id | string |  required  | The fullname of the report to be ignored.
    _token | JWT |  required  | Verifying user ID.

<!-- END_85b1e06ff0cc2a00de486d21459568f9 -->


<!-- START_9e88c060d07f4e8b1dd6948de555c21c -->
## reviewReports
view the reports sent by any user for any post or comment in the ApexCom he is moderator in.

Success Cases :
1) return the reported posts and comments.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.

> Example request:

```bash
curl -X GET -G "http://localhost/api/review_reports" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"C8ScAfnqVMSpFtdT","_token":"zTN5fTEq8jSKKYBB"}'

```

```javascript
const url = new URL("http://localhost/api/review_reports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "C8ScAfnqVMSpFtdT",
    "_token": "zTN5fTEq8jSKKYBB"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/review_reports`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the reported comments or posts.
    _token | JWT |  required  | Verifying user ID.

<!-- END_9e88c060d07f4e8b1dd6948de555c21c -->


#User

Control the user interaction with other users
<!-- START_5603f5edd050cc1888d2fe64500d5499 -->
## Block
User block another user, so they can&#039;t send private messages to each other
 or see their each other posts or comments.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
If the user is already blocked, the request will unblock him

###Success Cases :
1. Return json contains 'the user has been blocked successfully',
       if the user was not blocked (status code 200)
2. Return json contains 'the user has been unblocked seccessfully',
       if the user was blocked already (status code 200).

###Failure Cases:
1. The `token` is invalid, return a message about the error (stauts code 400).
2. Blocked user is not found (status code 404)
3. The user is blocking himself (status code 400)

> Example request:

```bash
curl -X POST "http://localhost/api/block_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"blockedID":"t2_1","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/block_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "blockedID": "t2_1",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "result": "The user has been blocked successfully"
}
```
> Example response (200):

```json
{
    "result": "The user has been unblocked successfully"
}
```
> Example response (400):

```json
{
    "token": [
        "The token field is required."
    ]
}
```
> Example response (400):

```json
{
    "token_error": "Wrong number of segments"
}
```
> Example response (400):

```json
{
    "token_error": "Token Signature could not be verified."
}
```
> Example response (404):

```json
{
    "error": "Blocked user is not found"
}
```
> Example response (400):

```json
{
    "error": "The user can't block himself"
}
```

### HTTP Request
`POST api/block_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    blockedID | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<!-- END_5603f5edd050cc1888d2fe64500d5499 -->


<!-- START_77449fa4952e985b77eff4023c7451dd -->
## compose
Send a private message to another user.

Success Cases :
1) return true to ensure that the message sent successfully.
failure Cases:
1) messaged-user id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/compose" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"to":"pyrSN70t22eHp5GL","subject":"0oHAw2Mapc2biL3F","mes":"cycZPSrOAuJVRhsc","token":"DeL1GvIwRz0ABnpA"}'

```

```javascript
const url = new URL("http://localhost/api/compose");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "pyrSN70t22eHp5GL",
    "subject": "0oHAw2Mapc2biL3F",
    "mes": "cycZPSrOAuJVRhsc",
    "token": "DeL1GvIwRz0ABnpA"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`POST api/compose`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    to | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    mes | text |  optional  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_77449fa4952e985b77eff4023c7451dd -->


<!-- START_642cf7a37db701458812f02d6082db55 -->
## userDataByAccountID
Return user public data to be seen by another user.

Success Cases :
1) return the data of the user successfully.
failure Cases:
1) username is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/api/user_data" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"SvFaz8qTRHTXl4yE","token":"VtqwaZ1rID3esicd"}'

```

```javascript
const url = new URL("http://localhost/api/user_data");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "SvFaz8qTRHTXl4yE",
    "token": "VtqwaZ1rID3esicd"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/user_data`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_642cf7a37db701458812f02d6082db55 -->


#general
<!-- START_f7828fe70326ce6166fdba9c0c9d80ed -->
## Guest Search
Returns a json contains posts, apexComs and users that match the given query.

Use this request only if the user is a guest and not authorized

###Success Cases :
1. The `query` is valid, return the results successfullly (status code 200)

###Failure Cases:
1. The `query` is invalid, return message about the error (status code 400)
2. There is server-side error (status code 500)

> Example request:

```bash
curl -X GET -G "http://localhost/api/search" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/search");

    let params = {
            "query": "lorem",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "id": "t3_10",
            "posted_by": "t2_31",
            "apex_id": "t5_10",
            "title": "5yackoudW8",
            "img": null,
            "videolink": null,
            "content": "Architecto nesciunt deleniti ut. Commodi doloremque blanditiis est odio sit quia. Eos sit et sunt in repellat omnis.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        },
        {
            "id": "t3_12",
            "posted_by": "t2_35",
            "apex_id": "t5_9",
            "title": "qYxfPEUHif",
            "img": null,
            "videolink": null,
            "content": "Assumenda iusto sed quae hic ex non rerum. Officia voluptatem minus perferendis distinctio sint qui. Dolorem ut aliquid id illum qui placeat sit.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        }
    ],
    "apexComs": [
        {
            "id": "t5_7",
            "name": "e4GiNXiUN6",
            "avatar": "public\\img\\apx.png",
            "banner": "public\\img\\banner.jpg",
            "rules": "Reprehenderit qui vero eum. Qui et quos est autem culpa perferendis. Vero omnis ea culpa doloremque dolorem.",
            "description": "Maxime quos sit omnis dolore error reprehenderit et. Harum rerum nisi magni. Qui rerum voluptatem dolorem perspiciatis ut et.",
            "created_at": "2019-03-22 16:58:24",
            "updated_at": "2019-03-22 16:58:24"
        }
    ],
    "users": []
}
```
> Example response (400):

```json
{
    "query": [
        "The query must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query field is required."
    ]
}
```

### HTTP Request
`GET api/search`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    query |  required  | The query to be searched for (at least 3 characters).

<!-- END_f7828fe70326ce6166fdba9c0c9d80ed -->


<!-- START_9792377865465dfd12bebd73e7326925 -->
## User Search
Just like [Guest Search](#guest-search) except that
it does&#039;t return the posts between blocked users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. The `query` is valid, return the results successfullly (status code 200)

###Failure Cases:
1. The `query` is invalid, return message about the error (status code 400)
2. The `token` is invalid, return a message about the error (status code 400)
3. There is server-side error (status code 500)

> Example request:

```bash
curl -X POST "http://localhost/api/search" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"query":"lorem","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/search");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "lorem",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "id": "t3_10",
            "posted_by": "t2_31",
            "apex_id": "t5_10",
            "title": "5yackoudW8",
            "img": null,
            "videolink": null,
            "content": "Architecto nesciunt deleniti ut. Commodi doloremque blanditiis est odio sit quia. Eos sit et sunt in repellat omnis.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        },
        {
            "id": "t3_12",
            "posted_by": "t2_35",
            "apex_id": "t5_9",
            "title": "qYxfPEUHif",
            "img": null,
            "videolink": null,
            "content": "Assumenda iusto sed quae hic ex non rerum. Officia voluptatem minus perferendis distinctio sint qui. Dolorem ut aliquid id illum qui placeat sit.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        }
    ],
    "apexComs": [
        {
            "id": "t5_7",
            "name": "e4GiNXiUN6",
            "avatar": "public\\img\\apx.png",
            "banner": "public\\img\\banner.jpg",
            "rules": "Reprehenderit qui vero eum. Qui et quos est autem culpa perferendis. Vero omnis ea culpa doloremque dolorem.",
            "description": "Maxime quos sit omnis dolore error reprehenderit et. Harum rerum nisi magni. Qui rerum voluptatem dolorem perspiciatis ut et.",
            "created_at": "2019-03-22 16:58:24",
            "updated_at": "2019-03-22 16:58:24"
        }
    ],
    "users": []
}
```
> Example response (400):

```json
{
    "query": [
        "The query field is required."
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "token": [
        "The token field is required."
    ]
}
```
> Example response (400):

```json
{
    "token_error": "Wrong number of segments"
}
```
> Example response (400):

```json
{
    "token_error": "Token Signature could not be verified."
}
```

### HTTP Request
`POST api/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    query | string |  required  | The query to be searched for (at least 3 characters).
    token | JWT |  required  | Used to verify the user.

<!-- END_9792377865465dfd12bebd73e7326925 -->


<!-- START_09bdc60a87430aec21b4b32b21773baa -->
## Guest Sort Posts
Returns a list of posts in a given ApexCom
sorted either by the votes or by the date when they were created
or by the number of comments.

- When `apexComID` is missing or equals null,
    it returns all the posts in all apexComs.
- When `sortingParam` is missing or equals null, it uses the default value

Use this request only if the user is a guest and not authorized

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. ApexCom is not found (status code 404).
2. There is a server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/sort_posts" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/sort_posts");

    let params = {
            "apexComID": "t5_1",
            "sortingParam": "votes",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "id": "t3_4",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 2
        },
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_2",
            "posted_by": "t2_1",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        }
    ],
    "sortingParam": "comments"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```

### HTTP Request
`GET api/sort_posts`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    apexComID |  optional  | The ID of the ApexComm that contains the posts, default is null.
    sortingParam |  optional  | The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`.

<!-- END_09bdc60a87430aec21b4b32b21773baa -->


<!-- START_422a9a84e2e26d41816d8167e5e45304 -->
## User Sort Posts
Just like [Guest Sort Posts](#guest-sort-posts), except that
it does&#039;t return the posts between blocked users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. ApexCom is not found (status code 404).
2. The `token` is invalid, return a message about the error (status code 400)
3. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/sort_posts" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"apexComID":"t5_1","sortingParam":"votes","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/sort_posts");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "apexComID": "t5_1",
    "sortingParam": "votes",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "id": "t3_4",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 2
        },
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_2",
            "posted_by": "t2_1",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        }
    ],
    "sortingParam": "comments"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "token": [
        "The token field is required."
    ]
}
```
> Example response (400):

```json
{
    "token_error": "Wrong number of segments"
}
```
> Example response (400):

```json
{
    "token_error": "Token Signature could not be verified."
}
```

### HTTP Request
`POST api/sort_posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    apexComID | string |  optional  | The ID of the ApexComm that contains the posts, default is null.
    sortingParam | string |  optional  | The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`.
    token | JWT |  required  | Used to verify the user.

<!-- END_422a9a84e2e26d41816d8167e5e45304 -->


<!-- START_b402718e2399a5ffc349d38706b47a9f -->
## Apex Names
Returns a list of the names and ids of all of the existing ApexComs.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. There is server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/Apex_names" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/Apex_names");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    [
        {
            "id": "t5_10",
            "name": "comics"
        },
        {
            "id": "t5_1",
            "name": "Elder Scrolls"
        },
        {
            "id": "t5_4",
            "name": "foods"
        },
        {
            "id": "t5_3",
            "name": "gaming area"
        },
        {
            "id": "t5_9",
            "name": "health care"
        },
        {
            "id": "t5_7",
            "name": "memes"
        },
        {
            "id": "t5_8",
            "name": "movies"
        },
        {
            "id": "t5_2",
            "name": "New dawn"
        },
        {
            "id": "t5_5",
            "name": "sports area"
        },
        {
            "id": "t5_6",
            "name": "technology"
        }
    ]
]
```

### HTTP Request
`GET api/Apex_names`


<!-- END_b402718e2399a5ffc349d38706b47a9f -->


<!-- START_75042856f5cd6cbf0efd54f67a2e85e8 -->
## getSubscribers
Returns a list of the users subscribed to a certain ApexComm.

Success Cases :
1) Return the result successfully.
failure Cases:
1) Return empty list if there are no subscribers.
2) ApexComm Fullname (ID) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/get_subscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"PHHG9ZsIs1FeFdXR","_token":"TFFMFlqv1NLnEtVB"}'

```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "PHHG9ZsIs1FeFdXR",
    "_token": "TFFMFlqv1NLnEtVB"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```

### HTTP Request
`GET api/get_subscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the subscribers.
    _token | string |  required  | Verifying user ID.

<!-- END_75042856f5cd6cbf0efd54f67a2e85e8 -->




