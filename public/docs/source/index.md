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
    -d '{"email":"5Ju9y4QEKg3LlaHe","username":"Fip4mCpXeX93yCXI","password":"lPz8HUlOtf9P356K"}'

```

```javascript
const url = new URL("http://localhost/api/sign_up");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "5Ju9y4QEKg3LlaHe",
    "username": "Fip4mCpXeX93yCXI",
    "password": "lPz8HUlOtf9P356K"
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
    -d '{"username":"HOSQHD2QBGkashSg","password":"iE1FRSo6Ts0z9Gku"}'

```

```javascript
const url = new URL("http://localhost/api/Sign_in");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "HOSQHD2QBGkashSg",
    "password": "iE1FRSo6Ts0z9Gku"
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
    -d '{"username":"jy42VbJKyOa0zCH3"}'

```

```javascript
const url = new URL("http://localhost/api/mail_verify");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "jy42VbJKyOa0zCH3"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"code":20}'

```

```javascript
const url = new URL("http://localhost/api/check_code");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"token":"1rfvbiqaLVGaerqw"}'

```

```javascript
const url = new URL("http://localhost/api/sign_out");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "1rfvbiqaLVGaerqw"
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
    -d '{"id":"FeVM4MGf2c8Jumi2","token":"DTZAk65xB3osnMpG"}'

```

```javascript
const url = new URL("http://localhost/api/del_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "FeVM4MGf2c8Jumi2",
    "token": "DTZAk65xB3osnMpG"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"ID":"iSUR6U4HjhfgEzSm","token":"bLSL7KCtbo2EslIQ"}'

```

```javascript
const url = new URL("http://localhost/api/read_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "iSUR6U4HjhfgEzSm",
    "token": "bLSL7KCtbo2EslIQ"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"token":"sMClXysJHkg8rkbu"}'

```

```javascript
const url = new URL("http://localhost/api/me");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "sMClXysJHkg8rkbu"
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
    -d '{"change_email":"RGuD7U3VplBt7mUA","change_password":"g6Hj3UQ7NE18kVWL","deactivate_account":"D27KrbNA4CO6jdKO","media_autoplay":false,"pm_notifications":false,"replies_notifications":true,"token":"pdabW8uJ6sBPM7UG"}'

```

```javascript
const url = new URL("http://localhost/api/updateprefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "RGuD7U3VplBt7mUA",
    "change_password": "g6Hj3UQ7NE18kVWL",
    "deactivate_account": "D27KrbNA4CO6jdKO",
    "media_autoplay": false,
    "pm_notifications": false,
    "replies_notifications": true,
    "token": "pdabW8uJ6sBPM7UG"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"token":"NaoReSLd6H5fbM4u"}'

