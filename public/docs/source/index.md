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
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## signUp
Registers new user into the website.

Success Cases :
1) return true to ensure that the user created successfully.
failure Cases:
1) verify_password is not the same as the password.
2) username and email are the same.
3) username already exits.
4) email already exists.

> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"email":"PFltwqzsEal5Eutz","username":"Zoa2DBY7lR0Zf7id","password":"MHEE32HLPkVqWVOZ","verify_password":"hrXGdHlIZZu4OTVS","userImage":"1eL6hSl1HlE3mW39"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "PFltwqzsEal5Eutz",
    "username": "Zoa2DBY7lR0Zf7id",
    "password": "MHEE32HLPkVqWVOZ",
    "verify_password": "hrXGdHlIZZu4OTVS",
    "userImage": "1eL6hSl1HlE3mW39"
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
`POST sign_up`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.
    username | string |  required  | The choosen username.
    password | string |  required  | The choosen password.
    verify_password | required |  optional  | string The repeated value of the password.
    userImage | string |  required  | The name of the image for the user.

<!-- END_3a06114e88089d07a3c29bdb6f844602 -->

<!-- START_f2f2bd15a0a3125617af6284631682f0 -->
## login
Validates user&#039;s credentials and logs him in.

Success Cases :
1) return true to ensure that the user loggedin successfully.
failure Cases:
1) username is not found.
2) invalid password.

> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"hxPQlVsXqhtb6tpG","password":"aamWXoXQfpOxOxTB"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "hxPQlVsXqhtb6tpG",
    "password": "aamWXoXQfpOxOxTB"
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
`POST Sign_in`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.

<!-- END_f2f2bd15a0a3125617af6284631682f0 -->

<!-- START_ee941fabd1f02f48390b18f4ed54065e -->
## mailVerify
Send a verification email to the user with a code in case of forgetting password.

Success Cases :
1) return true to ensure that the email has been sent.
failure Cases:
1) username is not found.

> Example request:

```bash
curl -X POST "http://localhost/mail_verify" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"8SgnS7gc0gEVi5nh"}'

```

```javascript
const url = new URL("http://localhost/mail_verify");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "8SgnS7gc0gEVi5nh"
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
`POST mail_verify`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.

<!-- END_ee941fabd1f02f48390b18f4ed54065e -->

<!-- START_f3b96f752218b11aadbca472b737b895 -->
## checkCode
Check whether the user entered the correct reset code sent to his email.

Success Cases :
1) return true to verify the code if it matches (the user is then redirected to the change password page).
failure Cases:
1) Code is invalid.

> Example request:

```bash
curl -X POST "http://localhost/check_code" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"code":9}'

```

```javascript
const url = new URL("http://localhost/check_code");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": 9
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
`POST check_code`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | integer |  required  | The entered code.

<!-- END_f3b96f752218b11aadbca472b737b895 -->

<!-- START_99ada3ad1c00101e557456766317db7b -->
## logout
Logs out a user.

Success Cases :
1) return true to ensure that the user is logout successfully.
failure Cases:
1) user ID already logged out.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"22IdZWxbhHvzUZrX"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "22IdZWxbhHvzUZrX"
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
`POST sign_out`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_99ada3ad1c00101e557456766317db7b -->

<!-- START_cb128bb391940d8304e5ebb273373143 -->
## deleteMsg
Delete private messages from the recipient&#039;s view of their inbox.

