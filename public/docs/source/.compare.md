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

<<<<<<< HEAD
#Account

Controls the authentication, info and messages of the accounts.
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## Registers new user into the website by storing their email, username and password.

=======
##Links and comments

controls the comments , replies and private messages for each user
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## submit a new comment or reply to a comment on a post.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"email":"NFhC8ByCA2bjCAlD","username":"HIPBGNGrbTK73AoN","password":"xE8MvzAmMyaZmWOu","verify_password":"EAPAngUs0F6MxVmx"}'
=======
    -d '{"name":"z8lEqM9DnaLgDTZv","content":"QDkXgALZNLMO0rrl","parent_ID":"v87dT4hraL0XTRUO","AuthID":"q4facdJcoXwL3qka"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "email": "NFhC8ByCA2bjCAlD",
    "username": "HIPBGNGrbTK73AoN",
    "password": "xE8MvzAmMyaZmWOu",
    "verify_password": "EAPAngUs0F6MxVmx"
=======
    "name": "z8lEqM9DnaLgDTZv",
    "content": "QDkXgALZNLMO0rrl",
    "parent_ID": "v87dT4hraL0XTRUO",
    "AuthID": "q4facdJcoXwL3qka"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    email | string |  required  | The email of the user.
    username | string |  required  | The choosen username.
    password | string |  required  | The choosen password.
    verify_password | required |  optional  | string The repeated value of the password.
=======
    name | string |  required  | The fullname of the comment to be submitted ( comment , reply , message).
    content | string |  required  | The body of the comment.
    parent_ID | string |  required  | The fullname of the thing to be replied to.
    AuthID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_3a06114e88089d07a3c29bdb6f844602 -->

<!-- START_f2f2bd15a0a3125617af6284631682f0 -->
## Validates user&#039;s credentials and logs him in.

<<<<<<< HEAD
=======
<!-- START_80708de049dc3d985cb6e8aeae33393b -->
## to delete a post or comment or reply from any ApexCom by the owner of the thing or the moderator of this ApexCom.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"username":"PGziSKktTVWmGUXt","password":"LVvufqaTwdKpTi3R","remember_me":true}'
=======
    -d '{"name":"lBTRrx2jJNFN9ajn","ID":"oicSSED4dg3qKeXc"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "username": "PGziSKktTVWmGUXt",
    "password": "LVvufqaTwdKpTi3R",
    "remember_me": true
=======
    "name": "lBTRrx2jJNFN9ajn",
    "ID": "oicSSED4dg3qKeXc"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.
    remember_me | boolean |  required  | whether to keep the user logged in or not.
=======
    name | string |  required  | The fullname of the post,comment or reply to be deleted.
    ID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_f2f2bd15a0a3125617af6284631682f0 -->

<!-- START_99ada3ad1c00101e557456766317db7b -->
## Logs out a user.

<<<<<<< HEAD
=======
<!-- START_2daae1bc9e1e0639e200fec2f7f6bb1b -->
## to edit the text of a post , comment or reply by its owner.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"token":"m9oIePlkxymQE5hY"}'
=======
    -d '{"name":"8paQxfaadueSQXn5","content":"H3tDPzkBStdB2Wy0","ID":"uWDgp73UuTASTWJV"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "token": "m9oIePlkxymQE5hY"
=======
    "name": "8paQxfaadueSQXn5",
    "content": "H3tDPzkBStdB2Wy0",
    "ID": "uWDgp73UuTASTWJV"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    token | JWT |  required  | Used to verify the user.
=======
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    ID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_99ada3ad1c00101e557456766317db7b -->

<!-- START_cb128bb391940d8304e5ebb273373143 -->
## Delete private messages from the recipient&#039;s view of their inbox.

<<<<<<< HEAD
=======
<!-- START_e1f157eae6e3907a8770cb8504ae73cb -->
## to hide a post from the user view.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":19,"token":"OYvfxW0p7FnTXpFx"}'
=======
    -d '{"name":"Vva8Ekx6LFZCJc09","ID":"jv03kidQ1o9pVjOJ"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 19,
    "token": "OYvfxW0p7FnTXpFx"
=======
    "name": "Vva8Ekx6LFZCJc09",
    "ID": "jv03kidQ1o9pVjOJ"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    id | integer |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.
=======
    name | string |  required  | The fullname of the post to be hidden.
    ID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
## Delete private messages from the recipient&#039;s view of their inbox

<<<<<<< HEAD
=======
<!-- START_9019195c37b05d719ab1635b6943d714 -->
## to unhide the post from the user&#039;s hidden posts list so it will display in the user view.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":3,"token":"y96wNEshxLDSJMHC"}'
=======
    -d '{"name":"7r5nZKkkPNYVB7ay","ID":"T997AVfp9MIW71au"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 3,
    "token": "y96wNEshxLDSJMHC"
=======
    "name": "7r5nZKkkPNYVB7ay",
    "ID": "T997AVfp9MIW71au"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    id | integer |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.
=======
    name | string |  required  | The fullname of the post to be unhidden.
    ID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
## Updates the preferences of the user

<<<<<<< HEAD
> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"sHaMsp2MVtM5v5Tl","change_password":"ROBLtbxngk67NoFi","deactivate_account":"y3iOywB6RH91VHFV","media_autoplay":true,"pm_notifications":true,"replies_notifications":true,"token":"yPXN0Bxwya6nTXRe"}'
=======
<!-- START_157f1ca43f755f92777fe075f012a2d4 -->
## to retrieve additional comments omitted from a base comment tree (comment , replies ).

