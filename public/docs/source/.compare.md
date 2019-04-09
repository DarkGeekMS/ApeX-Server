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
    -d '{"id":"J0u0LaKCVqGh46Xi","token":"5JAMjwEE7885q1JK"}'

```

```javascript
const url = new URL("http://localhost/api/del_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "J0u0LaKCVqGh46Xi",
    "token": "5JAMjwEE7885q1JK"
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
    "error": "Not authorized"
}
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
    -d '{"ID":"RGIN92sFoKmpi8GT","token":"5x3DjYSjQK5NtXmb"}'

```

```javascript
const url = new URL("http://localhost/api/read_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "RGIN92sFoKmpi8GT",
    "token": "5x3DjYSjQK5NtXmb"
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
    "error": "Not authorized"
}
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
    -d '{"token":"VCfOeLDriTF4Ji3m"}'

```

```javascript
const url = new URL("http://localhost/api/me");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "VCfOeLDriTF4Ji3m"
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
    -d '{"change_email":"KxXOdt88Wf2ZzFKf","change_password":"vGpIbDO7B7EYN7Bj","deactivate_account":"lksTHie98vRxqkd7","media_autoplay":true,"pm_notifications":false,"replies_notifications":true,"token":"KKFvhIWE7xtfR95g"}'

```

```javascript
const url = new URL("http://localhost/api/updateprefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "KxXOdt88Wf2ZzFKf",
    "change_password": "vGpIbDO7B7EYN7Bj",
    "deactivate_account": "lksTHie98vRxqkd7",
    "media_autoplay": true,
    "pm_notifications": false,
    "replies_notifications": true,
    "token": "KKFvhIWE7xtfR95g"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
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


<!-- START_d9dd108ffd7d5fcce74f2072aeaea32e -->
## prefs
Returns the preferences of the user.

Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/prefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"SuTKo6DTMyyGlZnJ"}'

```

```javascript
const url = new URL("http://localhost/api/prefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "SuTKo6DTMyyGlZnJ"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/prefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_d9dd108ffd7d5fcce74f2072aeaea32e -->


<!-- START_09839bea62c266b3f7446dc71dd248c4 -->
## profileInfo
Displaying the profile info of the user.

Success Cases :
1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/info" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"Mf5TmrMiikUcogjS"}'

```

```javascript
const url = new URL("http://localhost/api/info");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "Mf5TmrMiikUcogjS"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/info`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_09839bea62c266b3f7446dc71dd248c4 -->


<!-- START_c2d21a2d9f4da12e2df2a5662f36d63c -->
## karma
Returns the karma of the user.

Success Cases :
1) return the karmas of the user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/karma" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"dBqPPwUtFb1WnlEF"}'

```

```javascript
const url = new URL("http://localhost/api/karma");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "dBqPPwUtFb1WnlEF"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/karma`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_c2d21a2d9f4da12e2df2a5662f36d63c -->


<!-- START_6be4333f0293eadb670cdacf4092f237 -->
## messages
Returns the inbox messages of the user.

Success Cases :
1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/inbox_messages" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"max":15,"token":"cnoApEM5ME0G3xNa"}'

```

```javascript
const url = new URL("http://localhost/api/inbox_messages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 15,
    "token": "cnoApEM5ME0G3xNa"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/inbox_messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned.
    token | JWT |  required  | Used to verify the user.

<!-- END_6be4333f0293eadb670cdacf4092f237 -->


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
    -d '{"token":"Ar0bvgUgO8765yvn"}'

```

```javascript
const url = new URL("http://localhost/api/sign_out");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "Ar0bvgUgO8765yvn"
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
    -d '{"email":"XMY3GXyrAU2TS83d","username":"Es8rTu3peMdG9tjd","password":"Aj4jgxMLgDhzbkCK"}'

```

```javascript
const url = new URL("http://localhost/api/sign_up");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "XMY3GXyrAU2TS83d",
    "username": "Es8rTu3peMdG9tjd",
    "password": "Aj4jgxMLgDhzbkCK"
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


<!-- START_ae15188c9c0642b2c58e5b4bb8beb57d -->
## login
Validates user&#039;s credentials and logs him in.

Success Cases :
1) return JWT token to ensure that the user loggedin successfully.
failure Cases:
1) username is not found.
2) invalid password.

> Example request:

```bash
curl -X POST "http://localhost/api/sign_in" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"LcEWHDxaPdvdDb85","password":"yxVBjt9z6fxCkXHe"}'

```

