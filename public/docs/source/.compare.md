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

Controls the authentication, info and messages of the accounts.
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## Registers new user into the website by storing their email, username and password.

> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"email":"NFhC8ByCA2bjCAlD","username":"HIPBGNGrbTK73AoN","password":"xE8MvzAmMyaZmWOu","verify_password":"EAPAngUs0F6MxVmx"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "NFhC8ByCA2bjCAlD",
    "username": "HIPBGNGrbTK73AoN",
    "password": "xE8MvzAmMyaZmWOu",
    "verify_password": "EAPAngUs0F6MxVmx"
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
    "token": "eyJhbGciOiJIUz.JV_adQssw5c.swdwhewfw"
}
```
> Example response (406):

```json
{
    "message": "Username already exists"
}
```
> Example response (406):

```json
{
    "message": "Email already exists"
}
```
> Example response (406):

```json
{
    "message": "Passwords don't match"
}
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

<!-- END_3a06114e88089d07a3c29bdb6f844602 -->

<!-- START_f2f2bd15a0a3125617af6284631682f0 -->
## Validates user&#039;s credentials and logs him in.

> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Content-Type: application/json" \
    -d '{"username":"PGziSKktTVWmGUXt","password":"LVvufqaTwdKpTi3R","remember_me":true}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "PGziSKktTVWmGUXt",
    "password": "LVvufqaTwdKpTi3R",
    "remember_me": true
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
    "token": "eyJhbGciOiJIUz.JV_adQssw5c.swdwhewfw"
}
```
> Example response (406):

```json
{
    "message": "Username is not found"
}
```
> Example response (406):

```json
{
    "message": "Wrong password for the given username"
}
```

### HTTP Request
`POST Sign_in`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.
    remember_me | boolean |  required  | whether to keep the user logged in or not.

<!-- END_f2f2bd15a0a3125617af6284631682f0 -->

<!-- START_99ada3ad1c00101e557456766317db7b -->
## Logs out a user.

> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Content-Type: application/json" \
    -d '{"token":"m9oIePlkxymQE5hY"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "m9oIePlkxymQE5hY"
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
    "message": 1
}
```
> Example response (406):

```json
{
    "message": "Already logged out"
}
```

### HTTP Request
`POST sign_out`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_99ada3ad1c00101e557456766317db7b -->

<!-- START_cb128bb391940d8304e5ebb273373143 -->
## Delete private messages from the recipient&#039;s view of their inbox.

> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":19,"token":"OYvfxW0p7FnTXpFx"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 19,
    "token": "OYvfxW0p7FnTXpFx"
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
    "message": 1
}
```
> Example response (403):

```json
{
    "message": "User doesn't have access to the given message"
}
```

### HTTP Request
`POST del_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
## Delete private messages from the recipient&#039;s view of their inbox

> Example request:

```bash
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":3,"token":"y96wNEshxLDSJMHC"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 3,
    "token": "y96wNEshxLDSJMHC"
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
    "message": 1
}
```
> Example response (403):

```json
{
    "message": "User doesn't have access to the given message"
}
```

### HTTP Request
`POST read_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
## Updates the preferences of the user

> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"sHaMsp2MVtM5v5Tl","change_password":"ROBLtbxngk67NoFi","deactivate_account":"y3iOywB6RH91VHFV","media_autoplay":true,"pm_notifications":true,"replies_notifications":true,"token":"yPXN0Bxwya6nTXRe"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "sHaMsp2MVtM5v5Tl",
    "change_password": "ROBLtbxngk67NoFi",
    "deactivate_account": "y3iOywB6RH91VHFV",
    "media_autoplay": true,
    "pm_notifications": true,
    "replies_notifications": true,
    "token": "yPXN0Bxwya6nTXRe"
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
{
    "message": 1
}
```
> Example response (403):

```json
{
    "message": "User doesn't have access to the given message"
}
```