> Example request:

```bash
curl -X GET -G "http://localhost/moreComm" \
    -H "Content-Type: application/json" \
    -d '{"parent":"JW0LzTnYCMxB6mpk","children":"pG8oPgml6nqh6SMW","ID":"CyOf8fIFL6ZzukTh"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
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
=======
    "parent": "JW0LzTnYCMxB6mpk",
    "children": "pG8oPgml6nqh6SMW",
    "ID": "CyOf8fIFL6ZzukTh"
}

fetch(url, {
    method: "GET",
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
<<<<<<< HEAD
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
=======
null
```

### HTTP Request
`GET moreComm`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
<<<<<<< HEAD
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

=======
    parent | string |  required  | The fullname of the posts whose comments are being fetched ( post or comment ).
    children | string |  required  | The comments or replies to be fetched.
    ID | JWT |  required  | Verifying user ID.

<!-- END_157f1ca43f755f92777fe075f012a2d4 -->

<!-- START_e6e6c1d8554f35a2b7ff48374ad1e77b -->
## report a post , comment or a message to the ApexCom moderator, posts or comments will be hidden implicitly as well.

( moderators don't report posts).

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X GET -G "http://localhost/prefs" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"token":"6lR5NkSfU3oP7d6b"}'
=======
    -d '{"name":"hqgzgg1EmOEBjslc","reason":12,"ID":"xxV4xZnb8oerPlYL"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "token": "6lR5NkSfU3oP7d6b"
=======
    "name": "hqgzgg1EmOEBjslc",
    "reason": 12,
    "ID": "xxV4xZnb8oerPlYL"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    token | JWT |  required  | Used to verify the user.
=======
    name | string |  required  | The fullname of the post,comment or message to report.
    reason | integer |  optional  | The index represent the reason for the report from an associative array (will be in frontend and backend as well).
    ID | JWT |  required  | Verifying user ID.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_ef6e49b2e94875eba15ce9b052785989 -->

<!-- START_8534272b69ec50dc79d73c26608ba48c -->
## Returns the identity of the user logged in

<<<<<<< HEAD
=======
<!-- START_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->
## cast a vote on a post , comment or reply.

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X GET -G "http://localhost/me" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"token":"B7Srw145A1LYI6hK"}'
=======
    -d '{"name":"1xDV6zWY3vbFt0oI","dirction":3,"ID":"Yqy9KssmT0ZmBlr6"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "token": "B7Srw145A1LYI6hK"
=======
    "name": "1xDV6zWY3vbFt0oI",
    "dirction": 3,
    "ID": "Yqy9KssmT0ZmBlr6"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    name | string |  required  | The fullname of the post,comment or reply to vote on.
    dirction | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
    ID | JWT |  required  | Verifying user ID.

<!-- END_6ced6195e6c39da21a9ac37b11f15624 -->

<!-- START_4849ce4d441fd19425e151ff49985f46 -->
## Returns the karma of the user
* @bodyParam token JWT required Used to verify the user.

<<<<<<< HEAD
=======
<!-- START_3a7b8eca0c87791144dc77858615f215 -->
## Save
Saving a link or a comment

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    -d '{"max":4,"token":"mLRa8UR0urM9NlhO"}'
=======
    -d '{"ID":"VqQTEJaqfKlDuqjQ","token":"sXmOYA1KJVrNjH5J"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
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
=======
    "ID": "VqQTEJaqfKlDuqjQ",
    "token": "sXmOYA1KJVrNjH5J"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    fullname | string |  required  | The type of the comment ( comment, reply , message).
    content | string |  required  | The body of the request.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.
=======
    ID | string |  required  | The ID of the comment or link.
    token | JWT |  required  | Used to verify the user.
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- END_4479052af7e53f808c3e66f3a63e68f3 -->

<<<<<<< HEAD
<!-- START_80708de049dc3d985cb6e8aeae33393b -->
## DelComment
=======
<!-- START_c73ea2693dc9203931a2533cdef33d33 -->
## Unsave
Unsaving a link or a comment

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X POST "http://localhost/DelComment" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"wYRz2Kuu2V9Qzq83","body":"UIgCbNf82oHye6r1","type":"VwBqSPPA5jmCnX5e","author_id":1,"thumbnail":"oGWJxiOLWAnaPAi4"}'
=======
    -d '{"ID":"m2y0Vfsop0xXPpJj","token":"tTNnCkvFvYLT5FC8"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "wYRz2Kuu2V9Qzq83",
    "body": "UIgCbNf82oHye6r1",
    "type": "VwBqSPPA5jmCnX5e",
    "author_id": 1,
    "thumbnail": "oGWJxiOLWAnaPAi4"
=======
    "ID": "m2y0Vfsop0xXPpJj",
    "token": "tTNnCkvFvYLT5FC8"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    ID | string |  required  | The ID of the comment or link.
    token | JWT |  required  | Used to verify the user.

<!-- END_80708de049dc3d985cb6e8aeae33393b -->

<<<<<<< HEAD
<!-- START_2daae1bc9e1e0639e200fec2f7f6bb1b -->
## Edit
> Example request:

```bash
curl -X POST "http://localhost/Edit" \
    -H "Content-Type: application/json" \
    -d '{"title":"5jvmPCbEiNv2XSnk","body":"5cbrIMUfKyXpZjaN","type":"f7KG31IFYqnvLLGK","author_id":9,"thumbnail":"4kLtfNZTmaRw9g96"}'
=======
#Adminstration

APIs for managing the controls of admins and moderators
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## DeleteApexCom
Deleting the subreddit by the admin

> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"SubredditID":"KKRPGJ6TxrFLHlQx","token":"3OMKXC79PnDvQ359"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/Edit");
=======
const url = new URL("http://localhost/del_ac");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "5jvmPCbEiNv2XSnk",
    "body": "5cbrIMUfKyXpZjaN",
    "type": "f7KG31IFYqnvLLGK",
    "author_id": 9,
    "thumbnail": "4kLtfNZTmaRw9g96"
=======
    "SubredditID": "KKRPGJ6TxrFLHlQx",
    "token": "3OMKXC79PnDvQ359"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST Edit`
=======
`POST del_ac`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    SubredditID | string |  required  | The ID of the subreddit to be deleted.
    token | JWT |  required  | Used to verify the admin.

<<<<<<< HEAD
<!-- END_2daae1bc9e1e0639e200fec2f7f6bb1b -->

<!-- START_e1f157eae6e3907a8770cb8504ae73cb -->
## Hide
> Example request:

```bash
curl -X POST "http://localhost/Hide" \
    -H "Content-Type: application/json" \
    -d '{"title":"BpTqbyAqWatfkrS7","body":"oY8rrxWVQBRs8Hrp","type":"qFOHu8zsfVurfD11","author_id":18,"thumbnail":"3FGoCM1QWQhhlj3U"}'
=======
<!-- END_518c2787d7457d13136ce9ab90c7822b -->

<!-- START_ef7b81f691245619539d9452a88ace88 -->
## DeleteUser
Deleting a user by the admin

> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"AWMXb8u0MfApTbjE","Reason":"LFIfZ11KK7BK8oL2","token":"exn1DYn3RHPczwcW"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/Hide");
=======
const url = new URL("http://localhost/del_user");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "BpTqbyAqWatfkrS7",
    "body": "oY8rrxWVQBRs8Hrp",
    "type": "qFOHu8zsfVurfD11",
    "author_id": 18,
    "thumbnail": "3FGoCM1QWQhhlj3U"
=======
    "UserID": "AWMXb8u0MfApTbjE",
    "Reason": "LFIfZ11KK7BK8oL2",
    "token": "exn1DYn3RHPczwcW"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST Hide`
=======
`POST del_user`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    Reason | string |  optional  | The reason for deleting the user.
    token | JWT |  required  | Used to verify the admin.

<<<<<<< HEAD
<!-- END_e1f157eae6e3907a8770cb8504ae73cb -->

<!-- START_9019195c37b05d719ab1635b6943d714 -->
## unhide
> Example request:

```bash
curl -X POST "http://localhost/unhide" \
    -H "Content-Type: application/json" \
    -d '{"title":"1pkm5f8okha95wZo","body":"Su1VYZ2ZpTdyrNu3","type":"20IeQGA0pHWjmG8P","author_id":2,"thumbnail":"6LKn0pzcOmY0kgI7"}'
=======
<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## AddModerator
Adding a moderator for a subreddit

> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Content-Type: application/json" \
    -d '{"SubredditID":"kXs7VXbiKziPiBQY","token":"qtpGUno1UcA5ild1"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/unhide");
=======
const url = new URL("http://localhost/add_mod");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "1pkm5f8okha95wZo",
    "body": "Su1VYZ2ZpTdyrNu3",
    "type": "20IeQGA0pHWjmG8P",
    "author_id": 2,
    "thumbnail": "6LKn0pzcOmY0kgI7"
=======
    "SubredditID": "kXs7VXbiKziPiBQY",
    "token": "qtpGUno1UcA5ild1"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST unhide`
=======
`POST add_mod`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    SubredditID | string |  required  | The ID of the subreddit.
    token | JWT |  required  | Used to verify the moderator.

<<<<<<< HEAD
<!-- END_9019195c37b05d719ab1635b6943d714 -->

<!-- START_58c5fce5cfff0b2cfa4144dc5f083c44 -->
## moreComm
> Example request:

```bash
curl -X POST "http://localhost/moreComm" \
    -H "Content-Type: application/json" \
    -d '{"title":"NihugjTNpTCOzQP2","body":"JUOxo174BTo3ji87","type":"uGuJrOJ3fPv74mSd","author_id":14,"thumbnail":"I6HFIN1sUXRFCugE"}'
=======
<!-- END_0277897590e5bd3534956fc7b78f21cd -->

#User

Controls the user interaction with other users
<!-- START_1a7af546cd175bbafae3c156085b8064 -->
## Block a user, so he can&#039;t send private messages to the current user

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"id":"zz2PsNnK4cAZQMpQ","token":"0YfWtFg2JdWdR2Ae"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/moreComm");
=======
const url = new URL("http://localhost/block_user");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "NihugjTNpTCOzQP2",
    "body": "JUOxo174BTo3ji87",
    "type": "uGuJrOJ3fPv74mSd",
    "author_id": 14,
    "thumbnail": "I6HFIN1sUXRFCugE"
=======
    "id": "zz2PsNnK4cAZQMpQ",
    "token": "0YfWtFg2JdWdR2Ae"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST moreComm`