Success Cases :
1) return true to ensure that the message is deleted successfully.
failure Cases:
1) message id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"tUj5anTxdxWaBrvi","token":"OU3THpqxERKJTOsm"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "tUj5anTxdxWaBrvi",
    "token": "OU3THpqxERKJTOsm"
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
`POST del_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
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
curl -X POST "http://localhost/read_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"QegkQ3gegHoYSb74","token":"p8KpszoQDf6btxA4"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "QegkQ3gegHoYSb74",
    "token": "p8KpszoQDf6btxA4"
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
`POST read_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The id of the message.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
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
curl -X PATCH "http://localhost/updateprefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"g7LZFWXFGa9mAS1B","change_password":"AWxVNEqri6LDXKIi","deactivate_account":"l5osDYyAdwMbFgxb","media_autoplay":true,"pm_notifications":true,"replies_notifications":false,"token":"7XMzjeLZ6ggV0hFf"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "g7LZFWXFGa9mAS1B",
    "change_password": "AWxVNEqri6LDXKIi",
    "deactivate_account": "l5osDYyAdwMbFgxb",
    "media_autoplay": true,
    "pm_notifications": true,
    "replies_notifications": false,
    "token": "7XMzjeLZ6ggV0hFf"
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
`PATCH updateprefs`

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

<!-- END_e43f1f7cccba02a3ecbce11183ad7aeb -->

<!-- START_ef6e49b2e94875eba15ce9b052785989 -->
## prefs
Returns the preferences of the user.

Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/prefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"5aCachbBt47WxpTW"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "5aCachbBt47WxpTW"
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
`GET prefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_ef6e49b2e94875eba15ce9b052785989 -->

<!-- START_8534272b69ec50dc79d73c26608ba48c -->
## me
Returns the identity of the user logged in.

Success Cases :
1) return the user ID of the sent token.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/me" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"VWi8jEIlnkOaRCnD"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "VWi8jEIlnkOaRCnD"
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
`GET me`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_8534272b69ec50dc79d73c26608ba48c -->

<!-- START_6ced6195e6c39da21a9ac37b11f15624 -->
## profileInfo
Displaying the profile info of the user.

Success Cases :
1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"BCJEY73hQlbQBVuX"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "BCJEY73hQlbQBVuX"
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
`GET info`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_6ced6195e6c39da21a9ac37b11f15624 -->

<!-- START_4849ce4d441fd19425e151ff49985f46 -->
## karma
Returns the karma of the user.

Success Cases :
1) return the karmas of the user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/karma" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"lGaQihlTQK3IWjyC"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "lGaQihlTQK3IWjyC"
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
`GET karma`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_4849ce4d441fd19425e151ff49985f46 -->

<!-- START_792dbb5dfd8db302bbad16e36921d1b0 -->
## messages
Returns the inbox messages of the user.

Success Cases :
1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/messages" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"max":2,"token":"M3V7yUH6f1qqscgi"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 2,
    "token": "M3V7yUH6f1qqscgi"
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
`GET messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned.
    token | JWT |  required  | Used to verify the user.

<!-- END_792dbb5dfd8db302bbad16e36921d1b0 -->

#Adminstration

To manage the controls of admins and moderators
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## deleteApexCom
Deleting the ApexCom by the admin.

Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"UN8YKlsxLJMT5JI8","token":"H5n2BU6eRYWe1KWn"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "UN8YKlsxLJMT5JI8",
    "token": "H5n2BU6eRYWe1KWn"
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
`POST del_ac`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_518c2787d7457d13136ce9ab90c7822b -->

<!-- START_ef7b81f691245619539d9452a88ace88 -->
## deleteUser
Delete a user from the application by the admin or self-delete (Account deactivation).

Success Cases :
1) return true to ensure that the user is deleted successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin or the same user token id.

> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"qnEgo7vvq2pNM4EB","Reason":"pqcwOnGHweAPU1Ap","token":"o7f3vkMRsDR5VNNx"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "qnEgo7vvq2pNM4EB",
    "Reason": "pqcwOnGHweAPU1Ap",
    "token": "o7f3vkMRsDR5VNNx"
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
`POST del_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    Reason | string |  optional  | The reason for deleting the user.
    token | JWT |  required  | Used to verify the admin or the same user ID.

<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## addModerator
Adding (or Deleting) a moderator to ApexCom.

Success Cases :
1) return true to ensure that the moderator is added successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"CAOojw4jodjtoowQ","token":"1Sdj35jkbeAWx1ke","UserID":"rbJtjUpRS4UAyhGZ"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "CAOojw4jodjtoowQ",
    "token": "1Sdj35jkbeAWx1ke",
    "UserID": "rbJtjUpRS4UAyhGZ"
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
`POST add_mod`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexComID | string |  required  | The ID of the ApexCom.
    token | JWT |  required  | Used to verify the Admin ID.
    UserID | string |  required  | The user ID to be added as a moderator.

<!-- END_0277897590e5bd3534956fc7b78f21cd -->

#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## about
to get data about an ApexCom (moderators , contributors , rules , description and subscribers count).

Success Cases :
1) return the information about the ApexCom.
failure Cases:
1) NoAccessRight the token does not support to view the about information.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"z3A6UoDcOuNTm9XS","_token":"nqPGl7EldO6wx2sB"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "z3A6UoDcOuNTm9XS",
    "_token": "nqPGl7EldO6wx2sB"
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
`GET about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community.
    _token | JWT |  required  | Verifying user ID.

<!-- END_f453d442cbe270ed50c2def3a3416115 -->

<!-- START_e9b2e31f2002a2121d116e27b939619f -->
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
curl -X POST "http://localhost/submit_post" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"rT1Kae4NePIEQxV3","body":"Md5NYZhbU6iEfPTG","img_name":"Nko3KTldoXXuJQF3","video_url":"k0oBSaQV3IUsxM8F","isLocked":false,"_token":"bnNpqlt3uHKUb24L"}'

```

```javascript
const url = new URL("http://localhost/submit_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "rT1Kae4NePIEQxV3",
    "body": "Md5NYZhbU6iEfPTG",
    "img_name": "Nko3KTldoXXuJQF3",
    "video_url": "k0oBSaQV3IUsxM8F",
    "isLocked": false,
    "_token": "bnNpqlt3uHKUb24L"
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
`POST submit_post`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the post is posted.
    body | string |  optional  | The text body of the post.
    img_name | string |  optional  | The attached image to the post.
    video_url | string |  optional  | The url to attached video to the post.
    isLocked | boolean |  optional  | To allow or disallow comments on the posted post.
    _token | JWT |  required  | Verifying user ID.

<!-- END_e9b2e31f2002a2121d116e27b939619f -->

<!-- START_7cd1c92845723362129d03191c93e958 -->
## subscribe
for a user to subscribe in any ApexCom.

Success Cases :
1) return true to ensure that the subscription or unsubscribtion has been done successfully.
failure Cases:
1) NoAccessRight the token does not support to subscribe this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"YncQ0Mfkq5yxBn1Z","_token":"mwdQdVu5Ks249mUt"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "YncQ0Mfkq5yxBn1Z",
    "_token": "mwdQdVu5Ks249mUt"
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
`POST subscribe`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community required to be subscribed.
    _token | JWT |  required  | Verifying user ID.

<!-- END_7cd1c92845723362129d03191c93e958 -->

<!-- START_c3bc7678aa26afc45eeb4d785a212851 -->
## siteAdmin
used by the site admin to create new ApexCom.

Success Cases :
1) return true to ensure that the ApexCom was created  successfully.
failure Cases:
1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
2) Wrong or unsufficient submitted information.

> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_name":"LLeDDiAifh67utkZ","description":"iEX2SJk7QP2Q5bAp","rules":"7a1k4a7TGiv1otu7","img_name":"vO6UZkZ0VUvSxwBy","_token":"nUxy6mzkKKMMFf9P"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_name": "LLeDDiAifh67utkZ",
    "description": "iEX2SJk7QP2Q5bAp",
    "rules": "7a1k4a7TGiv1otu7",
    "img_name": "vO6UZkZ0VUvSxwBy",
    "_token": "nUxy6mzkKKMMFf9P"
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
`POST site_admin`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_name | string |  required  | The fullname of the community.
    description | string |  required  | The description of the community.
    rules | string |  required  | The rules of the community.
    img_name | string |  optional  | The attached image to the community.
    _token | JWT |  required  | Verifying user ID.

<!-- END_c3bc7678aa26afc45eeb4d785a212851 -->

#Links and comments

