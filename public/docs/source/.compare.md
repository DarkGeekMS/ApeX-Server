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
    -d '{"name":"6PkFxNbBS2ZQsDAc","content":"Rocgz9SMueKHbpgK","parent_ID":"kRQiu6MS3EO8one5","AuthID":"zmnaAyc0dlT2IG3O"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "6PkFxNbBS2ZQsDAc",
    "content": "Rocgz9SMueKHbpgK",
    "parent_ID": "kRQiu6MS3EO8one5",
    "AuthID": "zmnaAyc0dlT2IG3O"
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
    -d '{"name":"fUCFLQo1CrzZauxi","ID":"GghDAy3vDTYctkTX"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "fUCFLQo1CrzZauxi",
    "ID": "GghDAy3vDTYctkTX"
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
    -d '{"name":"Iuyh9iCFXBPnyWGg","content":"9lMvYstRjIweB4tp","ID":"Pk9UXhO0Yqb5WpIb"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "Iuyh9iCFXBPnyWGg",
    "content": "9lMvYstRjIweB4tp",
    "ID": "Pk9UXhO0Yqb5WpIb"
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
    -d '{"name":"AkZVVVlSFt8Qjsv8","ID":"XqERt59k5zeG9Fk2"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "AkZVVVlSFt8Qjsv8",
    "ID": "XqERt59k5zeG9Fk2"
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
    -d '{"name":"nJINzKMmPvl3ItjG","ID":"UTzy4GdS0g34pKIh"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "nJINzKMmPvl3ItjG",
    "ID": "UTzy4GdS0g34pKIh"
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
    -d '{"parent":"mdTCM5ThUkXPMyjY","children":"GelhTHOEAXM1GJPW","ID":"1rQZvPh2uEiFzLQp"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "mdTCM5ThUkXPMyjY",
    "children": "GelhTHOEAXM1GJPW",
    "ID": "1rQZvPh2uEiFzLQp"
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
    -d '{"name":"1gBbljkjtg5hDstf","reason":8,"ID":"B5CyT8mUojMgMB2u"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "1gBbljkjtg5hDstf",
    "reason": 8,
    "ID": "B5CyT8mUojMgMB2u"
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
    -d '{"name":"yzE2rGAZTY4w7VbJ","dirction":11,"ID":"6JJ4pf6OYxvCewil"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "yzE2rGAZTY4w7VbJ",
    "dirction": 11,
    "ID": "6JJ4pf6OYxvCewil"
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
    -d '{"ID":"6EpK9UsNoUWiJg78","token":"7xkEAhvmcIA6CRT4"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "6EpK9UsNoUWiJg78",
    "token": "7xkEAhvmcIA6CRT4"
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
    -d '{"ID":"ZYuUXrMDHZc9RHzy","token":"4lXuMEUiMPY8NnXN"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "ZYuUXrMDHZc9RHzy",
    "token": "4lXuMEUiMPY8NnXN"
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
    -d '{"email":"aUiGs87GMdYODJZb","username":"zzq2OIYTJyfocSeM","password":"9hDSR1TGlZCmwCgv","verify_password":"VYD2sZKocm8pWzdF"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "aUiGs87GMdYODJZb",
    "username": "zzq2OIYTJyfocSeM",
    "password": "9hDSR1TGlZCmwCgv",
    "verify_password": "VYD2sZKocm8pWzdF"
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
    -d '{"username":"lyoUkygWCCaQXKQV","password":"ukGbcdUpQpvOHttk","remember_me":false}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "lyoUkygWCCaQXKQV",
    "password": "ukGbcdUpQpvOHttk",
    "remember_me": false
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
    -d '{"token":"tURTGoNqKGNfQcbH"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "tURTGoNqKGNfQcbH"
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
    -d '{"id":14,"token":"Vxx7U82T6M7T1vWh"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 14,
    "token": "Vxx7U82T6M7T1vWh"
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
    -d '{"ID":"1McpK0hJT69xAN6L","body":"v963Str3ECEXOcg2","read":false,"token":"kH08sbKmmjsZ458Z"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "1McpK0hJT69xAN6L",
    "body": "v963Str3ECEXOcg2",
    "read": false,
    "token": "kH08sbKmmjsZ458Z"
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
    -d '{"change_email":"TLaxbwUDobYZpPzf","change_password":"QWoWWy5ECdxqOwfa","deactivate_account":"OgvwFJ3EcEL63Mss","media_autoplay":false,"pm_notifications":true,"replies_notifications":false,"token":"QZwoG5l37TM0LsjD"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "TLaxbwUDobYZpPzf",
    "change_password": "QWoWWy5ECdxqOwfa",
    "deactivate_account": "OgvwFJ3EcEL63Mss",
    "media_autoplay": false,
    "pm_notifications": true,
    "replies_notifications": false,
    "token": "QZwoG5l37TM0LsjD"
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
    -d '{"token":"ip2OjVVfo7QpmKed"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "ip2OjVVfo7QpmKed"
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
    -d '{"token":"p51ZBNYqazX0V8oS"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "p51ZBNYqazX0V8oS"
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
    -d '{"ID":"b27GzfoFqeKkyYOd","token":"BERyXeoSpRoUG4kH"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "b27GzfoFqeKkyYOd",
    "token": "BERyXeoSpRoUG4kH"
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
    -d '{"max":4,"token":"0szdpEpAEonKSHEj"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 4,
    "token": "0szdpEpAEonKSHEj"
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
    -d '{"SubredditID":"aRjeJoliegwKmeeT","token":"0czVGpo6kTR4Vo7X"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "aRjeJoliegwKmeeT",
    "token": "0czVGpo6kTR4Vo7X"
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
    -d '{"UserID":"jWFA4CR1sCsIXaQJ","Reason":"KsfIKBu2F9EwkJCH","token":"fAS0qXRGWxmMiHNZ"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "jWFA4CR1sCsIXaQJ",
    "Reason": "KsfIKBu2F9EwkJCH",
    "token": "fAS0qXRGWxmMiHNZ"
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
    -d '{"SubredditID":"RQRUwai3XeVZwFJx","token":"j3KV8r0AgXagMNUd"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "RQRUwai3XeVZwFJx",
    "token": "j3KV8r0AgXagMNUd"
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
## Block a user, so he can&#039;t send private messages to the current user

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"id":"onAZyPVl3E6xV7Eb","token":"f0Lxa2nsXoW8CqdL"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "onAZyPVl3E6xV7Eb",
    "token": "f0Lxa2nsXoW8CqdL"
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
    -d '{"to":"lxGDB9OMZkilwzfT","subject":"RG3Bb2mg8hwoyqf4","mes":"mnOjRolWhhNLle4A","token":"8ippn2pzEncI6jXg"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "lxGDB9OMZkilwzfT",
    "subject": "RG3Bb2mg8hwoyqf4",
    "mes": "mnOjRolWhhNLle4A",
    "token": "8ippn2pzEncI6jXg"
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
    -d '{"id":"maJi0TyrqWb1Ydi9","token":"eQeELEZiCrtehL6s"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "maJi0TyrqWb1Ydi9",
    "token": "eQeELEZiCrtehL6s"
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
<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## about
> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"ahOif8EoGOO4JS7e","_token":"JNU17i6ZDUz6JRxq"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "ahOif8EoGOO4JS7e",
    "_token": "JNU17i6ZDUz6JRxq"
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
## posts
> Example request:

```bash
curl -X POST "http://localhost/posts" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"V4mrilBQeBbCnRQ0","body":"OhGGLnkFc5S3cOOy","image_file":"HqHDMNXlzryD8CZ1","image_type":"dMJ7OMrOHUi2VaBI","video_url":"K4aGDdcFRWiBPs9E","link":"NLrhpyHiEVm00vRH","_token":"fhFsbuudvrJqOMI0"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "V4mrilBQeBbCnRQ0",
    "body": "OhGGLnkFc5S3cOOy",
    "image_file": "HqHDMNXlzryD8CZ1",
    "image_type": "dMJ7OMrOHUi2VaBI",
    "video_url": "K4aGDdcFRWiBPs9E",
    "link": "NLrhpyHiEVm00vRH",
    "_token": "fhFsbuudvrJqOMI0"
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
## subscribe
> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"CbWMbWxAx8coKbUO","_token":"6F041Kke7vSRa1yf"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "CbWMbWxAx8coKbUO",
    "_token": "6F041Kke7vSRa1yf"
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
## site_admin
> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_name":"bYKPY6uFNEKECmCh","description":"Gg2RKTD41rGnsOZI","type":"zntJl70EJYFAUAEM","header_image_file":"te0SJ8OIYodHYjeT","header_image_type":"51fycP7dAqVJNDLj","_token":"SmDGSZiFfVJwyay1"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_name": "bYKPY6uFNEKECmCh",
    "description": "Gg2RKTD41rGnsOZI",
    "type": "zntJl70EJYFAUAEM",
    "header_image_file": "te0SJ8OIYodHYjeT",
    "header_image_type": "51fycP7dAqVJNDLj",
    "_token": "SmDGSZiFfVJwyay1"
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
## search
> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Content-Type: application/json" \
    -d '{"title":"w7UbYpkrLyb54PzH","body":"rMGTwxF8npa5I8mN","type":"NsMC61qK37Wsdlxs","author_id":12,"thumbnail":"dVm1339ilWxd66a1"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "w7UbYpkrLyb54PzH",
    "body": "rMGTwxF8npa5I8mN",
    "type": "NsMC61qK37Wsdlxs",
    "author_id": 12,
    "thumbnail": "dVm1339ilWxd66a1"
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
    -d '{"title":"smhkc9VZaLd3b5CI","body":"Tqt0e7EQdktltGz2","type":"zIEXyPi5Rfa3em5U","author_id":15,"thumbnail":"9vf7FaKzqmYgTV6k"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "smhkc9VZaLd3b5CI",
    "body": "Tqt0e7EQdktltGz2",
    "type": "zIEXyPi5Rfa3em5U",
    "author_id": 15,
    "thumbnail": "9vf7FaKzqmYgTV6k"
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
    -d '{"title":"y771zy0u5kATyhfp","body":"h73UlLtbdZpEMDW0","type":"GDHqPY7Q8qnWI0re","author_id":3,"thumbnail":"gqSq1E7Fp0mIsap6"}'

```

