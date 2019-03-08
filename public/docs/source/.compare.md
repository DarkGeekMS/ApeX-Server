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

##Links and comments

controls the comments , replies and private messages for each user
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## submit a new comment or reply to a comment on a post.

> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Content-Type: application/json" \
    -d '{"name":"DTmKFaR8WA8C6VJc","content":"28u5OCOVxq0bB6U8","parent_ID":"V8wszdIJcAFyC4X2","AuthID":"RIpWeXEQ4iD4nRBF"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "DTmKFaR8WA8C6VJc",
    "content": "28u5OCOVxq0bB6U8",
    "parent_ID": "V8wszdIJcAFyC4X2",
    "AuthID": "RIpWeXEQ4iD4nRBF"
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
## to delete a post or comment or reply from any ApexCom by the owner of the thing or the moderator of this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/DelComment" \
    -H "Content-Type: application/json" \
    -d '{"name":"0UI5qWBFkzucCMla","ID":"WBQTobCOiEHF3eqs"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "0UI5qWBFkzucCMla",
    "ID": "WBQTobCOiEHF3eqs"
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
## to edit the text of a post , comment or reply by its owner.

> Example request:

```bash
curl -X POST "http://localhost/Edit" \
    -H "Content-Type: application/json" \
    -d '{"name":"XZuBNyYXeiVG4vSh","content":"gHHz4FikRunGyMHd","ID":"ezAAgpn3VN4phMxX"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "XZuBNyYXeiVG4vSh",
    "content": "gHHz4FikRunGyMHd",
    "ID": "ezAAgpn3VN4phMxX"
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

<!-- START_e1f157eae6e3907a8770cb8504ae73cb -->
## to hide a post from the user view.

> Example request:

```bash
curl -X POST "http://localhost/Hide" \
    -H "Content-Type: application/json" \
    -d '{"name":"A3KOg6Aosl3Rdpm0","ID":"zv5gzFB6BUcBLWq3"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "A3KOg6Aosl3Rdpm0",
    "ID": "zv5gzFB6BUcBLWq3"
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

<!-- START_9019195c37b05d719ab1635b6943d714 -->
## to unhide the post from the user&#039;s hidden posts list so it will display in the user view.

> Example request:

```bash
curl -X POST "http://localhost/unhide" \
    -H "Content-Type: application/json" \
    -d '{"name":"iLhnxJPLgcFr8X9U","ID":"6ZU56YmWPAe8wEG0"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "iLhnxJPLgcFr8X9U",
    "ID": "6ZU56YmWPAe8wEG0"
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
    name | string |  required  | The fullname of the post to be unhidden.
    ID | JWT |  required  | Verifying user ID.

<!-- END_9019195c37b05d719ab1635b6943d714 -->

<!-- START_157f1ca43f755f92777fe075f012a2d4 -->
## to retrieve additional comments omitted from a base comment tree (comment , replies ).

> Example request:

```bash
curl -X GET -G "http://localhost/moreComm" \
    -H "Content-Type: application/json" \
    -d '{"parent":"WcVDJKoKolmEFYUi","children":"cJ9FXchr5zQ5VEGw","ID":"O0SIiyGtzYB8d7m2"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "WcVDJKoKolmEFYUi",
    "children": "cJ9FXchr5zQ5VEGw",
    "ID": "O0SIiyGtzYB8d7m2"
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
`GET moreComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched ( post or comment ).
    children | string |  required  | The comments or replies to be fetched.
    ID | JWT |  required  | Verifying user ID.

<!-- END_157f1ca43f755f92777fe075f012a2d4 -->

<!-- START_e6e6c1d8554f35a2b7ff48374ad1e77b -->
## report a post , comment or a message to the ApexCom moderator, posts or comments will be hidden implicitly as well.

( moderators don't report posts).

> Example request:

```bash
curl -X POST "http://localhost/report" \
    -H "Content-Type: application/json" \
    -d '{"name":"tweyleTWZpAmTa3m","reason":2,"ID":"orc7xjbx3b3VUNic"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "tweyleTWZpAmTa3m",
    "reason": 2,
    "ID": "orc7xjbx3b3VUNic"
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
    reason | integer |  optional  | The index represent the reason for the report from an associative array (will be in frontend and backend as well).
    ID | JWT |  required  | Verifying user ID.

<!-- END_e6e6c1d8554f35a2b7ff48374ad1e77b -->

<!-- START_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->
## cast a vote on a post , comment or reply.

> Example request:

```bash
curl -X POST "http://localhost/vote" \
    -H "Content-Type: application/json" \
    -d '{"name":"3A9raucl3HjsuXfr","dirction":6,"ID":"JX2DccG09brj7GkL"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "3A9raucl3HjsuXfr",
    "dirction": 6,
    "ID": "JX2DccG09brj7GkL"
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
    dirction | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote , 0 un-vote).
    ID | JWT |  required  | Verifying user ID.

<!-- END_b9ff8cde9ee2a2f03976eb4c9d896fa9 -->

<!-- START_3a7b8eca0c87791144dc77858615f215 -->
## Save
Saving a link or a comment

> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Content-Type: application/json" \
    -d '{"ID":"RT062tFUqV3bTvH4","token":"zpoIiIVaxITCFzrk"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "RT062tFUqV3bTvH4",
    "token": "zpoIiIVaxITCFzrk"
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
    ID | string |  required  | The ID of the comment or link.
    token | JWT |  required  | Used to verify the user.

<!-- END_3a7b8eca0c87791144dc77858615f215 -->

<!-- START_c73ea2693dc9203931a2533cdef33d33 -->
## Unsave
Unsaving a link or a comment

> Example request:

```bash
curl -X POST "http://localhost/unsave" \
    -H "Content-Type: application/json" \
    -d '{"ID":"eaQ1Orp99Kg19k9j","token":"MtmrO6nrjTW8kmRq"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "eaQ1Orp99Kg19k9j",
    "token": "MtmrO6nrjTW8kmRq"
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
    ID | string |  required  | The ID of the comment or link.
    token | JWT |  required  | Used to verify the user.

<!-- END_c73ea2693dc9203931a2533cdef33d33 -->

#Account

Controls the authentication, info and messages of the accounts.
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## Registers new user into the website by storing their email, username and password.

> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"email":"km8aap6xAY9JLvc6","username":"G63xdSGalgzU8Ual","password":"EM4Rdmrecq5ctXvc","verify_password":"vYQM9ITS67ENMJK4"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "km8aap6xAY9JLvc6",
    "username": "G63xdSGalgzU8Ual",
    "password": "EM4Rdmrecq5ctXvc",
    "verify_password": "vYQM9ITS67ENMJK4"
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
    -d '{"username":"LILOG6jXVGRC0dIU","password":"A3GCCyeYQ60qDT3t","remember_me":true}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "LILOG6jXVGRC0dIU",
    "password": "A3GCCyeYQ60qDT3t",
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
    -d '{"token":"0CxJM7WtoMtkwmQA"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "0CxJM7WtoMtkwmQA"
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
## DeleteMsg
Delete private messages from the recipient&#039;s view of their inbox.

> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":20,"token":"FpN37N2spOyKROcQ"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 20,
    "token": "FpN37N2spOyKROcQ"
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
## ReadMsg
Read a sent message

> Example request:

```bash
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
    -d '{"ID":"u2TVNvLios3Itsny","body":"ca1iwUhNtuguf2D6","read":false,"token":"LrPimbmmT8ruH1h7"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "u2TVNvLios3Itsny",
    "body": "ca1iwUhNtuguf2D6",
    "read": false,
    "token": "LrPimbmmT8ruH1h7"
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
    ID | string |  required  | The id of the user who sent the message.
    body | string |  required  | The body of the message.
    read | boolean |  optional  | optional  mark the message as read by setting it true.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
## Updates the preferences of the user

> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"7mkoA6nNQxvG86QP","change_password":"zAREXzwPtZuTUliG","deactivate_account":"ogbKDnsvoviECd5P","media_autoplay":true,"pm_notifications":false,"replies_notifications":true,"token":"4ZjPxiOOWYOyE26b"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "7mkoA6nNQxvG86QP",
    "change_password": "zAREXzwPtZuTUliG",
    "deactivate_account": "ogbKDnsvoviECd5P",
    "media_autoplay": true,
    "pm_notifications": false,
    "replies_notifications": true,
    "token": "4ZjPxiOOWYOyE26b"
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
    -d '{"token":"ReQX2NoeENfFl29y"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "ReQX2NoeENfFl29y"
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
    -d '{"token":"PTkS23cZonlchyq9"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "PTkS23cZonlchyq9"
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
## ProfileInfo
Displaying the home page of the user

> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Content-Type: application/json" \
    -d '{"ID":"tFW00vjJ8pYeLrCb","token":"haQnzMUkLRZvQ6t5"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "tFW00vjJ8pYeLrCb",
    "token": "haQnzMUkLRZvQ6t5"
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
    -d '{"max":15,"token":"02LP5jL19mo0d0AD"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 15,
    "token": "02LP5jL19mo0d0AD"
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

#Adminstration

APIs for managing the controls of admins and moderators
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## DeleteApexCom
Deleting the subreddit by the admin

> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"SubredditID":"HUj6J1RoBzQr1gVc","token":"UIHzYyCtudv0mqV1"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "HUj6J1RoBzQr1gVc",
    "token": "UIHzYyCtudv0mqV1"
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
    SubredditID | string |  required  | The ID of the subreddit to be deleted.
    token | JWT |  required  | Used to verify the admin.

<!-- END_518c2787d7457d13136ce9ab90c7822b -->

<!-- START_ef7b81f691245619539d9452a88ace88 -->
## DeleteUser
Deleting a user by the admin

> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"dm1l687IT7ATAcye","Reason":"Uaz7r1VcyD0hoe9X","token":"NnT9sYnVrzBDvgBL"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "dm1l687IT7ATAcye",
    "Reason": "Uaz7r1VcyD0hoe9X",
    "token": "NnT9sYnVrzBDvgBL"
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
    token | JWT |  required  | Used to verify the admin.

<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## AddModerator
Adding a moderator for a subreddit

> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Content-Type: application/json" \
    -d '{"SubredditID":"aHNB0OaVzJQgwvfs","token":"HpEuUamjtcAk8y8o"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "aHNB0OaVzJQgwvfs",
    "token": "HpEuUamjtcAk8y8o"
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
    SubredditID | string |  required  | The ID of the subreddit.
    token | JWT |  required  | Used to verify the moderator.

<!-- END_0277897590e5bd3534956fc7b78f21cd -->

#User

Controls the user interaction with other users
<!-- START_1a7af546cd175bbafae3c156085b8064 -->
## Block
Block a user, so he can&#039;t send private messages to the current user

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"id":"BPZznoG4DyEAgfhk","token":"pdtI6JMCD5LP9D7R"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "BPZznoG4DyEAgfhk",
    "token": "pdtI6JMCD5LP9D7R"
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
## Compose
Send a private message to another user

> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"to":"xTJorvplh8eM4i5I","subject":"F2F63ylDvucBhKrz","mes":"xWA1ltqYtwqnOMMb","token":"CU2HULN0UQOatTgw"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "xTJorvplh8eM4i5I",
    "subject": "F2F63ylDvucBhKrz",
    "mes": "xWA1ltqYtwqnOMMb",
    "token": "CU2HULN0UQOatTgw"
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
## UserDataByAccountID
Return user public data to be seen by another user

> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"id":"78LbjMGCoHTA0Typ"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "78LbjMGCoHTA0Typ"
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

<!-- END_6b60bbfb91f5581a2b2f1932856691c2 -->

#general
<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## About
returns information about ApexCom

> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"nFkSvh99oGLW2zuZ","_token":"SvVMOQsexe9RU9Oi"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "nFkSvh99oGLW2zuZ",
    "_token": "SvVMOQsexe9RU9Oi"
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
    _token | string |  required  | The token required for authentication.

<!-- END_f453d442cbe270ed50c2def3a3416115 -->

<!-- START_7a7f674c347aaf46c9a4d9ea95713236 -->
## Post
It is a functionality of the user to create new posts on an ApexCom

> Example request:

```bash
curl -X POST "http://localhost/posts" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"8bBjlXr07OjaUJIS","body":"44YDiaaEvVAd3dE4","image_file":"4CXSr0YUCuvxrtEQ","image_type":"LYUVRUzpeKFaEqzv","video_url":"kud3ixdiccO3gOSU","link":"yHA1aIoTMedquHuG","_token":"DEq5TkotOLm1a9WU"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "8bBjlXr07OjaUJIS",
    "body": "44YDiaaEvVAd3dE4",
    "image_file": "4CXSr0YUCuvxrtEQ",
    "image_type": "LYUVRUzpeKFaEqzv",
    "video_url": "kud3ixdiccO3gOSU",
    "link": "yHA1aIoTMedquHuG",
    "_token": "DEq5TkotOLm1a9WU"
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
    ApexCom_id | string |  required  | The fullname of the community where the post is posted.
    body | string |  required  | The text body of the post.
    image_file | file |  optional  | The attached image to the post.
    image_type | string |  optional  | The type of the attached image to the post(png is default, jpg).
    video_url | string |  optional  | The url to attached video to the post.
    link | string |  optional  | The link attached to the post.
    _token | string |  required  | The token required for authentication.

<!-- END_7a7f674c347aaf46c9a4d9ea95713236 -->

<!-- START_7cd1c92845723362129d03191c93e958 -->
## Subscribe
It is a functionality of the user to subscribe/unsubscribe a specific ApexCom

> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"HetwV4yw6frpZyeS","_token":"DyCXmhKmvjxCeYLj"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "HetwV4yw6frpZyeS",
    "_token": "DyCXmhKmvjxCeYLj"
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
    _token | string |  required  | The token required for authentication.

<!-- END_7cd1c92845723362129d03191c93e958 -->

<!-- START_c3bc7678aa26afc45eeb4d785a212851 -->
## Admin

> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_name":"LyBcXVbyn2xeyqfO","description":"YN8YAvvvIrMzA2e1","type":"fu4iWUDbmvyZLmZc","header_image_file":"EQF9EEgJuOa3IcRe","header_image_type":"kOLfFNKOVahyS7fj","_token":"n4bpDjDpsLYL3Wxf"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_name": "LyBcXVbyn2xeyqfO",
    "description": "YN8YAvvvIrMzA2e1",
    "type": "fu4iWUDbmvyZLmZc",
    "header_image_file": "EQF9EEgJuOa3IcRe",
    "header_image_type": "kOLfFNKOVahyS7fj",
    "_token": "n4bpDjDpsLYL3Wxf"
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
    ApexCom_name | string |  required  | The name of the community.
    description | string |  required  | The description of the community.
    type | string |  required  | The type of the community(there are only three valid types public, restricted, private).
    header_image_file | file |  required  | The header image.
    header_image_type | string |  required  | The type of the header image (png is default, jpg).
    _token | string |  required  | The token required for authentication.

<!-- END_c3bc7678aa26afc45eeb4d785a212851 -->

<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## Search
Returns a list of lists of communities, posts and profiles that matches the given query

> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Content-Type: application/json" \
    -d '{"query":"FrGGlhq0atxCHqjy"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "FrGGlhq0atxCHqjy"
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
## SortPostsBy
Returns a list of posts in a given ApexComm sorted either by the votes or by the date

> Example request:

```bash
curl -X GET -G "http://localhost/sort_posts" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"1KNoeg1WN9XHd3Zi","SortingParam":"slHaOi1gRkBLJlDu","desc":true}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "1KNoeg1WN9XHd3Zi",
    "SortingParam": "slHaOi1gRkBLJlDu",
    "desc": true
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
    desc | boolean |  optional  | To specify wether the sort is descending or ascending, Default is true

<!-- END_05b3f813d60fda460fbe53c065926a61 -->

<!-- START_aab40918c3a3f4e3512a9b2c1177ea2b -->
## ApexNames
Returns a list of the names of the existing ApexComms
Success Cases :
1) Return the result successfully.

failure Cases:
1) Return empty list if there are no existing ApexComms

> Example request:

```bash
curl -X GET -G "http://localhost/Apex_names" 
```

```javascript
const url = new URL("http://localhost/Apex_names");

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
null
```

### HTTP Request
`GET Apex_names`


<!-- END_aab40918c3a3f4e3512a9b2c1177ea2b -->

<!-- START_b885f7f4714d80477084c1fd4bf3e729 -->
## Remove
it is a functionality to the moderator of an ApexCom to remove a post or comment

> Example request:

```bash
curl -X POST "http://localhost/remove" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"fKF7GySQJ5GgacZD","id":"sUtfv0Ohguk9w39Z","_token":"DmL4KVYkKLJ3he9o"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "fKF7GySQJ5GgacZD",
    "id": "sUtfv0Ohguk9w39Z",
    "_token": "DmL4KVYkKLJ3he9o"
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
    ApexCom_id | string |  required  | The fullname of the community where the comment or post is removed.
    id | string |  required  | The fullname of the comment or post to be removed.
    _token | string |  required  | The token required for authentication.

<!-- END_b885f7f4714d80477084c1fd4bf3e729 -->

<!-- START_e5b66986dff827722971ce82b286d979 -->
## Approve
it is a functionality to the moderator of an ApexCom to approve a post or comment

> Example request:

```bash
curl -X POST "http://localhost/approve" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"MPA5iGbCggT31nH0","id":"YlO9IgHa8hfAq6sO","_token":"e3EGoTjAf7x8EtKG"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "MPA5iGbCggT31nH0",
    "id": "YlO9IgHa8hfAq6sO",
    "_token": "e3EGoTjAf7x8EtKG"
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
    ApexCom_id | string |  required  | The fullname of the community where the comment or post is approved.
    id | string |  required  | The fullname of the comment or post to be approved.
    _token | string |  required  | The token required for authentication.

<!-- END_e5b66986dff827722971ce82b286d979 -->

<!-- START_ce137a9fb84ef6789f44be899ecab3fe -->
## Review reports
it is a functionality to the moderator of an ApexCom to view reported posts and comments

> Example request:

```bash
curl -X GET -G "http://localhost/review_reports" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"tCAmqcUQXOt7qiER","_token":"DfhfTnI3wGfNyGG3"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "tCAmqcUQXOt7qiER",
    "_token": "DfhfTnI3wGfNyGG3"
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
    ApexCom_id | string |  required  | The fullname of the community where the reported comments and posts.
    _token | string |  required  | The token required for authentication.

<!-- END_ce137a9fb84ef6789f44be899ecab3fe -->