=======
`POST block_user`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<<<<<<< HEAD
<!-- END_58c5fce5cfff0b2cfa4144dc5f083c44 -->

<!-- START_e6e6c1d8554f35a2b7ff48374ad1e77b -->
## report
> Example request:

```bash
curl -X POST "http://localhost/report" \
    -H "Content-Type: application/json" \
    -d '{"title":"AFeDmyhMupYASWpy","body":"kWoFvgQpCUEZK6Gq","type":"3g3Jq3mfWjGGx3XT","author_id":18,"thumbnail":"vL2AwV71KKh8vOIk"}'
=======
<!-- END_1a7af546cd175bbafae3c156085b8064 -->

<!-- START_9a86fc0b67608be77b22a771d49949db -->
## Send a private message to another user

> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"to":"8r1fFlkLVTrBMa11","subject":"LfhBaYZqdTAFKkz7","mes":"WtK0PtflGDM6w5ev","token":"s2xdOuQYI70X3fcK"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/report");
=======
const url = new URL("http://localhost/compose");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "AFeDmyhMupYASWpy",
    "body": "kWoFvgQpCUEZK6Gq",
    "type": "3g3Jq3mfWjGGx3XT",
    "author_id": 18,
    "thumbnail": "vL2AwV71KKh8vOIk"
=======
    "to": "8r1fFlkLVTrBMa11",
    "subject": "LfhBaYZqdTAFKkz7",
    "mes": "WtK0PtflGDM6w5ev",
    "token": "s2xdOuQYI70X3fcK"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST report`
=======
`POST compose`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    to | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    mes | text |  optional  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<<<<<<< HEAD
<!-- END_e6e6c1d8554f35a2b7ff48374ad1e77b -->

<!-- START_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->
## vote
> Example request:

```bash
curl -X POST "http://localhost/vote" \
    -H "Content-Type: application/json" \
    -d '{"title":"1cldLpwDKwB1OzDa","body":"pAwNg4Ddbggakmwd","type":"2QuPnV2wdW0QiLZP","author_id":7,"thumbnail":"cmBw1Roqf1bnfG1m"}'
=======
<!-- END_9a86fc0b67608be77b22a771d49949db -->

<!-- START_6b60bbfb91f5581a2b2f1932856691c2 -->
## Return user public data to be seen by another user

> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"id":"jrk8zMUB8q9yF3Nh","token":"j7m5vMSX7gcTmFl0"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/vote");
=======
const url = new URL("http://localhost/user_data");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "1cldLpwDKwB1OzDa",
    "body": "pAwNg4Ddbggakmwd",
    "type": "2QuPnV2wdW0QiLZP",
    "author_id": 7,
    "thumbnail": "cmBw1Roqf1bnfG1m"
}

fetch(url, {
    method: "POST",
=======
    "id": "jrk8zMUB8q9yF3Nh",
    "token": "j7m5vMSX7gcTmFl0"
}

fetch(url, {
    method: "GET",
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST vote`
=======
`GET user_data`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of an existing user.
    token | JWT |  required  | Used to verify the user.

<<<<<<< HEAD
<!-- END_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->

<!-- START_3a7b8eca0c87791144dc77858615f215 -->
## save
> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Content-Type: application/json" \
    -d '{"title":"VpXPQH5UhLW3KBeP","body":"XprZDuYzHn6eQc6M","type":"2L5Cm9yVvEaJJNDr","author_id":9,"thumbnail":"Qp7LZHj4fk9Daqm3"}'
=======
<!-- END_6b60bbfb91f5581a2b2f1932856691c2 -->

#general
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## sign_up
> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"title":"nN83YBml97h6526k","body":"wPuvvA9Ywaf6CmoH","type":"kHUtH1AwEwIAyoLx","author_id":1,"thumbnail":"Ve7M6wcrBjPcMYKg"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/save");
=======
const url = new URL("http://localhost/sign_up");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "VpXPQH5UhLW3KBeP",
    "body": "XprZDuYzHn6eQc6M",
    "type": "2L5Cm9yVvEaJJNDr",
    "author_id": 9,
    "thumbnail": "Qp7LZHj4fk9Daqm3"
=======
    "title": "nN83YBml97h6526k",
    "body": "wPuvvA9Ywaf6CmoH",
    "type": "kHUtH1AwEwIAyoLx",
    "author_id": 1,
    "thumbnail": "Ve7M6wcrBjPcMYKg"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST save`
=======
`POST sign_up`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<<<<<<< HEAD
<!-- END_3a7b8eca0c87791144dc77858615f215 -->

<!-- START_c73ea2693dc9203931a2533cdef33d33 -->
## unsave
> Example request:

```bash
curl -X POST "http://localhost/unsave" \
    -H "Content-Type: application/json" \
    -d '{"title":"7bhWT8SVzTiICC6g","body":"RwuzGnqR56k2WJl5","type":"StKffWZhMZOtSCYz","author_id":17,"thumbnail":"dDuJigB6OXXG4QWt"}'
=======
<!-- END_3a06114e88089d07a3c29bdb6f844602 -->

<!-- START_f2f2bd15a0a3125617af6284631682f0 -->
## Sign_in
> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Content-Type: application/json" \
    -d '{"title":"VAOS83cWRfUnT35N","body":"dQt0XbgvYghWKfGa","type":"GCoOe8Kw8wDDWpCd","author_id":8,"thumbnail":"HqknQKDmB1iluC0s"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/unsave");