```

```javascript
const url = new URL("http://localhost/api/prefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "NaoReSLd6H5fbM4u"
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
    -d '{"token":"4TinbL94QVn1eUXj"}'

```

```javascript
const url = new URL("http://localhost/api/info");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "4TinbL94QVn1eUXj"
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
    -d '{"token":"hF4FTejNgZzsBDWU"}'

```

```javascript
const url = new URL("http://localhost/api/karma");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "hF4FTejNgZzsBDWU"
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
    -d '{"max":20,"token":"NJ1VVBwtuDastja5"}'

```

```javascript
const url = new URL("http://localhost/api/messages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 20,
    "token": "NJ1VVBwtuDastja5"
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
<!-- START_be6a8ecb81dc276f7253051c44df54d6 -->
## deleteApexCom
Deleting the ApexCom by the admin.

Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/api/del_ac" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"YXnufTmpt7cC9Cqo","token":"rKPQ7PjhMrnMqK7T"}'

```

```javascript
const url = new URL("http://localhost/api/del_ac");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "YXnufTmpt7cC9Cqo",
    "token": "rKPQ7PjhMrnMqK7T"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/del_ac`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_be6a8ecb81dc276f7253051c44df54d6 -->

<!-- START_ae6be58ef92cf112f862b268c39aaa22 -->
## deleteUser
Delete a user from the application by the admin or self-delete (Account deactivation).

Success Cases :
1) return true to ensure that the user is deleted successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin or the same user token id.

> Example request:

```bash
curl -X POST "http://localhost/api/del_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"FbdE8Gqz9lxAm38l","token":"Qr07hK8WbmZXrhFY"}'

```

```javascript
const url = new URL("http://localhost/api/del_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "FbdE8Gqz9lxAm38l",
    "token": "Qr07hK8WbmZXrhFY"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/del_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    token | JWT |  required  | Used to verify the admin or the same user ID.

<!-- END_ae6be58ef92cf112f862b268c39aaa22 -->

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
    -d '{"ApexComID":"xt0W5rgI2cd5B70C","token":"BELEtj43DssNUrhQ","UserID":"b3PONSB6GYnGJCfA"}'

```

```javascript
const url = new URL("http://localhost/api/add_mod");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "xt0W5rgI2cd5B70C",
    "token": "BELEtj43DssNUrhQ",
    "UserID": "b3PONSB6GYnGJCfA"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"ApexCom_id":"OfZ7PjwNIfXO6R0H","token":"MNPpKzBciqEemnqr"}'

```

```javascript
const url = new URL("http://localhost/api/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "OfZ7PjwNIfXO6R0H",
    "token": "MNPpKzBciqEemnqr"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Undefined property: stdClass::$user",
    "exception": "ErrorException",
    "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\app\\Http\\Controllers\\ApexCom.php",
    "line": 42,
    "trace": [
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\app\\Http\\Controllers\\ApexCom.php",
            "line": 42,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "function": "about",
            "class": "App\\Http\\Controllers\\ApexCom",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 58,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
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
    -d '{"ApexCom_id":"dlxmhcAHfFfLvvS4","body":"X80mjlAPoKFlzMHm","img_name":"HBakVHysfHEzcepn","video_url":"i9WemwHVKrJhtiDB","isLocked":false,"token":"gLRTvOVrUfPS7VfT"}'

```

```javascript
const url = new URL("http://localhost/api/submit_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "dlxmhcAHfFfLvvS4",
    "body": "X80mjlAPoKFlzMHm",
    "img_name": "HBakVHysfHEzcepn",
    "video_url": "i9WemwHVKrJhtiDB",
    "isLocked": false,
    "token": "gLRTvOVrUfPS7VfT"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"ApexCom_id":"GVcnq0nD1aDQoY5f","token":"5gPWAU3K8zgdbvDb"}'

```

```javascript
const url = new URL("http://localhost/api/subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "GVcnq0nD1aDQoY5f",
    "token": "5gPWAU3K8zgdbvDb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"ApexCom_name":"Sye5SId0f9b2U6Vf","description":"Rk08FNaBUVTxRYdO","rules":"NjhbbCHBVVV2CgZ9","img_name":"Qoc7RIybCZRYpNjp","token":"RJvSqRH01H1vlQYr"}'

```

```javascript
const url = new URL("http://localhost/api/site_admin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_name": "Sye5SId0f9b2U6Vf",
    "description": "Rk08FNaBUVTxRYdO",
    "rules": "NjhbbCHBVVV2CgZ9",
    "img_name": "Qoc7RIybCZRYpNjp",
    "token": "RJvSqRH01H1vlQYr"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/site_admin`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_name | string |  required  | The name of the community.
    description | string |  required  | The description of the community.
    rules | string |  required  | The rules of the community.
    img_name | string |  optional  | The attached image to the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_83008eaf25318b2ebea682cd9cd6b43b -->

#Links and comments

controls the comments , replies and private messages for each user
<!-- START_e795fade4d25e2473e7fd22cababfe99 -->
## add
submit a new comment or reply to a comment on a post.

Success Cases :
1) return true to ensure that the comment , reply is added successfully.
failure Cases:
1) post fullname (ID) is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/comment" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"QikSn3IEy499dosu","content":"WbGslmIXg3NjmoS5","parent_ID":"P6et9NETl5H5wJt4","AuthID":"Ym2VWuPMKHl6Lzfe"}'

```

```javascript
const url = new URL("http://localhost/api/comment");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "QikSn3IEy499dosu",
    "content": "WbGslmIXg3NjmoS5",
    "parent_ID": "P6et9NETl5H5wJt4",
    "AuthID": "Ym2VWuPMKHl6Lzfe"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/comment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the comment to be submitted ( comment , reply , message).
    content | string |  required  | The body of the comment.
    parent_ID | string |  required  | The fullname of the thing to be replied to.
    AuthID | JWT |  required  | Verifying user ID.

<!-- END_e795fade4d25e2473e7fd22cababfe99 -->

<!-- START_8d3b774b8525ca92a9eadadb8f46897c -->
## delete
to delete a post or comment or reply from any ApexCom by the owner of the thing or the moderator of this ApexCom.

Success Cases :
1) return true to ensure that the post, comment or reply is deleted successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
3) post , comment or reply fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/DelComment" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"oIO8KQkMTMBqPJVZ","ID":"4mqw2YJlNQF1h9VU"}'

```

```javascript
const url = new URL("http://localhost/api/DelComment");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "oIO8KQkMTMBqPJVZ",
    "ID": "4mqw2YJlNQF1h9VU"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/DelComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to be deleted.
    ID | JWT |  required  | Verifying user ID.

<!-- END_8d3b774b8525ca92a9eadadb8f46897c -->

<!-- START_2a9d0f183252f771e6f2c77616bccd24 -->
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
curl -X POST "http://localhost/api/Edit" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"c81zro48kxW7lMCi","content":"xbNhYVIpWz4q8QPv","ID":"xqxeVoELQa0NZSVU"}'

```

```javascript
const url = new URL("http://localhost/api/Edit");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "c81zro48kxW7lMCi",
    "content": "xbNhYVIpWz4q8QPv",
    "ID": "xqxeVoELQa0NZSVU"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/Edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    ID | JWT |  required  | Verifying user ID.

<!-- END_2a9d0f183252f771e6f2c77616bccd24 -->

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
    -d '{"name":"I2MybGiC6KCwWoXm","Reason":2,"ID":"nnUABoF1w6QZeuFO"}'

```

```javascript
const url = new URL("http://localhost/api/report");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "I2MybGiC6KCwWoXm",
    "Reason": 2,
    "ID": "nnUABoF1w6QZeuFO"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/report`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or message to report.
    Reason | integer |  optional  | The index represent the reason for the report from an associative array.
    ID | JWT |  required  | Verifying user ID.

<!-- END_513d4e19011ae1f92bd8858b5eb059b2 -->

<!-- START_1ce8121bc6bb159652da3758695c4f33 -->
## vote
cast a vote on a post , comment or reply.

Success Cases :
1) return total number of votes on this post,comment or reply.
failure Cases:
1) NoAccessRight token is not authorized.
2) fullname of the thing to vote on is not found.
3) direction of the vote is not integer between -1 , 0 , 1.

> Example request:

```bash
curl -X POST "http://localhost/api/vote" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"yjIV2agQ0s7dc66L","direction":10,"ID":"TQXlWYK04qf7ZThc"}'

```

```javascript
const url = new URL("http://localhost/api/vote");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "yjIV2agQ0s7dc66L",
    "direction": 10,
    "ID": "TQXlWYK04qf7ZThc"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/vote`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to vote on.
    direction | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
    ID | JWT |  required  | Verifying user ID.

<!-- END_1ce8121bc6bb159652da3758695c4f33 -->

<!-- START_4a071a0a5195e750a36b0b89a51e2235 -->
## lock
to lock or unlock a post so it can&#039;t recieve new comments.

Success Cases :
1) return true to ensure that the post was locked.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.
3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.

> Example request:

```bash
curl -X POST "http://localhost/api/lock_post" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"dxhf8TdL2S2LtsOV","ID":"mR4WL51RIpiaDOuw"}'

```

```javascript
const url = new URL("http://localhost/api/lock_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "dxhf8TdL2S2LtsOV",
    "ID": "mR4WL51RIpiaDOuw"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/lock_post`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be locked.
    ID | JWT |  required  | Verifying user ID.

<!-- END_4a071a0a5195e750a36b0b89a51e2235 -->

<!-- START_ebf64eb08a02a3600dbec8e628a60a56 -->
## hide
to hide or UnHide a post from the user view.

Success Cases :
1) return true to ensure that the post hidden.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/Hide" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"rnYDPjoqCGiY9gKh","ID":"O8LfwsnVEkdps8Ry"}'