### HTTP Request
`PATCH updateprefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    change_email | string |  required  | Enable changing the email
    change_password | string |  required  | Enable changing the password
    deactivate_account | string |  optional  | Enable deactivating the account
    media_autoplay | boolean |  optional  | Enabling media autoplay
    pm_notifications | boolean |  optional  | Enable pm notifications
    replies_notifications | boolean |  optional  | Enable notifications for replies
    token | JWT |  required  | Used to verify the user.

<!-- END_e43f1f7cccba02a3ecbce11183ad7aeb -->

<!-- START_ef6e49b2e94875eba15ce9b052785989 -->
## Returns the preferences of the user.

> Example request:

```bash
curl -X GET -G "http://localhost/prefs" \
    -H "Content-Type: application/json" \
    -d '{"token":"6lR5NkSfU3oP7d6b"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "6lR5NkSfU3oP7d6b"
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
{
    "change_email": 1,
    "change_password": 0,
    "deactivate_account": 1,
    "media_autoplay": 0,
    "pm_notifications": 1,
    "replies_notifications": 0
}
```
> Example response (403):

```json
{
    "message": "Cannot authorize the user"
}
```

### HTTP Request
`GET prefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_ef6e49b2e94875eba15ce9b052785989 -->

<!-- START_8534272b69ec50dc79d73c26608ba48c -->
## Returns the identity of the user logged in

> Example request:

```bash
curl -X GET -G "http://localhost/me" \
    -H "Content-Type: application/json" \
    -d '{"token":"B7Srw145A1LYI6hK"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "B7Srw145A1LYI6hK"
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
{
    "username": "Regina Falange"
}
```
> Example response (403):

```json
{
    "message": "Cannot authorize the user"
}
```

### HTTP Request
`GET me`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_8534272b69ec50dc79d73c26608ba48c -->

<!-- START_6ced6195e6c39da21a9ac37b11f15624 -->
## info
> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Content-Type: application/json" \
    -d '{"title":"UvsKtdsTwtcdSZzm","body":"ySSHKSbRPUrvF7v4","type":"sDw4o2nYLli9zdxv","author_id":17,"thumbnail":"FBeyEsaLr59xiENv"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "UvsKtdsTwtcdSZzm",
    "body": "ySSHKSbRPUrvF7v4",
    "type": "sDw4o2nYLli9zdxv",
    "author_id": 17,
    "thumbnail": "FBeyEsaLr59xiENv"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_6ced6195e6c39da21a9ac37b11f15624 -->

<!-- START_4849ce4d441fd19425e151ff49985f46 -->
## Returns the karma of the user
* @bodyParam token JWT required Used to verify the user.

> Example request:

```bash
curl -X GET -G "http://localhost/karma" 
```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
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
    "karma": 4
}
```
> Example response (403):

```json
{
    "message": "Cannot authorize the user"
}
```

### HTTP Request
`GET karma`


<!-- END_4849ce4d441fd19425e151ff49985f46 -->

<!-- START_792dbb5dfd8db302bbad16e36921d1b0 -->
## Returns a listing of the messages of the user

> Example request:

```bash
curl -X GET -G "http://localhost/messages" \
    -H "Content-Type: application/json" \
    -d '{"max":4,"token":"mLRa8UR0urM9NlhO"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 4,
    "token": "mLRa8UR0urM9NlhO"
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
{
    "after": "msg_110",
    "limit": 14
}
```
> Example response (403):

```json
{
    "message": "Cannot authorize the user"
}
```

### HTTP Request
`GET messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned
    token | JWT |  required  | Used to verify the user.

<!-- END_792dbb5dfd8db302bbad16e36921d1b0 -->

#Links and comments

controls the comments , replies and private messages for each user
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## comment
> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Content-Type: application/json" \
    -d '{"fullname":"5tCtA6J8XZDzGKOA","content":"9poJLapFLVoW0qP5","type":"wlQr8FC38OCuVGlO","author_id":19,"thumbnail":"jNPKpAN8jlXWWxLf"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "fullname": "5tCtA6J8XZDzGKOA",
    "content": "9poJLapFLVoW0qP5",
    "type": "wlQr8FC38OCuVGlO",
    "author_id": 19,
    "thumbnail": "jNPKpAN8jlXWWxLf"
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
    fullname | string |  required  | The type of the comment ( comment, reply , message).
    content | string |  required  | The body of the request.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_4479052af7e53f808c3e66f3a63e68f3 -->

<!-- START_80708de049dc3d985cb6e8aeae33393b -->
## DelComment
> Example request:

```bash
curl -X POST "http://localhost/DelComment" \
    -H "Content-Type: application/json" \
    -d '{"title":"wYRz2Kuu2V9Qzq83","body":"UIgCbNf82oHye6r1","type":"VwBqSPPA5jmCnX5e","author_id":1,"thumbnail":"oGWJxiOLWAnaPAi4"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "wYRz2Kuu2V9Qzq83",
    "body": "UIgCbNf82oHye6r1",
    "type": "VwBqSPPA5jmCnX5e",
    "author_id": 1,
    "thumbnail": "oGWJxiOLWAnaPAi4"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_80708de049dc3d985cb6e8aeae33393b -->

<!-- START_2daae1bc9e1e0639e200fec2f7f6bb1b -->
## Edit
> Example request:

```bash
curl -X POST "http://localhost/Edit" \
    -H "Content-Type: application/json" \
    -d '{"title":"5jvmPCbEiNv2XSnk","body":"5cbrIMUfKyXpZjaN","type":"f7KG31IFYqnvLLGK","author_id":9,"thumbnail":"4kLtfNZTmaRw9g96"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "5jvmPCbEiNv2XSnk",
    "body": "5cbrIMUfKyXpZjaN",
    "type": "f7KG31IFYqnvLLGK",
    "author_id": 9,
    "thumbnail": "4kLtfNZTmaRw9g96"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_2daae1bc9e1e0639e200fec2f7f6bb1b -->

<!-- START_e1f157eae6e3907a8770cb8504ae73cb -->
## Hide
> Example request:

```bash
curl -X POST "http://localhost/Hide" \
    -H "Content-Type: application/json" \
    -d '{"title":"BpTqbyAqWatfkrS7","body":"oY8rrxWVQBRs8Hrp","type":"qFOHu8zsfVurfD11","author_id":18,"thumbnail":"3FGoCM1QWQhhlj3U"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "BpTqbyAqWatfkrS7",
    "body": "oY8rrxWVQBRs8Hrp",
    "type": "qFOHu8zsfVurfD11",
    "author_id": 18,
    "thumbnail": "3FGoCM1QWQhhlj3U"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_e1f157eae6e3907a8770cb8504ae73cb -->

<!-- START_9019195c37b05d719ab1635b6943d714 -->
## unhide
> Example request:

```bash
curl -X POST "http://localhost/unhide" \
    -H "Content-Type: application/json" \
    -d '{"title":"1pkm5f8okha95wZo","body":"Su1VYZ2ZpTdyrNu3","type":"20IeQGA0pHWjmG8P","author_id":2,"thumbnail":"6LKn0pzcOmY0kgI7"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "1pkm5f8okha95wZo",
    "body": "Su1VYZ2ZpTdyrNu3",
    "type": "20IeQGA0pHWjmG8P",
    "author_id": 2,
    "thumbnail": "6LKn0pzcOmY0kgI7"
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
`POST unhide`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_9019195c37b05d719ab1635b6943d714 -->

<!-- START_58c5fce5cfff0b2cfa4144dc5f083c44 -->
## moreComm
> Example request:

```bash
curl -X POST "http://localhost/moreComm" \
    -H "Content-Type: application/json" \
    -d '{"title":"NihugjTNpTCOzQP2","body":"JUOxo174BTo3ji87","type":"uGuJrOJ3fPv74mSd","author_id":14,"thumbnail":"I6HFIN1sUXRFCugE"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "NihugjTNpTCOzQP2",
    "body": "JUOxo174BTo3ji87",
    "type": "uGuJrOJ3fPv74mSd",
    "author_id": 14,
    "thumbnail": "I6HFIN1sUXRFCugE"
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
`POST moreComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_58c5fce5cfff0b2cfa4144dc5f083c44 -->

<!-- START_e6e6c1d8554f35a2b7ff48374ad1e77b -->
## report
> Example request:

```bash
curl -X POST "http://localhost/report" \
    -H "Content-Type: application/json" \
    -d '{"title":"AFeDmyhMupYASWpy","body":"kWoFvgQpCUEZK6Gq","type":"3g3Jq3mfWjGGx3XT","author_id":18,"thumbnail":"vL2AwV71KKh8vOIk"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "AFeDmyhMupYASWpy",
    "body": "kWoFvgQpCUEZK6Gq",
    "type": "3g3Jq3mfWjGGx3XT",
    "author_id": 18,
    "thumbnail": "vL2AwV71KKh8vOIk"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_e6e6c1d8554f35a2b7ff48374ad1e77b -->

<!-- START_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->
## vote
> Example request:

```bash
curl -X POST "http://localhost/vote" \
    -H "Content-Type: application/json" \
    -d '{"title":"1cldLpwDKwB1OzDa","body":"pAwNg4Ddbggakmwd","type":"2QuPnV2wdW0QiLZP","author_id":7,"thumbnail":"cmBw1Roqf1bnfG1m"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "1cldLpwDKwB1OzDa",
    "body": "pAwNg4Ddbggakmwd",
    "type": "2QuPnV2wdW0QiLZP",
    "author_id": 7,
    "thumbnail": "cmBw1Roqf1bnfG1m"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->

<!-- START_3a7b8eca0c87791144dc77858615f215 -->
## save
> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Content-Type: application/json" \
    -d '{"title":"VpXPQH5UhLW3KBeP","body":"XprZDuYzHn6eQc6M","type":"2L5Cm9yVvEaJJNDr","author_id":9,"thumbnail":"Qp7LZHj4fk9Daqm3"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "VpXPQH5UhLW3KBeP",
    "body": "XprZDuYzHn6eQc6M",
    "type": "2L5Cm9yVvEaJJNDr",
    "author_id": 9,
    "thumbnail": "Qp7LZHj4fk9Daqm3"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_3a7b8eca0c87791144dc77858615f215 -->

<!-- START_c73ea2693dc9203931a2533cdef33d33 -->
## unsave
> Example request:

```bash
curl -X POST "http://localhost/unsave" \
    -H "Content-Type: application/json" \
    -d '{"title":"7bhWT8SVzTiICC6g","body":"RwuzGnqR56k2WJl5","type":"StKffWZhMZOtSCYz","author_id":17,"thumbnail":"dDuJigB6OXXG4QWt"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "7bhWT8SVzTiICC6g",
    "body": "RwuzGnqR56k2WJl5",
    "type": "StKffWZhMZOtSCYz",
    "author_id": 17,
    "thumbnail": "dDuJigB6OXXG4QWt"
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
`POST unsave`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_c73ea2693dc9203931a2533cdef33d33 -->

#User

Controls the user interaction with other users
<!-- START_1a7af546cd175bbafae3c156085b8064 -->
## Block a user, so he can&#039;t send private messages to the current user

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"id":"sxezgVMRshURqg8a","token":"mKPlX8ohbk0qFGZR"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "sxezgVMRshURqg8a",
    "token": "mKPlX8ohbk0qFGZR"
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
## Send a private message to another user

> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"to":"4iKgqzeYFeVcaRzI","subject":"Y9SpUq9dC14XUAdn","mes":"WTgdKAe23PLygbMn","token":"ZvK7KJn3TzQlbDgB"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "4iKgqzeYFeVcaRzI",
    "subject": "Y9SpUq9dC14XUAdn",
    "mes": "WTgdKAe23PLygbMn",
    "token": "ZvK7KJn3TzQlbDgB"
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
## Return user public data to be seen by another user

> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"id":"d5Uk86lZdgnL4x1F","token":"ikgzEDBFN6JcNyZj"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "d5Uk86lZdgnL4x1F",
    "token": "ikgzEDBFN6JcNyZj"
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
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## del_ac
> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"title":"bK3m9PaT7jeGGlF5","body":"DMpSSznIH0imxgLX","type":"92sJ2nRrRu9IPlJK","author_id":13,"thumbnail":"syzP89nctNBx08pV"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "bK3m9PaT7jeGGlF5",
    "body": "DMpSSznIH0imxgLX",
    "type": "92sJ2nRrRu9IPlJK",
    "author_id": 13,
    "thumbnail": "syzP89nctNBx08pV"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_518c2787d7457d13136ce9ab90c7822b -->

<!-- START_ef7b81f691245619539d9452a88ace88 -->
## del_user
> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Content-Type: application/json" \
    -d '{"title":"03xGSn3TBDz3wP4i","body":"YEiDF1ZB3RHhkeBX","type":"UMo4O5Ospv74LeYv","author_id":4,"thumbnail":"Oj1OkBFY9qUyOvnq"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "03xGSn3TBDz3wP4i",
    "body": "YEiDF1ZB3RHhkeBX",
    "type": "UMo4O5Ospv74LeYv",
    "author_id": 4,
    "thumbnail": "Oj1OkBFY9qUyOvnq"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## add_mod
> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Content-Type: application/json" \
    -d '{"title":"qDhEuewLKa3gAi0V","body":"DpekK8uscHq5nAB6","type":"7a6QUSHrTVle1eIM","author_id":12,"thumbnail":"Hd1XuKO0K0O0f4pd"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qDhEuewLKa3gAi0V",
    "body": "DpekK8uscHq5nAB6",
    "type": "7a6QUSHrTVle1eIM",
    "author_id": 12,
    "thumbnail": "Hd1XuKO0K0O0f4pd"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_0277897590e5bd3534956fc7b78f21cd -->

<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## about
> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Content-Type: application/json" \
    -d '{"title":"3sxbu5ERLnGbZUK3","body":"o8jutMlzplJuvpPR","type":"KocF84lkCq2qFdM3","author_id":18,"thumbnail":"kD7oT6Y07hZoxoFg"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "3sxbu5ERLnGbZUK3",
    "body": "o8jutMlzplJuvpPR",
    "type": "KocF84lkCq2qFdM3",
    "author_id": 18,
    "thumbnail": "kD7oT6Y07hZoxoFg"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_f453d442cbe270ed50c2def3a3416115 -->

<!-- START_7a7f674c347aaf46c9a4d9ea95713236 -->
## posts
> Example request:

```bash
curl -X POST "http://localhost/posts" \
    -H "Content-Type: application/json" \
    -d '{"title":"nPTJXUtKc6ISXZrL","body":"leVzHWwmnDnfQduS","type":"pPR4p7ZAVMaoFL7b","author_id":14,"thumbnail":"7CNnRYSATKVRuYTR"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "nPTJXUtKc6ISXZrL",
    "body": "leVzHWwmnDnfQduS",
    "type": "pPR4p7ZAVMaoFL7b",
    "author_id": 14,
    "thumbnail": "7CNnRYSATKVRuYTR"
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
`POST posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_7a7f674c347aaf46c9a4d9ea95713236 -->

<!-- START_7cd1c92845723362129d03191c93e958 -->
## subscribe
> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Content-Type: application/json" \
    -d '{"title":"5wiJyObBEL2qz66w","body":"grbmLpWMC7k5wEr6","type":"Xx7NViWhp3ZYZGQI","author_id":6,"thumbnail":"OK1WGHMxZ5x6KUwN"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "5wiJyObBEL2qz66w",
    "body": "grbmLpWMC7k5wEr6",
    "type": "Xx7NViWhp3ZYZGQI",
    "author_id": 6,
    "thumbnail": "OK1WGHMxZ5x6KUwN"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_7cd1c92845723362129d03191c93e958 -->

<!-- START_c3bc7678aa26afc45eeb4d785a212851 -->
## site_admin
> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Content-Type: application/json" \
    -d '{"title":"Z0JfN40wTATe8TKN","body":"4HrvR8s9hlJBCdt0","type":"D5oD3U2eGuSmpTjB","author_id":17,"thumbnail":"4UYrz89PnrCgLvY6"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Z0JfN40wTATe8TKN",
    "body": "4HrvR8s9hlJBCdt0",
    "type": "D5oD3U2eGuSmpTjB",
    "author_id": 17,
    "thumbnail": "4UYrz89PnrCgLvY6"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_c3bc7678aa26afc45eeb4d785a212851 -->

<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## search
> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Content-Type: application/json" \
    -d '{"title":"H7BWs2EbHrUeRYPS","body":"51pwE3FEuNdCbqfH","type":"ZN1MLeRu3jbU8HD4","author_id":14,"thumbnail":"TpLCXY7986zp3MRn"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "H7BWs2EbHrUeRYPS",
    "body": "51pwE3FEuNdCbqfH",
    "type": "ZN1MLeRu3jbU8HD4",
    "author_id": 14,
    "thumbnail": "TpLCXY7986zp3MRn"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_c0f505b72e10817948e65eb5eb744708 -->

<!-- START_05b3f813d60fda460fbe53c065926a61 -->
## sort_posts
> Example request:

```bash
curl -X GET -G "http://localhost/sort_posts" \
    -H "Content-Type: application/json" \
    -d '{"title":"ldeKGmzLlbYMJazM","body":"JEt8JHS01xXQXMje","type":"p7gzPNZg2b2mC77L","author_id":10,"thumbnail":"szpCi5KMXwUvgRgV"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ldeKGmzLlbYMJazM",
    "body": "JEt8JHS01xXQXMje",
    "type": "p7gzPNZg2b2mC77L",
    "author_id": 10,
    "thumbnail": "szpCi5KMXwUvgRgV"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_05b3f813d60fda460fbe53c065926a61 -->