=======
const url = new URL("http://localhost/Sign_in");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "7bhWT8SVzTiICC6g",
    "body": "RwuzGnqR56k2WJl5",
    "type": "StKffWZhMZOtSCYz",
    "author_id": 17,
    "thumbnail": "dDuJigB6OXXG4QWt"
=======
    "title": "VAOS83cWRfUnT35N",
    "body": "dQt0XbgvYghWKfGa",
    "type": "GCoOe8Kw8wDDWpCd",
    "author_id": 8,
    "thumbnail": "HqknQKDmB1iluC0s"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST unsave`
=======
`POST Sign_in`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<<<<<<< HEAD
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
=======
<!-- END_f2f2bd15a0a3125617af6284631682f0 -->

<!-- START_99ada3ad1c00101e557456766317db7b -->
## sign_out
> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Content-Type: application/json" \
    -d '{"title":"MRnXtJITf5buubEE","body":"GIYkAhzmVJA3MoMP","type":"5v0VDosqAzNZgc0v","author_id":19,"thumbnail":"1emxSEi9WRFWQPf7"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/block_user");
=======
const url = new URL("http://localhost/sign_out");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": "sxezgVMRshURqg8a",
    "token": "mKPlX8ohbk0qFGZR"
=======
    "title": "MRnXtJITf5buubEE",
    "body": "GIYkAhzmVJA3MoMP",
    "type": "5v0VDosqAzNZgc0v",
    "author_id": 19,
    "thumbnail": "1emxSEi9WRFWQPf7"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST block_user`
=======
`POST sign_out`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<<<<<<< HEAD
<!-- END_1a7af546cd175bbafae3c156085b8064 -->

<!-- START_9a86fc0b67608be77b22a771d49949db -->
## Send a private message to another user
=======
<!-- END_99ada3ad1c00101e557456766317db7b -->

<!-- START_cb128bb391940d8304e5ebb273373143 -->
## Delete private messages from the recipient&#039;s view of their inbox
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

> Example request:

```bash
<<<<<<< HEAD
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"to":"4iKgqzeYFeVcaRzI","subject":"Y9SpUq9dC14XUAdn","mes":"WTgdKAe23PLygbMn","token":"ZvK7KJn3TzQlbDgB"}'
=======
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":"be93TCW71WO6v5JD","token":"KBGiAgpeDwpnulqx"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/compose");
=======
const url = new URL("http://localhost/del_msg");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "to": "4iKgqzeYFeVcaRzI",
    "subject": "Y9SpUq9dC14XUAdn",
    "mes": "WTgdKAe23PLygbMn",
    "token": "ZvK7KJn3TzQlbDgB"
=======
    "id": "be93TCW71WO6v5JD",
    "token": "KBGiAgpeDwpnulqx"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`POST compose`
=======
`POST del_msg`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
<<<<<<< HEAD
    to | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    mes | text |  optional  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_9a86fc0b67608be77b22a771d49949db -->

<!-- START_6b60bbfb91f5581a2b2f1932856691c2 -->
## Return user public data to be seen by another user
=======
    id | string |  required  | The fullname of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
## ReadMsg
Read a sent message
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

> Example request:

```bash
<<<<<<< HEAD
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"id":"d5Uk86lZdgnL4x1F","token":"ikgzEDBFN6JcNyZj"}'
=======
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
    -d '{"ID":"7busofMdC4Obkp9T","body":"M1hjls9DPWBONyU9","read":true,"token":"uYMJbyffpu8KhjyL"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/user_data");
=======
const url = new URL("http://localhost/read_msg");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": "d5Uk86lZdgnL4x1F",
    "token": "ikgzEDBFN6JcNyZj"
=======
    "ID": "7busofMdC4Obkp9T",
    "body": "M1hjls9DPWBONyU9",
    "read": true,
    "token": "uYMJbyffpu8KhjyL"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`GET user_data`
=======
`POST read_msg`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
<<<<<<< HEAD
    id | string |  required  | The id of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_6b60bbfb91f5581a2b2f1932856691c2 -->

#general
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## del_ac
=======
    ID | string |  required  | The id of the user who sent the message.
    body | string |  required  | The body of the message.
    read | boolean |  optional  | optional  mark the message as read by setting it true.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
## updateprefs
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"bK3m9PaT7jeGGlF5","body":"DMpSSznIH0imxgLX","type":"92sJ2nRrRu9IPlJK","author_id":13,"thumbnail":"syzP89nctNBx08pV"}'
=======
    -d '{"title":"NBdOYd5GprOksNcR","body":"Bh7qiB0ypjYjtPX7","type":"l0p1KnZsmb9hFfFR","author_id":15,"thumbnail":"lV18cyRbJoC4YWrV"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "bK3m9PaT7jeGGlF5",
    "body": "DMpSSznIH0imxgLX",
    "type": "92sJ2nRrRu9IPlJK",
    "author_id": 13,
    "thumbnail": "syzP89nctNBx08pV"
=======
    "title": "NBdOYd5GprOksNcR",
    "body": "Bh7qiB0ypjYjtPX7",
    "type": "l0p1KnZsmb9hFfFR",
    "author_id": 15,
    "thumbnail": "lV18cyRbJoC4YWrV"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_e43f1f7cccba02a3ecbce11183ad7aeb -->

<!-- START_ef6e49b2e94875eba15ce9b052785989 -->
## prefs
> Example request:

```bash
curl -X GET -G "http://localhost/prefs" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"03xGSn3TBDz3wP4i","body":"YEiDF1ZB3RHhkeBX","type":"UMo4O5Ospv74LeYv","author_id":4,"thumbnail":"Oj1OkBFY9qUyOvnq"}'
=======
    -d '{"title":"2nIDmfQDJfgcdTAP","body":"dA5CR819N8DmVVSh","type":"G3fyv1Q2sbVqfThg","author_id":12,"thumbnail":"9q4ymaEj3pm3PUSt"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "03xGSn3TBDz3wP4i",
    "body": "YEiDF1ZB3RHhkeBX",
    "type": "UMo4O5Ospv74LeYv",
    "author_id": 4,
    "thumbnail": "Oj1OkBFY9qUyOvnq"
=======
    "title": "2nIDmfQDJfgcdTAP",
    "body": "dA5CR819N8DmVVSh",
    "type": "G3fyv1Q2sbVqfThg",
    "author_id": 12,
    "thumbnail": "9q4ymaEj3pm3PUSt"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_ef6e49b2e94875eba15ce9b052785989 -->

<!-- START_8534272b69ec50dc79d73c26608ba48c -->
## me
> Example request:

```bash
curl -X GET -G "http://localhost/me" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"qDhEuewLKa3gAi0V","body":"DpekK8uscHq5nAB6","type":"7a6QUSHrTVle1eIM","author_id":12,"thumbnail":"Hd1XuKO0K0O0f4pd"}'
=======
    -d '{"title":"yAZiu1h1Z1Wmp9My","body":"h8bL0iEcfAbsb9Ri","type":"Fu3Y6YYCqoy0iQj0","author_id":1,"thumbnail":"8XQvUqWpdhbOxIhZ"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "qDhEuewLKa3gAi0V",
    "body": "DpekK8uscHq5nAB6",
    "type": "7a6QUSHrTVle1eIM",
    "author_id": 12,
    "thumbnail": "Hd1XuKO0K0O0f4pd"
=======
    "title": "yAZiu1h1Z1Wmp9My",
    "body": "h8bL0iEcfAbsb9Ri",
    "type": "Fu3Y6YYCqoy0iQj0",
    "author_id": 1,
    "thumbnail": "8XQvUqWpdhbOxIhZ"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_8534272b69ec50dc79d73c26608ba48c -->

<!-- START_6ced6195e6c39da21a9ac37b11f15624 -->
## ProfileInfo
Displaying the home page of the user

> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"3sxbu5ERLnGbZUK3","body":"o8jutMlzplJuvpPR","type":"KocF84lkCq2qFdM3","author_id":18,"thumbnail":"kD7oT6Y07hZoxoFg"}'
=======
    -d '{"ID":"XFBAnpZK6yZoRJzv","token":"xP3yxuhRh3ONRtL6"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "3sxbu5ERLnGbZUK3",
    "body": "o8jutMlzplJuvpPR",
    "type": "KocF84lkCq2qFdM3",
    "author_id": 18,
    "thumbnail": "kD7oT6Y07hZoxoFg"
=======
    "ID": "XFBAnpZK6yZoRJzv",
    "token": "xP3yxuhRh3ONRtL6"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    ID | string |  required  | The ID of the user.
    token | JWT |  required  | Used to verify the user.

<!-- END_6ced6195e6c39da21a9ac37b11f15624 -->

<!-- START_4849ce4d441fd19425e151ff49985f46 -->
## karma
> Example request:

```bash
curl -X GET -G "http://localhost/karma" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"nPTJXUtKc6ISXZrL","body":"leVzHWwmnDnfQduS","type":"pPR4p7ZAVMaoFL7b","author_id":14,"thumbnail":"7CNnRYSATKVRuYTR"}'
=======
    -d '{"title":"g4j7ff8xTEOMirv6","body":"ar2t3SIGzn9Drmaa","type":"KezdVYxmDBR1s2gy","author_id":6,"thumbnail":"6TkW6w7pMpzUWzRT"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "nPTJXUtKc6ISXZrL",
    "body": "leVzHWwmnDnfQduS",
    "type": "pPR4p7ZAVMaoFL7b",
    "author_id": 14,
    "thumbnail": "7CNnRYSATKVRuYTR"
=======
    "title": "g4j7ff8xTEOMirv6",
    "body": "ar2t3SIGzn9Drmaa",
    "type": "KezdVYxmDBR1s2gy",
    "author_id": 6,
    "thumbnail": "6TkW6w7pMpzUWzRT"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_4849ce4d441fd19425e151ff49985f46 -->

<!-- START_792dbb5dfd8db302bbad16e36921d1b0 -->
## messages
> Example request:

```bash
curl -X GET -G "http://localhost/messages" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"5wiJyObBEL2qz66w","body":"grbmLpWMC7k5wEr6","type":"Xx7NViWhp3ZYZGQI","author_id":6,"thumbnail":"OK1WGHMxZ5x6KUwN"}'
=======
    -d '{"title":"eEkQiqRLPWzWS6IP","body":"6TEH15ygwlrqkv8z","type":"ww2nzgP54NxBu4Ep","author_id":20,"thumbnail":"dksdUXHNbSMBRjjW"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "5wiJyObBEL2qz66w",
    "body": "grbmLpWMC7k5wEr6",
    "type": "Xx7NViWhp3ZYZGQI",
    "author_id": 6,
    "thumbnail": "OK1WGHMxZ5x6KUwN"