```

```javascript
const url = new URL("http://localhost/api/Hide");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "rnYDPjoqCGiY9gKh",
    "ID": "O8LfwsnVEkdps8Ry"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/Hide`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be hidden.
    ID | JWT |  required  | Verifying user ID.

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
    -d '{"ID":"xbWJaE6Etj95Dpko","token":"4XtBBqPvDaLwEgPu"}'

```

```javascript
const url = new URL("http://localhost/api/save");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "xbWJaE6Etj95Dpko",
    "token": "4XtBBqPvDaLwEgPu"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
    token | JWT |  required  | Used to verify the user.

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
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"pdhirteFOoRKRDlf","ID":"pqk1i8BC3D1OQXdA"}'

```

```javascript
const url = new URL("http://localhost/api/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "pdhirteFOoRKRDlf",
    "ID": "pqk1i8BC3D1OQXdA"
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
`GET api/moreComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    ID | JWT |  required  | Verifying user ID.

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
    -d '{"ApexCom_id":"1tI2JSYMO5Zv74vS","user_id":"43HVDfZVPeErxlpk","_token":"yaSTpGiQgVwVLcVb"}'

```

```javascript
const url = new URL("http://localhost/api/block");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "1tI2JSYMO5Zv74vS",
    "user_id": "43HVDfZVPeErxlpk",
    "_token": "yaSTpGiQgVwVLcVb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"report_id":"AADZhtIqvGMPIln2","_token":"FVOflMNk2g4mPMK7"}'