controls the comments , replies and private messages for each user
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## add
submit a new comment or reply to a comment on a post.

Success Cases :
1) return true to ensure that the comment , reply is added successfully.
failure Cases:
1) post fullname (ID) is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"IYznlTBTlmJxjHlY","content":"dv2a3UL0W2YKbMMo","parent_ID":"UNuzigPpQNMprqBe","AuthID":"drnYUYoMmXSh3tLJ"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "IYznlTBTlmJxjHlY",
    "content": "dv2a3UL0W2YKbMMo",
    "parent_ID": "UNuzigPpQNMprqBe",
    "AuthID": "drnYUYoMmXSh3tLJ"
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
`POST comment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the comment to be submitted ( comment , reply , message).
    content | string |  required  | The body of the comment.
    parent_ID | string |  required  | The fullname of the thing to be replied to.
    AuthID | JWT |  required  | Verifying user ID.

<!-- END_4479052af7e53f808c3e66f3a63e68f3 -->

<!-- START_80708de049dc3d985cb6e8aeae33393b -->
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
curl -X POST "http://localhost/DelComment" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"3zt1hcPccFUAn6YW","ID":"5tPmGfAlpZq3Gh0i"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "3zt1hcPccFUAn6YW",
    "ID": "5tPmGfAlpZq3Gh0i"
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
`POST DelComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to be deleted.
    ID | JWT |  required  | Verifying user ID.

<!-- END_80708de049dc3d985cb6e8aeae33393b -->

<!-- START_2daae1bc9e1e0639e200fec2f7f6bb1b -->
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
curl -X POST "http://localhost/Edit" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"5kt7oTs2tjwiBQj5","content":"TsL1he5fwup5w7FM","ID":"hBJ0H7jpe38phjrP"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "5kt7oTs2tjwiBQj5",
    "content": "TsL1he5fwup5w7FM",
    "ID": "hBJ0H7jpe38phjrP"
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
`POST Edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    ID | JWT |  required  | Verifying user ID.

<!-- END_2daae1bc9e1e0639e200fec2f7f6bb1b -->

<!-- START_e6e6c1d8554f35a2b7ff48374ad1e77b -->
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
curl -X POST "http://localhost/report" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"euHWTw85JAxOsSXM","Reason":9,"ID":"jpM2dmDTR1Zpx31o"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "euHWTw85JAxOsSXM",
    "Reason": 9,
    "ID": "jpM2dmDTR1Zpx31o"
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
`POST report`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or message to report.
    Reason | integer |  optional  | The index represent the reason for the report from an associative array.
    ID | JWT |  required  | Verifying user ID.

<!-- END_e6e6c1d8554f35a2b7ff48374ad1e77b -->

<!-- START_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->
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
curl -X POST "http://localhost/vote" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"h8HhCrVzh49EHeXC","direction":19,"ID":"mnmBiRTF43MwnW6q"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "h8HhCrVzh49EHeXC",
    "direction": 19,
    "ID": "mnmBiRTF43MwnW6q"
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
`POST vote`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to vote on.
    direction | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
    ID | JWT |  required  | Verifying user ID.

<!-- END_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->

<!-- START_e397a543c2de11e8173058943ccbae1e -->
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
curl -X POST "http://localhost/lock_post" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"jJn7u0fEaeFhqUsG","ID":"e7vIon4rBh1manLr"}'

```

```javascript
const url = new URL("http://localhost/lock_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "jJn7u0fEaeFhqUsG",
    "ID": "e7vIon4rBh1manLr"
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
`POST lock_post`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be locked.
    ID | JWT |  required  | Verifying user ID.

<!-- END_e397a543c2de11e8173058943ccbae1e -->

<!-- START_e1f157eae6e3907a8770cb8504ae73cb -->
## hide
to hide or UnHide a post from the user view.

Success Cases :
1) return true to ensure that the post hidden.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/Hide" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"R4zGumgUpwHfWOMF","ID":"yxqVhtV30qkHVaXZ"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "R4zGumgUpwHfWOMF",
    "ID": "yxqVhtV30qkHVaXZ"
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
`POST Hide`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be hidden.
    ID | JWT |  required  | Verifying user ID.

<!-- END_e1f157eae6e3907a8770cb8504ae73cb -->

<!-- START_3a7b8eca0c87791144dc77858615f215 -->
## save
Save or UnSave a post or a comment.

Success Cases :
1) return true to ensure that the post saved successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"F8NdbgMt3RnGFl4Y","token":"doB8lVufSX7udAPU"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "F8NdbgMt3RnGFl4Y",
    "token": "doB8lVufSX7udAPU"
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
`POST save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
    token | JWT |  required  | Used to verify the user.