=======
    "title": "eEkQiqRLPWzWS6IP",
    "body": "6TEH15ygwlrqkv8z",
    "type": "ww2nzgP54NxBu4Ep",
    "author_id": 20,
    "thumbnail": "dksdUXHNbSMBRjjW"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_792dbb5dfd8db302bbad16e36921d1b0 -->

<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## about
> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"Z0JfN40wTATe8TKN","body":"4HrvR8s9hlJBCdt0","type":"D5oD3U2eGuSmpTjB","author_id":17,"thumbnail":"4UYrz89PnrCgLvY6"}'
=======
    -d '{"title":"qwMRnhkWEyieQ5TU","body":"X8o639wcEqJlzyl1","type":"toLy67mkmTP97H6t","author_id":15,"thumbnail":"qD65MqzJZ19GPKqI"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "Z0JfN40wTATe8TKN",
    "body": "4HrvR8s9hlJBCdt0",
    "type": "D5oD3U2eGuSmpTjB",
    "author_id": 17,
    "thumbnail": "4UYrz89PnrCgLvY6"
=======
    "title": "qwMRnhkWEyieQ5TU",
    "body": "X8o639wcEqJlzyl1",
    "type": "toLy67mkmTP97H6t",
    "author_id": 15,
    "thumbnail": "qD65MqzJZ19GPKqI"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    -d '{"title":"H7BWs2EbHrUeRYPS","body":"51pwE3FEuNdCbqfH","type":"ZN1MLeRu3jbU8HD4","author_id":14,"thumbnail":"TpLCXY7986zp3MRn"}'
=======
    -d '{"title":"Fv7fojxDuDI1Gfcj","body":"LGC4xRYH9BcfZwnb","type":"TMYGISnTVSEvDNxz","author_id":5,"thumbnail":"mz4A5C0fILnyN94K"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "H7BWs2EbHrUeRYPS",
    "body": "51pwE3FEuNdCbqfH",
    "type": "ZN1MLeRu3jbU8HD4",
    "author_id": 14,
    "thumbnail": "TpLCXY7986zp3MRn"
=======
    "title": "Fv7fojxDuDI1Gfcj",
    "body": "LGC4xRYH9BcfZwnb",
    "type": "TMYGISnTVSEvDNxz",
    "author_id": 5,
    "thumbnail": "mz4A5C0fILnyN94K"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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

<<<<<<< HEAD
<!-- START_05b3f813d60fda460fbe53c065926a61 -->
## sort_posts
> Example request:

```bash
curl -X GET -G "http://localhost/sort_posts" \
    -H "Content-Type: application/json" \
    -d '{"title":"ldeKGmzLlbYMJazM","body":"JEt8JHS01xXQXMje","type":"p7gzPNZg2b2mC77L","author_id":10,"thumbnail":"szpCi5KMXwUvgRgV"}'
=======
<!-- START_7cd1c92845723362129d03191c93e958 -->
## subscribe
> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Content-Type: application/json" \
    -d '{"title":"aJn6lD7YdA5eZaSw","body":"OslsWEjsYcjZs3eZ","type":"zybLE5CUCcooYb16","author_id":14,"thumbnail":"nEo9vm7h4xpNB8bk"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/sort_posts");
=======
const url = new URL("http://localhost/subscribe");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "ldeKGmzLlbYMJazM",
    "body": "JEt8JHS01xXQXMje",
    "type": "p7gzPNZg2b2mC77L",
    "author_id": 10,
    "thumbnail": "szpCi5KMXwUvgRgV"
=======
    "title": "aJn6lD7YdA5eZaSw",
    "body": "OslsWEjsYcjZs3eZ",
    "type": "zybLE5CUCcooYb16",
    "author_id": 14,
    "thumbnail": "nEo9vm7h4xpNB8bk"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`GET sort_posts`
=======
`POST subscribe`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<<<<<<< HEAD
<!-- END_05b3f813d60fda460fbe53c065926a61 -->

<!-- START_aab40918c3a3f4e3512a9b2c1177ea2b -->
## Apex_names
> Example request:

```bash
curl -X GET -G "http://localhost/Apex_names" \
    -H "Content-Type: application/json" \
    -d '{"title":"qCB0Lbthue1Ivhvo","body":"78N8YuV3FKXJXlly","type":"IKcN8F1GykcOFw41","author_id":20,"thumbnail":"FW0PZuUQllDtwlBk"}'
=======
<!-- END_7cd1c92845723362129d03191c93e958 -->

<!-- START_c3bc7678aa26afc45eeb4d785a212851 -->
## site_admin
> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Content-Type: application/json" \
    -d '{"title":"cPNbjBWfPTFrhqBc","body":"Z5AdBaZrRurrdxNB","type":"iARvs6yNxZiH0z9K","author_id":1,"thumbnail":"4aFn5UZ2REEvFUdL"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
<<<<<<< HEAD
const url = new URL("http://localhost/Apex_names");
=======
const url = new URL("http://localhost/site_admin");
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "qCB0Lbthue1Ivhvo",
    "body": "78N8YuV3FKXJXlly",
    "type": "IKcN8F1GykcOFw41",
    "author_id": 20,
    "thumbnail": "FW0PZuUQllDtwlBk"