```javascript
const url = new URL("http://localhost/api/sign_in");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "LcEWHDxaPdvdDb85",
    "password": "yxVBjt9z6fxCkXHe"
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
`POST api/sign_in`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.

<!-- END_ae15188c9c0642b2c58e5b4bb8beb57d -->


<!-- START_9c2b68d84a5e58731426b62d8716d169 -->
## mailVerify
Send a verification email to the user with a code in case of forgetting password.

Success Cases :
1) return success or failure message to indicate whether the email is sent or not.
failure Cases:
1) username is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/mail_verify" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"P6DxvTrw8LhFqKFa"}'

```

```javascript
const url = new URL("http://localhost/api/mail_verify");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "P6DxvTrw8LhFqKFa"
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
    "msg": "Email sent successfully"
}
```
> Example response (400):

```json
{
    "msg": "Username is not found"
}
```
> Example response (400):

```json
{
    "msg": "Error sending the email"
}
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
1) return success msg to indicate whether the code is valid or not
Failure Cases :
1) Code is invalid.

> Example request:

```bash
curl -X POST "http://localhost/api/check_code" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"code":2,"username":"R4CLGszuqzEgvAHB"}'

```

```javascript
const url = new URL("http://localhost/api/check_code");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": 2,
    "username": "R4CLGszuqzEgvAHB"
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
    "authorized": true
}
```
> Example response (400):

```json
{
    "authorized": false
}
```

### HTTP Request
`POST api/check_code`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | integer |  required  | The entered code.
    username | string |  required  | The user's username.

<!-- END_4b5bbd8dc31ae3073c29c9b679f448b5 -->


#Adminstration

To manage the controls of admins and moderators
<!-- START_2da9e0236ffb9162cb62c0fc316dcf91 -->
## deleteApexCom
Deleting the ApexCom by the admin.

Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X DELETE "http://localhost/api/del_account" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"oUJkBPUx53QIjZMI","token":"M6G3vC4NI9Wtpk9F"}'

```

```javascript
const url = new URL("http://localhost/api/del_account");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "oUJkBPUx53QIjZMI",
    "token": "M6G3vC4NI9Wtpk9F"
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
    "error": "Not authorized"
}
```

### HTTP Request
`DELETE api/del_account`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_2da9e0236ffb9162cb62c0fc316dcf91 -->


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
    -d '{"UserID":"XucRei5C94Eo6Ou9","token":"nze1oepX2ZCIY2Da"}'

```

```javascript
const url = new URL("http://localhost/api/del_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "XucRei5C94Eo6Ou9",
    "token": "nze1oepX2ZCIY2Da"
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
    "error": "Not authorized"
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


<!-- START_fd85770e108112a824ea9fd5c16c7dfc -->
## addModerator
Adding (or Deleting) a moderator to ApexCom.

Success Cases :
1) return true to ensure that the moderator is added successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/api/add_moderator" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"r4PuxhiEGf3NH6pV","token":"Vc8D25LjOnz3tBga","UserID":"sKbmKLMrb16T0tlR"}'

```

```javascript
const url = new URL("http://localhost/api/add_moderator");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "r4PuxhiEGf3NH6pV",
    "token": "Vc8D25LjOnz3tBga",
    "UserID": "sKbmKLMrb16T0tlR"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/add_moderator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexComID | string |  required  | The ID of the ApexCom.
    token | JWT |  required  | Used to verify the Admin ID.
    UserID | string |  required  | The user ID to be added as a moderator.

<!-- END_fd85770e108112a824ea9fd5c16c7dfc -->


#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_1f26a7d3b191a04ab9c1bc160deb8481 -->
## about
to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count).

Success Cases :
1) return the information about the ApexCom.
failure Cases:
1) NoAccessRight the token does not support to view the about information.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/about" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"ynIcVlqY87ajAHsC","token":"6euIKnscK4BtJRW3"}'