```

```javascript
const url = new URL("http://localhost/api/report_action");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "AADZhtIqvGMPIln2",
    "_token": "FVOflMNk2g4mPMK7"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"ApexCom_id":"4hjqXOJHEyhlJoNT","_token":"wvcxYX39wkEWfgNm"}'

```

```javascript
const url = new URL("http://localhost/api/review_reports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "4hjqXOJHEyhlJoNT",
    "_token": "wvcxYX39wkEWfgNm"
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
## block
Block a user, so he can&#039;t send private messages or see the blocked user posts or comments.

Success Cases :
1) return true to ensure that the user is blocked successfully.
failure Cases:
1) blockeduser id is not found or already blocked for the current user.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/block_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"N6MN5IMn1VMSbboq","token":"t863qxsWtHFjYxtV"}'

```

```javascript
const url = new URL("http://localhost/api/block_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "N6MN5IMn1VMSbboq",
    "token": "t863qxsWtHFjYxtV"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/block_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | the id of the user to be blocked.
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
    -d '{"to":"gleATMVOShYvM4pG","subject":"fJAs5hf2M2JYqVKz","mes":"bI4Yx9uZ73ts2u5r","token":"HTOIrj0k84WAwFdA"}'

```

```javascript
const url = new URL("http://localhost/api/compose");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "gleATMVOShYvM4pG",
    "subject": "fJAs5hf2M2JYqVKz",
    "mes": "bI4Yx9uZ73ts2u5r",
    "token": "HTOIrj0k84WAwFdA"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -d '{"id":"b7zhKa1ORcz8zVuE","token":"dNdPTPNW2ZvorqXM"}'

```

```javascript
const url = new URL("http://localhost/api/user_data");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "b7zhKa1ORcz8zVuE",
    "token": "dNdPTPNW2ZvorqXM"
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
## search
Returns a json contains of posts, ApexComs and users that matches the given query.

Success Cases :
1) Return the result successfully.
failure Cases:
1) No matches found.
2) Return response code 500 if there is a server-side error