```javascript
const url = new URL("http://localhost/Apex_names");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "y771zy0u5kATyhfp",
    "body": "h73UlLtbdZpEMDW0",
    "type": "GDHqPY7Q8qnWI0re",
    "author_id": 3,
    "thumbnail": "gqSq1E7Fp0mIsap6"
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
    -d '{"ApexCom_id":"AJ6HUa9zDWS3lmie","id":"NCbp6BNDblIHipOh","_token":"3uZ4iLBBPfDioO8l"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "AJ6HUa9zDWS3lmie",
    "id": "NCbp6BNDblIHipOh",
    "_token": "3uZ4iLBBPfDioO8l"
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
## approve
> Example request:

```bash
curl -X POST "http://localhost/approve" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"AFdKb89kLrZX4UDO","id":"lgAYoXTQNsrbbAZZ","_token":"WwpjTANXOa8EUxQb"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "AFdKb89kLrZX4UDO",
    "id": "lgAYoXTQNsrbbAZZ",
    "_token": "WwpjTANXOa8EUxQb"
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
## review_reports
> Example request:

```bash
curl -X GET -G "http://localhost/review_reports" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"KFmco7LdvVZnTkSp","_token":"9JzhCPm6fVuvlSlm"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "KFmco7LdvVZnTkSp",
    "_token": "9JzhCPm6fVuvlSlm"
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