```

```javascript
const url = new URL("http://localhost/api/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "ynIcVlqY87ajAHsC",
    "token": "6euIKnscK4BtJRW3"
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
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
{
    "contributers_count": 2,
    "moderators": [
        {
            "userID": "t2_3"
        }
    ],
    "subscribers_count": 0,
    "name": "New dawn",
    "description": "The name says it all.",
    "rules": "NO RULES"
}
```

### HTTP Request
`POST api/about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_1f26a7d3b191a04ab9c1bc160deb8481 -->


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
    -d '{"ApexCom_id":"WX3RlNN6c9iqBRNx","body":"vOBBu3whZ41QLmzS","img_name":"usxl5ZUMpMDRBU1r","video_url":"dDAH3cRmX6tWZTIx","isLocked":true,"token":"6wYLt2epvyNGfGaN"}'

```

```javascript
const url = new URL("http://localhost/api/submit_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "WX3RlNN6c9iqBRNx",
    "body": "vOBBu3whZ41QLmzS",
    "img_name": "usxl5ZUMpMDRBU1r",
    "video_url": "dDAH3cRmX6tWZTIx",
    "isLocked": true,
    "token": "6wYLt2epvyNGfGaN"
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
    "error": "Not authorized"
}
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
    -d '{"ApexCom_id":"bLtBZITSzD8123SM","token":"7yGm7v3WzqlAEqzD"}'

```

```javascript
const url = new URL("http://localhost/api/subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "bLtBZITSzD8123SM",
    "token": "7yGm7v3WzqlAEqzD"
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
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
[
    true
]
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
    -d '{"name":"zURpiT9vDl0mMjJW","description":"VrDhH6wkIPCzXmKE","rules":"nmvWyyCx0IPVnew5","avatar":"TxL3BYydQHvSA4zN","banner":"kTB3ArMsav11Q42m","token":"zSETxEmKBtTNypu1"}'

```

```javascript
const url = new URL("http://localhost/api/site_admin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "zURpiT9vDl0mMjJW",
    "description": "VrDhH6wkIPCzXmKE",
    "rules": "nmvWyyCx0IPVnew5",
    "avatar": "TxL3BYydQHvSA4zN",
    "banner": "kTB3ArMsav11Q42m",
    "token": "zSETxEmKBtTNypu1"
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
> Example response (400):

```json
{
    "error": "No Access Rights to create or edit an ApexCom"
}
```
> Example response (400):

```json
{
    "name": [
        "The name field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The description field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The rules field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The name must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The description must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The rules must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "avatar": [
        "The avatar must be an image."
    ]
}
```
> Example response (200):

```json
[
    true
]
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


<!-- START_931d45747883f17f4898d055e7277e3d -->
## api/about
> Example request:

```bash
curl -X GET -G "http://localhost/api/about" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/about");

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
`GET api/about`


<!-- END_931d45747883f17f4898d055e7277e3d -->


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
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"content":"F0bjsVcNGhsGrgc2","parent":"kQ7zZG4FHpRWDMw2","token":"KT7p6YX0xDyHMxkP"}'

```

```javascript
const url = new URL("http://localhost/api/comment");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "content": "F0bjsVcNGhsGrgc2",
    "parent": "kQ7zZG4FHpRWDMw2",
    "token": "KT7p6YX0xDyHMxkP"
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

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    content | string |  required  | The body of the comment.
    parent | string |  required  | The fullname of the thing to be replied to.
    token | JWT |  required  | Verifying user ID.

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
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"KP3kCsSmrks4KfMT","token":"zsoKzvhrHOc9t3ZA"}'

```

```javascript
const url = new URL("http://localhost/api/delete");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "KP3kCsSmrks4KfMT",
    "token": "zsoKzvhrHOc9t3ZA"
}