> Example request:

```bash
curl -X GET -G "http://localhost/api/search" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"query":"mdcxbhZpf1PgNxn4"}'

```

```javascript
const url = new URL("http://localhost/api/search");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "mdcxbhZpf1PgNxn4"
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
    "query": [
        "The query field is required."
    ]
}
```

### HTTP Request
`GET api/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    query | string |  required  | The query to be searched for.

<!-- END_f7828fe70326ce6166fdba9c0c9d80ed -->

<!-- START_09bdc60a87430aec21b4b32b21773baa -->
## sortPostsBy
Returns a list of posts in a given ApexComm sorted either by the votes or by the date when they were created
or by the comments count.

Success Cases :
1) Return the result successfully.
failure Cases:
1) ApexCom fullname (ID) is not found.
2) The given parameter is out of the specified values, in this case it uses the default values.
3) Return response code 500 if there is a server-side error

> Example request:

```bash
curl -X GET -G "http://localhost/api/sort_posts" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"apexComID":"fao94ON9O4lhmXO7","sortingParam":"2Dzf4NxhZxMP9fLX"}'

```

```javascript
const url = new URL("http://localhost/api/sort_posts");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "apexComID": "fao94ON9O4lhmXO7",
    "sortingParam": "2Dzf4NxhZxMP9fLX"
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
    "apexComID": [
        "The apex com i d field is required."
    ]
}
```

### HTTP Request
`GET api/sort_posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    apexComID | string |  required  | The ID of the ApexComm that contains the posts.
    sortingParam | string |  optional  | The sorting parameter, takes a value of ['votes', 'date', 'comments'], Default is 'date'.

<!-- END_09bdc60a87430aec21b4b32b21773baa -->

<!-- START_b402718e2399a5ffc349d38706b47a9f -->
## apexNames
Returns a list of the names and ids of all of the existing ApexComms.

Success Cases :
1) Return the result successfully.
failure Cases:
1) Return response code 500 if there is a server-side error.

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
    {
        "id": "t5_668143",
        "name": "0COYmclyX0"
    },
    {
        "id": "t5_310020",
        "name": "AJMYJpP4QZ"
    },
    {
        "id": "t5_774867",
        "name": "CShwbNJSbX"
    },
    {
        "id": "t5_100000",
        "name": "Elder Scrolls"
    },
    {
        "id": "t5_308699",
        "name": "J54M6qoxFY"
    },
    {
        "id": "t5_931688",
        "name": "MzOJNcJdzb"
    },
    {
        "id": "t5_100001",
        "name": "New dawn"
    },
    {
        "id": "t5_519782",
        "name": "PGkkAoyfmT"
    },
    {
        "id": "t5_102313",
        "name": "uETKi32V9J"
    },
    {
        "id": "t5_242032",
        "name": "VVpS08SHCM"
    },
    {
        "id": "t5_969149",
        "name": "xqPJ5rAGNK"
    },
    {
        "id": "t5_796942",
        "name": "yQmxTL7fkm"
    }
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
    -d '{"ApexCommID":"ralETQpWnKWHanRt","_token":"7qNPsOyGBf6DqF7V"}'

```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "ralETQpWnKWHanRt",
    "_token": "7qNPsOyGBf6DqF7V"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Undefined property: stdClass::$user",
    "exception": "ErrorException",
    "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\app\\Http\\Controllers\\General.php",
    "line": 164,
    "trace": [
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\app\\Http\\Controllers\\General.php",
            "line": 164,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "function": "getSubscribers",
            "class": "App\\Http\\Controllers\\General",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 58,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\DarkGeek Stuff\\BuiltBy Stuff\\College Stuff\\Projects\\Software Engineering\\Apex Server\\ApeX-Server\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
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