<!-- START_aab40918c3a3f4e3512a9b2c1177ea2b -->
## Apex_names
> Example request:

```bash
curl -X GET -G "http://localhost/Apex_names" \
    -H "Content-Type: application/json" \
    -d '{"title":"qCB0Lbthue1Ivhvo","body":"78N8YuV3FKXJXlly","type":"IKcN8F1GykcOFw41","author_id":20,"thumbnail":"FW0PZuUQllDtwlBk"}'

```

```javascript
const url = new URL("http://localhost/Apex_names");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qCB0Lbthue1Ivhvo",
    "body": "78N8YuV3FKXJXlly",
    "type": "IKcN8F1GykcOFw41",
    "author_id": 20,
    "thumbnail": "FW0PZuUQllDtwlBk"
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
`GET Apex_names`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_aab40918c3a3f4e3512a9b2c1177ea2b -->

<!-- START_b885f7f4714d80477084c1fd4bf3e729 -->
## remove
> Example request:

```bash
curl -X POST "http://localhost/remove" \
    -H "Content-Type: application/json" \
    -d '{"title":"YKsC7cT1z2llAek1","body":"oJ1lMAsgDHEMGzZ6","type":"LdD34qwMdqS3Vaox","author_id":17,"thumbnail":"V751HmpothMMre1f"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "YKsC7cT1z2llAek1",
    "body": "oJ1lMAsgDHEMGzZ6",
    "type": "LdD34qwMdqS3Vaox",
    "author_id": 17,
    "thumbnail": "V751HmpothMMre1f"
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
`POST remove`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_b885f7f4714d80477084c1fd4bf3e729 -->

<!-- START_e5b66986dff827722971ce82b286d979 -->
## approve
> Example request:

```bash
curl -X POST "http://localhost/approve" \
    -H "Content-Type: application/json" \
    -d '{"title":"g5CtKYugZVALOwct","body":"jtx3o1vbZcikCHYU","type":"thuC2bhDiiWpzdPJ","author_id":9,"thumbnail":"Z7Dd3sMGCPtdlUPi"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "g5CtKYugZVALOwct",
    "body": "jtx3o1vbZcikCHYU",
    "type": "thuC2bhDiiWpzdPJ",
    "author_id": 9,
    "thumbnail": "Z7Dd3sMGCPtdlUPi"
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
`POST approve`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_e5b66986dff827722971ce82b286d979 -->

<!-- START_ce137a9fb84ef6789f44be899ecab3fe -->
## review_reports
> Example request:

```bash
curl -X GET -G "http://localhost/review_reports" \
    -H "Content-Type: application/json" \
    -d '{"title":"kru3czNv9kB7Jv6b","body":"oGCxWlR6hKYRvDJc","type":"y8VclQByIQExxBRH","author_id":3,"thumbnail":"HwemcZexRe0Qko2b"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "kru3czNv9kB7Jv6b",
    "body": "oGCxWlR6hKYRvDJc",
    "type": "y8VclQByIQExxBRH",
    "author_id": 3,
    "thumbnail": "HwemcZexRe0Qko2b"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_ce137a9fb84ef6789f44be899ecab3fe -->