fetch(url, {
    method: "DELETE",
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

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to be deleted.
    token | JWT |  required  | Verifying user ID.

<!-- END_4f136192702be68001efc45896913292 -->


<!-- START_2dedef5a7a52cb3e96b8c08067a1b1d5 -->
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
curl -X PATCH "http://localhost/api/edit" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"OWO7ai5adf7WJILl","content":"8Dfrv1WUyZepP9D0","ID":"HnT7tiqlUiRCRUJW"}'

```

```javascript
const url = new URL("http://localhost/api/edit");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "OWO7ai5adf7WJILl",
    "content": "8Dfrv1WUyZepP9D0",
    "ID": "HnT7tiqlUiRCRUJW"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`PATCH api/edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    ID | JWT |  required  | Verifying user ID.

<!-- END_2dedef5a7a52cb3e96b8c08067a1b1d5 -->


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
    -d '{"name":"SCL0Rzye6mEhZeTx","content":"FJzdpuUwJSHozlHu","token":"MZWXGn1AQyy7nAkz"}'

```

```javascript
const url = new URL("http://localhost/api/report");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "SCL0Rzye6mEhZeTx",
    "content": "FJzdpuUwJSHozlHu",
    "token": "MZWXGn1AQyy7nAkz"
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
    name | string |  required  | The fullname of the post,comment or message to report.
    content | string |  optional  | The reason for the report from an associative array.
    token | JWT |  required  | Verifying user ID.

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
    -d '{"name":"ZUlogKqBUvyfG6L5","dir":10,"token":"7v4Q3gd5PWe41mpq"}'

```

```javascript
const url = new URL("http://localhost/api/vote");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ZUlogKqBUvyfG6L5",
    "dir": 10,
    "token": "7v4Q3gd5PWe41mpq"
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
    name | string |  required  | The fullname of the post,comment or reply to vote on.
    dir | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
    token | JWT |  required  | Verifying user ID.

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
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"gK3IEPn9X0MCuYVM","token":"8yIwTya8k3T6egod"}'

```

```javascript
const url = new URL("http://localhost/api/lock_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "gK3IEPn9X0MCuYVM",
    "token": "8yIwTya8k3T6egod"
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

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be locked.
    token | JWT |  required  | Verifying user ID.

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
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"ztHKqzLXK0Mcf2s0","token":"aXOhjsHO6e1etVV2"}'

```

```javascript
const url = new URL("http://localhost/api/Hide");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ztHKqzLXK0Mcf2s0",
    "token": "aXOhjsHO6e1etVV2"
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
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/Hide`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be hidden.
    token | JWT |  required  | Verifying user ID.

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
    -d '{"ID":"mKdHteYW7nlX61JC","token":"nPwfQuZwiZE7MX1G"}'

```

```javascript
const url = new URL("http://localhost/api/save");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "mKdHteYW7nlX61JC",
    "token": "nPwfQuZwiZE7MX1G"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
    token | JWT |  required  | Used to verify the user.

<!-- END_097a5f7f0c0183fb32d32b0e9bba6b31 -->


<!-- START_43ad8fbdbde00499a1f5e68c9d48283a -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).

Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X POST "http://localhost/api/moreComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"n0Jst1qmI9TmRvHX","ID":"qsMfVB9NvDSJdvuO"}'