<!-- END_3a7b8eca0c87791144dc77858615f215 -->

<!-- START_5526adab58b86ca220fd6501e7826248 -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).

Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X GET -G "http://localhost/moreComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"RW3Mwel9MrUoLIec","ID":"hoPX29cWZIcGdhC1"}'

```

```javascript
const url = new URL("http://localhost/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "RW3Mwel9MrUoLIec",
    "ID": "hoPX29cWZIcGdhC1"
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
`GET moreComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    ID | JWT |  required  | Verifying user ID.

<!-- END_5526adab58b86ca220fd6501e7826248 -->

#Moderation

Controls the Moderators actions.
<!-- START_10e4d0ba01548f1157b134c2866e29cd -->
## blockUser
to block a user from ApexCom he is moderator in so that he can&#039;t interact in this ApexCom anymore.

Success Cases :
1) return true to ensure that the post or comment is removed successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be removed.
2) user fullname (id) is not found , already blocked or not subscribed in this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/block" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"1WswQBnfCQaFLeC5","user_id":"HU6gsOl2IAqE3wLi","_token":"NeYQh8R88QIiuSLi"}'

```

```javascript
const url = new URL("http://localhost/block");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "1WswQBnfCQaFLeC5",
    "user_id": "HU6gsOl2IAqE3wLi",
    "_token": "NeYQh8R88QIiuSLi"
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
`POST block`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the user is blocked.
    user_id | string |  required  | The fullname of the user to be blocked.
    _token | string |  required  | Verifying user ID.

<!-- END_10e4d0ba01548f1157b134c2866e29cd -->

<!-- START_7d644ee67f837554ee42b61c3180377e -->
## ignoreReport
to delete the ignored report from  ApexCom&#039;s reports.

Success Cases :
1) return true to ensure that the report is deleted successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
2) report fullname (id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/report_action" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"report_id":"c3wzbO8V1phDleh9","_token":"wiCwPK1nDSp3fRgC"}'

```

```javascript
const url = new URL("http://localhost/report_action");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "c3wzbO8V1phDleh9",
    "_token": "wiCwPK1nDSp3fRgC"
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
`POST report_action`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    report_id | string |  required  | The fullname of the report to be ignored.
    _token | string |  required  | Verifying user ID.

<!-- END_7d644ee67f837554ee42b61c3180377e -->

<!-- START_ce137a9fb84ef6789f44be899ecab3fe -->
## reviewReports
view the reports sent by any user for any post or comment in the ApexCom he is moderator in.

Success Cases :
1) return the reported posts and comments.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.

> Example request:

```bash
curl -X GET -G "http://localhost/review_reports" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"G5HHZleldOUcsyre","_token":"6C5jUj4NHLh35Vc0"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "G5HHZleldOUcsyre",
    "_token": "6C5jUj4NHLh35Vc0"
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
`GET review_reports`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the reported comments or posts.
    _token | string |  required  | Verifying user ID.

<!-- END_ce137a9fb84ef6789f44be899ecab3fe -->

#User

Control the user interaction with other users
<!-- START_1a7af546cd175bbafae3c156085b8064 -->
## block
Block a user, so he can&#039;t send private messages or see the blocked user posts or comments.

Success Cases :
1) return true to ensure that the user is blocked successfully.
failure Cases:
1) blockeduser id is not found or already blocked for the current user.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"M09GYaf2XTM7R7Vg","token":"MgomzP6DaSDp1Zsr"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "M09GYaf2XTM7R7Vg",
    "token": "MgomzP6DaSDp1Zsr"
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
`POST block_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<!-- END_1a7af546cd175bbafae3c156085b8064 -->

<!-- START_9a86fc0b67608be77b22a771d49949db -->
## compose
Send a private message to another user.

Success Cases :
1) return true to ensure that the message sent successfully.
failure Cases:
1) messaged-user id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"to":"WEUycjnuWk0cUkWp","subject":"Y3zaAvFcUwpESwEb","mes":"tN2cbmAMrSQwCpib","token":"EtXwPyYYbBXrEQCx"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "WEUycjnuWk0cUkWp",
    "subject": "Y3zaAvFcUwpESwEb",
    "mes": "tN2cbmAMrSQwCpib",
    "token": "EtXwPyYYbBXrEQCx"
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
`POST compose`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    to | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    mes | text |  optional  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_9a86fc0b67608be77b22a771d49949db -->

<!-- START_6b60bbfb91f5581a2b2f1932856691c2 -->
## userDataByAccountID
Return user public data to be seen by another user.

Success Cases :
1) return the data of the user successfully.
failure Cases:
1) username is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"eZQp5tiYIOz0MySr","token":"OnouftyzDhhwBSXB"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "eZQp5tiYIOz0MySr",
    "token": "OnouftyzDhhwBSXB"
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
`GET user_data`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_6b60bbfb91f5581a2b2f1932856691c2 -->

#general
<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## search
Returns a list of lists of ApexComs, posts and profiles that matches the given query.

Success Cases :
1) Return the result successfully.
failure Cases:
1) No matches found.

> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"query":"LvlvdKEazgTtV14p"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "LvlvdKEazgTtV14p"
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
`GET search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    query | string |  required  | The query to be searched for.