=======
    "title": "cPNbjBWfPTFrhqBc",
    "body": "Z5AdBaZrRurrdxNB",
    "type": "iARvs6yNxZiH0z9K",
    "author_id": 1,
    "thumbnail": "4aFn5UZ2REEvFUdL"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
`GET Apex_names`
=======
`POST site_admin`
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<<<<<<< HEAD
<!-- END_aab40918c3a3f4e3512a9b2c1177ea2b -->
=======
<!-- END_c3bc7678aa26afc45eeb4d785a212851 -->
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## search
> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"YKsC7cT1z2llAek1","body":"oJ1lMAsgDHEMGzZ6","type":"LdD34qwMdqS3Vaox","author_id":17,"thumbnail":"V751HmpothMMre1f"}'
=======
    -d '{"title":"uYGtoiqwg0SDWlBl","body":"jx1z3VRUZpRNYWdJ","type":"0kBwl6y1SFmcNH6Z","author_id":2,"thumbnail":"eN3RDm99ywTd0aox"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "YKsC7cT1z2llAek1",
    "body": "oJ1lMAsgDHEMGzZ6",
    "type": "LdD34qwMdqS3Vaox",
    "author_id": 17,
    "thumbnail": "V751HmpothMMre1f"
=======
    "title": "uYGtoiqwg0SDWlBl",
    "body": "jx1z3VRUZpRNYWdJ",
    "type": "0kBwl6y1SFmcNH6Z",
    "author_id": 2,
    "thumbnail": "eN3RDm99ywTd0aox"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    -d '{"title":"g5CtKYugZVALOwct","body":"jtx3o1vbZcikCHYU","type":"thuC2bhDiiWpzdPJ","author_id":9,"thumbnail":"Z7Dd3sMGCPtdlUPi"}'
=======
    -d '{"title":"8gt4Ro05IRhEhsW7","body":"Tqr7tFfoNKiIkXmo","type":"pTqjigfX7Zwz44yh","author_id":20,"thumbnail":"VOQZYKdXnLJ53EfV"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "g5CtKYugZVALOwct",
    "body": "jtx3o1vbZcikCHYU",
    "type": "thuC2bhDiiWpzdPJ",
    "author_id": 9,
    "thumbnail": "Z7Dd3sMGCPtdlUPi"
=======
    "title": "8gt4Ro05IRhEhsW7",
    "body": "Tqr7tFfoNKiIkXmo",
    "type": "pTqjigfX7Zwz44yh",
    "author_id": 20,
    "thumbnail": "VOQZYKdXnLJ53EfV"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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
<<<<<<< HEAD
    -d '{"title":"kru3czNv9kB7Jv6b","body":"oGCxWlR6hKYRvDJc","type":"y8VclQByIQExxBRH","author_id":3,"thumbnail":"HwemcZexRe0Qko2b"}'
=======
    -d '{"title":"Z7F685mGH9zRnEsT","body":"hXJFZFfhkoAlRyfl","type":"Bm6qZdX3q4nGbVO2","author_id":18,"thumbnail":"lRCczsVaZ20MGp8Y"}'
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

```

```javascript
const url = new URL("http://localhost/Apex_names");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "kru3czNv9kB7Jv6b",
    "body": "oGCxWlR6hKYRvDJc",
    "type": "y8VclQByIQExxBRH",
    "author_id": 3,
    "thumbnail": "HwemcZexRe0Qko2b"
=======
    "title": "Z7F685mGH9zRnEsT",
    "body": "hXJFZFfhkoAlRyfl",
    "type": "Bm6qZdX3q4nGbVO2",
    "author_id": 18,
    "thumbnail": "lRCczsVaZ20MGp8Y"
>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695
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

<<<<<<< HEAD
=======
<!-- START_b885f7f4714d80477084c1fd4bf3e729 -->
## remove
> Example request:

```bash
curl -X POST "http://localhost/remove" \
    -H "Content-Type: application/json" \
    -d '{"title":"3LfYi3CuyKfoQtJo","body":"U9jKpnPftHduyp3M","type":"itJsbaJnNDsgOEm7","author_id":6,"thumbnail":"Hygt1JHtQvu4qQul"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "3LfYi3CuyKfoQtJo",
    "body": "U9jKpnPftHduyp3M",
    "type": "itJsbaJnNDsgOEm7",
    "author_id": 6,
    "thumbnail": "Hygt1JHtQvu4qQul"
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
    -d '{"title":"7ZjmsgMUQbT76oQ7","body":"ucEFMSmLUURRjyBN","type":"UvDgDzYsixUnvHfw","author_id":11,"thumbnail":"sgAYhrZkyx2x9le9"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "7ZjmsgMUQbT76oQ7",
    "body": "ucEFMSmLUURRjyBN",
    "type": "UvDgDzYsixUnvHfw",
    "author_id": 11,
    "thumbnail": "sgAYhrZkyx2x9le9"
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
    -d '{"title":"csWYf2n4So4rz7qw","body":"VMWZC9hxmyjdlI9G","type":"FzHM5qsbVu5JQfwl","author_id":10,"thumbnail":"LfSWmH9sT6BoK8Ye"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "csWYf2n4So4rz7qw",
    "body": "VMWZC9hxmyjdlI9G",
    "type": "FzHM5qsbVu5JQfwl",
    "author_id": 10,
    "thumbnail": "LfSWmH9sT6BoK8Ye"
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

>>>>>>> b93039af76058a34b556de449cf7ff2e9e96d695