```

```javascript
const url = new URL("http://localhost/api/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "n0Jst1qmI9TmRvHX",
    "ID": "qsMfVB9NvDSJdvuO"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/moreComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    ID | JWT |  required  | Verifying user ID.

<!-- END_43ad8fbdbde00499a1f5e68c9d48283a -->


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
    -d '{"parent":"K7mRIstuaciB4sBp","ID":"kuIbenDPBZXCDnHi"}'

```

```javascript
const url = new URL("http://localhost/api/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "K7mRIstuaciB4sBp",
    "ID": "kuIbenDPBZXCDnHi"
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
    -d '{"ApexCom_id":"gAQSoraRjKYs3rzi","user_id":"Him8YklNHKnLMujg","_token":"xbuMTHFOxFieC3lp"}'

```

```javascript
const url = new URL("http://localhost/api/block");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "gAQSoraRjKYs3rzi",
    "user_id": "Him8YklNHKnLMujg",
    "_token": "xbuMTHFOxFieC3lp"
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
    "error": "Not authorized"
}
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
    -d '{"report_id":"uvb7Ycfjbbs9tpTJ","_token":"PVtBNP3qLvy97eMc"}'

```

```javascript
const url = new URL("http://localhost/api/report_action");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "uvb7Ycfjbbs9tpTJ",
    "_token": "PVtBNP3qLvy97eMc"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/report_action`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    report_id | string |  required  | The fullname of the report to be ignored.
    _token | JWT |  required  | Verifying user ID.

<!-- END_85b1e06ff0cc2a00de486d21459568f9 -->


<!-- START_6a8a2ddc981aad24b0a9445fed663ae5 -->
## reviewReports
view the reports sent by any user for any post or comment in the ApexCom he is moderator in.

Success Cases :
1) return the reported posts and comments.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/api/review_reports" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"pVcCUnzcOrKU5tTG","_token":"7oIQH9mMVk6Zbt08"}'

```

```javascript
const url = new URL("http://localhost/api/review_reports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "pVcCUnzcOrKU5tTG",
    "_token": "7oIQH9mMVk6Zbt08"
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
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/review_reports`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the reported comments or posts.
    _token | JWT |  required  | Verifying user ID.

<!-- END_6a8a2ddc981aad24b0a9445fed663ae5 -->


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
4. There is a server-side error (status code 500).

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
    "error": "Not authorized"
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
## Compose
Send a private message to another user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. The parameters are valid, return the id of the composed message
   (status code 200)

###Failure Cases:
1. Messaged-user id is not found (status code 404).
2. Invalid token, return a message about the error (status code 400).
3. The users are blocked from each other (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/compose" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"receiver":"t2_1","subject":"Hello","content":"Can I have a date with you?","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/compose");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "receiver": "t2_1",
    "subject": "Hello",
    "content": "Can I have a date with you?",
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
    "id": "t4_1"
}
```
> Example response (404):

```json
{
    "error": "Receiver id is not found"
}
```
> Example response (400):

```json
{
    "error": [
        "blocked users can't message each other"
    ]
}
```
> Example response (400):

```json
{
    "subject": [
        "The subject field is required."
    ]
}
```
> Example response (400):

```json
{
    "reciever": [
        "The receiver field is required."
    ]
}
```
> Example response (400):

```json
{
    "content": [
        "The content field is required."
    ]
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/compose`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    receiver | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    content | text |  required  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_77449fa4952e985b77eff4023c7451dd -->


<!-- START_afac9f990e2b5e3d484085ba83568706 -->
## User Get User Data
Just like [Guest Get User Data](#guest-get-user-data), except that
it does&#039;t return user data between blocked users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. Return the data of the user successfully.

###Failure Cases:
1. User is not found (status code 400).
2. The `token` is invalid, return a message about the error (status code 400).
3. The users are blocked from each other (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/user_data" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"King","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I"}'

```

```javascript
const url = new URL("http://localhost/api/user_data");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "King",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I"
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
    "userData": {
        "username": "King",
        "fullname": "Martin Luther King",
        "karma": 1,
        "avatar": "publicimgdef.png"
    },
    "posts": [
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:32",
            "updated_at": null
        },
        {
            "id": "t3_6",
            "posted_by": "t2_4",
            "apex_id": "t5_2",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:35",
            "updated_at": null
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "User is not found"
}
```
> Example response (400):

```json
{
    "username": [
        "The username field is required."
    ]
}
```
> Example response (400):

```json
{
    "error": "blocked users can't view data of each other"
}
```

### HTTP Request
`POST api/user_data`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The username of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_afac9f990e2b5e3d484085ba83568706 -->


<!-- START_642cf7a37db701458812f02d6082db55 -->
## Guest Get User Data
Return user data to be seen by another user.

User data includes: username, fullname, karma,
 profile picture (URL) and personal posts

Use this request only if the user is a guest and not authorized

###Success Cases :
1.The parameters are valid, return the data of the user successfully
 (status code 200).

###Failure Cases:
1. User is not found (status code 404).
2. There is a server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/user_data" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/user_data");

    let params = {
            "username": "King",
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
    "userData": {
        "username": "King",
        "fullname": "Martin Luther King",
        "karma": 1,
        "avatar": "publicimgdef.png"
    },
    "posts": [
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:32",
            "updated_at": null
        },
        {
            "id": "t3_6",
            "posted_by": "t2_4",
            "apex_id": "t5_2",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:35",
            "updated_at": null
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "User is not found"
}
```
> Example response (400):

```json
{
    "username": [
        "The username field is required."
    ]
}
```

### HTTP Request
`GET api/user_data`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    username |  required  | The username of an existing user.

<!-- END_642cf7a37db701458812f02d6082db55 -->


#general
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
    "error": "Not authorized"
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
    "error": "Not authorized"
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


<!-- START_f97178f40bfc121782991110d19861b1 -->
## getSubscribers
Returns a list of the users subscribed to a certain ApexComm.

Success Cases :
1) Return the result successfully.
failure Cases:
1) Return empty list if there are no subscribers.
2) ApexComm Fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/get_subscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"H778WHiXjHIG1M4a","_token":"TxXjFZloR0hec3Pg"}'

```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "H778WHiXjHIG1M4a",
    "_token": "TxXjFZloR0hec3Pg"
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
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
{
    "subscribers": [
        {
            "id": "t2_1017",
            "fullname": null,
            "email": "ms16@gmail.com",
            "username": "ms16",
            "avatar": "storage\/avatars\/users\/default.png",
            "karma": 1,
            "notification": 1,
            "type": 3,
            "created_at": "2019-03-23 21:34:24",
            "updated_at": "2019-03-23 21:34:24",
            "userID": "t2_1017"
        }
    ]
}
```

### HTTP Request
`POST api/get_subscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the subscribers.
    _token | string |  required  | Verifying user ID.

<!-- END_f97178f40bfc121782991110d19861b1 -->


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
## api/get_subscribers
> Example request:

```bash
curl -X GET -G "http://localhost/api/get_subscribers" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

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
`GET api/get_subscribers`


<!-- END_75042856f5cd6cbf0efd54f67a2e85e8 -->