<!-- END_c0f505b72e10817948e65eb5eb744708 -->

<!-- START_05b3f813d60fda460fbe53c065926a61 -->
## sortPostsBy
Returns a list of posts in a given ApexComm sorted either by the votes or by the date.

Success Cases :
1) Return the result successfully.
failure Cases:
1) ApexComm fullname (ID) is not found.
2) The given parameter is out of the specified values, in this case it uses the default values.

> Example request:

```bash
curl -X GET -G "http://localhost/sort_posts" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"YNL2AYkKaW4mwaE8","SortingParam":"Il8ocWBthH5BPzBo"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "YNL2AYkKaW4mwaE8",
    "SortingParam": "Il8ocWBthH5BPzBo"
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
`GET sort_posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the posts.
    SortingParam | string |  optional  | The sorting parameter, takes a value of ['votes', 'date'], Default is 'date'.

<!-- END_05b3f813d60fda460fbe53c065926a61 -->

<!-- START_aab40918c3a3f4e3512a9b2c1177ea2b -->
## apexNames
Returns a list of the names of the existing ApexComms.

Success Cases :
1) Return the result successfully.
failure Cases:
1) Return empty list if there are no existing ApexComms.

> Example request:

```bash
curl -X GET -G "http://localhost/Apex_names" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/Apex_names");

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
`GET Apex_names`


<!-- END_aab40918c3a3f4e3512a9b2c1177ea2b -->

<!-- START_06944a72aa732126f3e27ad338662810 -->
## getSubscribers
Returns a list of the users subscribed to a certain ApexComm.

Success Cases :
1) Return the result successfully.
failure Cases:
1) Return empty list if there are no subscribers.
2) ApexComm Fullname (ID) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/get_subscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"zcdUmkXthffjXCdT","_token":"iuTrK85Af63hTkfA"}'

```

```javascript
const url = new URL("http://localhost/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "zcdUmkXthffjXCdT",
    "_token": "iuTrK85Af63hTkfA"
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
`GET get_subscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the subscribers.
    _token | string |  required  | Verifying user ID.

<!-- END_06944a72aa732126f3e27ad338662810 -->


