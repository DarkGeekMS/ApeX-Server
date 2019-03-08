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
## SignUp.

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
    -H "Content-Type: application/json" \
    -d '{"email":"dG56Uay3giCbqrxy","username":"Vy2NtWuHA7PymnQ8","password":"xyDFcXZSM2ikbYwE","verify_password":"tG0CS1cYMNFBQw3p","userImage":"LyEdjpnRp0QGRz8M"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "dG56Uay3giCbqrxy",
    "username": "Vy2NtWuHA7PymnQ8",
    "password": "xyDFcXZSM2ikbYwE",
    "verify_password": "tG0CS1cYMNFBQw3p",
    "userImage": "LyEdjpnRp0QGRz8M"
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
## Login.

Validates user's credentials and logs him in.
Success Cases :
1) return true to ensure that the user loggedin successfully.
failure Cases:
1) username is not found.
2) invalid password.

> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Content-Type: application/json" \
    -d '{"username":"fMUHhj0HSor2O0l4","password":"DFe14TOJhtdjTJN7"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "fMUHhj0HSor2O0l4",
    "password": "DFe14TOJhtdjTJN7"
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

<!-- START_99ada3ad1c00101e557456766317db7b -->
## Logout.

Logs out a user.
Success Cases :
1) return true to ensure that the user is logout successfully.
failure Cases:
1) user ID already logged out.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Content-Type: application/json" \
    -d '{"token":"2EEHUYyOLqqVUOis"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "2EEHUYyOLqqVUOis"
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
## DeleteMsg.

Delete private messages from the recipient's view of their inbox.
Success Cases :
1) return true to ensure that the message is deleted successfully.
failure Cases:
1) message id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":"lfNaQgG2O63yeawB","token":"5dO7N4mZ68ivVbbE"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "lfNaQgG2O63yeawB",
    "token": "5dO7N4mZ68ivVbbE"
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
## ReadMsg.

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
    -H "Content-Type: application/json" \
    -d '{"ID":"cjquDQgpDKB8gu2A","token":"tyPcxR3aNqqdp2Cu"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "cjquDQgpDKB8gu2A",
    "token": "tyPcxR3aNqqdp2Cu"
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
## Updates.

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
    -H "Content-Type: application/json" \
    -d '{"change_email":"bpyKyEORx1GhHr2B","change_password":"ogfXD8d63w19GDdw","deactivate_account":"qzTxLAdHWmeu2KMl","media_autoplay":false,"pm_notifications":true,"replies_notifications":false,"token":"k3WO9RkCUwGFMuXs"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "bpyKyEORx1GhHr2B",
    "change_password": "ogfXD8d63w19GDdw",
    "deactivate_account": "qzTxLAdHWmeu2KMl",
    "media_autoplay": false,
    "pm_notifications": true,
    "replies_notifications": false,
    "token": "k3WO9RkCUwGFMuXs"
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
## Prefs.

Returns the preferences of the user.
Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/prefs" \
    -H "Content-Type: application/json" \
    -d '{"token":"zHfwRLVCsHj6c7xJ"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "zHfwRLVCsHj6c7xJ"
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
## Me.

Returns the identity of the user logged in.
Success Cases :
1) return the user ID of the sent token.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/me" \
    -H "Content-Type: application/json" \
    -d '{"token":"d8PCwO3ZWrWYvBXG"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "d8PCwO3ZWrWYvBXG"
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
## ProfileInfo
Displaying the profile info of the user.

Success Cases :
1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Content-Type: application/json" \
    -d '{"token":"YUySzZ087kASh4fT"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "YUySzZ087kASh4fT"
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
## Karma.

Returns the karma of the user.
Success Cases :
1) return the karmas of the user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/karma" \
    -H "Content-Type: application/json" \
    -d '{"token":"Uj4xSy9jscCbrkVd"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "Uj4xSy9jscCbrkVd"
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
## Messages.

Returns the inbox messages of the user.
Success Cases :
1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/messages" \
    -H "Content-Type: application/json" \
    -d '{"max":13,"token":"hgUHQ6lEua5S4Xke"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 13,
    "token": "hgUHQ6lEua5S4Xke"
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
## DeleteApexCom.

Deleting the ApexCom by the admin.
Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"WeclczkLdSwaxNxK","token":"jjWOKQr1zxCmWJf2"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "WeclczkLdSwaxNxK",
    "token": "jjWOKQr1zxCmWJf2"
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
## DeleteUser.

Delete a user from the application by the admin.
Success Cases :
1) return true to ensure that the user is deleted successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"F9In08jVhuQTGXkq","Reason":"j05NPVgT3kAeCV5H","token":"2psMebzM7y4HbIij"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "F9In08jVhuQTGXkq",
    "Reason": "j05NPVgT3kAeCV5H",
    "token": "2psMebzM7y4HbIij"
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
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## AddModerator.

Adding a moderator to ApexCom.
Success Cases :
1) return true to ensure that the moderator is added successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"ZUkQ9pC1t9QXA8ez","token":"Am4rT8YH5d5NBaKw","UserID":"49hoIQfKGZHojrrm"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "ZUkQ9pC1t9QXA8ez",
    "token": "Am4rT8YH5d5NBaKw",
    "UserID": "49hoIQfKGZHojrrm"
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
    UserID | required |  optional  | The user ID to be added as a moderator.

<!-- END_0277897590e5bd3534956fc7b78f21cd -->

#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_f453d442cbe270ed50c2def3a3416115 -->
## About.

to get data about an ApexCom (moderators , contributors , rules , description and subscribers count).
Success Cases :
1) return the information about the ApexCom.
failure Cases:
1) NoAccessRight the token does not support to view the about information.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/about" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"cy91HNo4yMaoiOiI","_token":"LEkGMvQ9t7PLWpFx"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "cy91HNo4yMaoiOiI",
    "_token": "LEkGMvQ9t7PLWpFx"
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
## Posts.

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
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"6KpXbtwU5Wo5woBY","body":"HNfnqng5G89LmS3H","img_name":"5TQxn2iIm0YMMztP","video_url":"orTbdBHnHXUIJ29i","isLocked":false,"_token":"CXBMwfXivou4228K"}'

```

```javascript
const url = new URL("http://localhost/submit_post");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "6KpXbtwU5Wo5woBY",
    "body": "HNfnqng5G89LmS3H",
    "img_name": "5TQxn2iIm0YMMztP",
    "video_url": "orTbdBHnHXUIJ29i",
    "isLocked": false,
    "_token": "CXBMwfXivou4228K"
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
## Subscribe.

for a user to subscribe in any ApexCom.
Success Cases :
1) return true to ensure that the subscription or unsubscribtion has been done successfully.
failure Cases:
1) NoAccessRight the token does not support to subscribe this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/subscribe" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"h4xgSoFGRPW7W0AS","_token":"4hd6v4HdLOh8tknW"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "h4xgSoFGRPW7W0AS",
    "_token": "4hd6v4HdLOh8tknW"
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
## SiteAdmin.

used by the site admin to create new ApexCom.
Success Cases :
1) return true to ensure that the ApexCom was created  successfully.
failure Cases:
1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
2) Wrong or unsufficient submitted information.

> Example request:

```bash
curl -X POST "http://localhost/site_admin" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_name":"2835ZPwyBs242Sb9","description":"VqiswBhNi2KYxvZS","rules":"9zEQEup5PUFmSQ1O","img_name":"hw5Sqyet5uVsrOdN","_token":"377l33zS3eaA9Gtz"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_name": "2835ZPwyBs242Sb9",
    "description": "VqiswBhNi2KYxvZS",
    "rules": "9zEQEup5PUFmSQ1O",
    "img_name": "hw5Sqyet5uVsrOdN",
    "_token": "377l33zS3eaA9Gtz"
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
## Add.

submit a new comment or reply to a comment on a post.
Success Cases :
1) return true to ensure that the comment , reply is added successfully.
failure Cases:
1) post fullname (ID) is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Content-Type: application/json" \
    -d '{"name":"hvbGXbcZEX3Q2pak","content":"HDfWG6hWkuhgBTpb","parent_ID":"Kr8FlZ0NMxZ6SQPt","AuthID":"ywQZP3KJ4TQmmvlv"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "hvbGXbcZEX3Q2pak",
    "content": "HDfWG6hWkuhgBTpb",
    "parent_ID": "Kr8FlZ0NMxZ6SQPt",
    "AuthID": "ywQZP3KJ4TQmmvlv"
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
## Delete.

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
    -H "Content-Type: application/json" \
    -d '{"name":"CSs6dVEg9jJkAs08","ID":"mTePM2gEQY3swLfI"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "CSs6dVEg9jJkAs08",
    "ID": "mTePM2gEQY3swLfI"
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
## EditText.

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
    -H "Content-Type: application/json" \
    -d '{"name":"vjW00bYze3juq7FJ","content":"yRV9NInyxRJ9CH0I","ID":"Z6IXRtvGqZzJRbru"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "vjW00bYze3juq7FJ",
    "content": "yRV9NInyxRJ9CH0I",
    "ID": "Z6IXRtvGqZzJRbru"
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
## Report.

report a post , comment or a message to the ApexCom moderator ( message's reports will be sent to the site admin), posts or comments will be hidden implicitly as well.
( moderators don't report posts).
Success Cases :
1) return true to ensure that the report is sent to the moderator of the ApexCom.
failure Cases:
1) send reason (index) out of the associative array range.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/report" \
    -H "Content-Type: application/json" \
    -d '{"name":"vwS3cGu5IlksJoYN","reason":13,"ID":"egny6fQk1tAm3T4J"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "vwS3cGu5IlksJoYN",
    "reason": 13,
    "ID": "egny6fQk1tAm3T4J"
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
## Vote.

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
    -H "Content-Type: application/json" \
    -d '{"name":"ALjroeAQRR2ZWkTJ","dirction":20,"ID":"jp0L9VKqPKNp9Z6Y"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ALjroeAQRR2ZWkTJ",
    "dirction": 20,
    "ID": "jp0L9VKqPKNp9Z6Y"
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

<!-- START_e397a543c2de11e8173058943ccbae1e -->
## Lock.

to lock or unlock a post so it can't recieve new comments.
Success Cases :
1) return true to ensure that the post was locked.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.
3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.

> Example request:

```bash
curl -X POST "http://localhost/lock_post" \
    -H "Content-Type: application/json" \
    -d '{"name":"OcyMCt6ZrT9P0po3","ID":"ljhpb7ipL6VZ8qVD"}'

```

```javascript
const url = new URL("http://localhost/lock_post");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "OcyMCt6ZrT9P0po3",
    "ID": "ljhpb7ipL6VZ8qVD"
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
## Hide.

to hide or UnHide a post from the user view.
Success Cases :
1) return true to ensure that the post hidden.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/Hide" \
    -H "Content-Type: application/json" \
    -d '{"name":"rmcaj9uI8udra1jz","ID":"hWooyzJeImv3p2Vt"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "rmcaj9uI8udra1jz",
    "ID": "hWooyzJeImv3p2Vt"
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
## Save.

Save or UnSave a post or a comment.
Success Cases :
1) return true to ensure that the post saved successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Content-Type: application/json" \
    -d '{"ID":"pjHnbel8lggyJMPi","token":"sgVm7WDm1UM3WxOw"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "pjHnbel8lggyJMPi",
    "token": "sgVm7WDm1UM3WxOw"
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

<!-- START_157f1ca43f755f92777fe075f012a2d4 -->
## MoreChildren.

to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).
Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X GET -G "http://localhost/moreComm" \
    -H "Content-Type: application/json" \
    -d '{"parent":"aLrMDXmado4bXs4g","ID":"kfeq1ZwkNxFiDFsm"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "aLrMDXmado4bXs4g",
    "ID": "kfeq1ZwkNxFiDFsm"
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
    parent | string |  required  | The fullname of the posts whose comments are being fetched ( post , comment or message ).
    ID | JWT |  required  | Verifying user ID.

<!-- END_157f1ca43f755f92777fe075f012a2d4 -->

#Moderation

Controls the Moderators actions.
<!-- START_7d644ee67f837554ee42b61c3180377e -->
## IgnoreReport.

to delete the ignored report from  ApexCom's reports.
Success Cases :
1) return true to ensure that the report is deleted successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
2) report fullname (id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/report_action" \
    -H "Content-Type: application/json" \
    -d '{"report_id":"eJpRUEYiDSb2CKLk","_token":"kaQX1AYYJYDduq9E"}'

```

```javascript
const url = new URL("http://localhost/report_action");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "eJpRUEYiDSb2CKLk",
    "_token": "kaQX1AYYJYDduq9E"
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
## ReviewReports.

view the reports sent by any user for any post or comment in the ApexCom he is moderator in.
Success Cases :
1) return the reported posts and comments.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.

> Example request:

```bash
curl -X GET -G "http://localhost/review_reports" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"yGFn6sDCL62Jnnbf","_token":"ZMqgP6JxR1amq2xE"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "yGFn6sDCL62Jnnbf",
    "_token": "ZMqgP6JxR1amq2xE"
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
## Block.

Block a user, so he can't send private messages or see the blocked user posts or comments.
Success Cases :
1) return true to ensure that the user is blocked successfully.
failure Cases:
1) blockeduser id is not found or already blocked for the current user.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"id":"MHerHWEsaPkUj3oL","token":"MgF7PzjkniSPGQfx"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "MHerHWEsaPkUj3oL",
    "token": "MgF7PzjkniSPGQfx"
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
## Compose.

Send a private message to another user.
Success Cases :
1) return true to ensure that the message sent successfully.
failure Cases:
1) messaged-user id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"to":"UCo6FctaXzVR16hR","subject":"78IZG7JDbPdqUuGv","mes":"7kt3hCoB7cuaEAeX","token":"UPj1nsv7ZnGoyaD5"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "UCo6FctaXzVR16hR",
    "subject": "78IZG7JDbPdqUuGv",
    "mes": "7kt3hCoB7cuaEAeX",
    "token": "UPj1nsv7ZnGoyaD5"
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
## UserDataByAccountID.

Return user public data to be seen by another user.
Success Cases :
1) return the data of the user successfully.
failure Cases:
1) username is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"id":"wVY6cnxM09HrTqov","token":"1EBxd6IYOeXLiwpU"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "wVY6cnxM09HrTqov",
    "token": "1EBxd6IYOeXLiwpU"
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
## Search.

Returns a list of lists of ApexComs, posts and profiles that matches the given query.
Success Cases :
1) Return the result successfully.
failure Cases:
1) No matches found.

> Example request:

```bash
curl -X GET -G "http://localhost/search" \
    -H "Content-Type: application/json" \
    -d '{"query":"f0OUhZu6qY9InERg"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "f0OUhZu6qY9InERg"
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
## SortPostsBy.

Returns a list of posts in a given ApexComm sorted either by the votes or by the date.
Success Cases :
1) Return the result successfully.
failure Cases:
1) ApexComm fullname (ID) is not found.
2) The given parameter is out of the specified values, in this case it uses the default values.

> Example request:

```bash
curl -X GET -G "http://localhost/sort_posts" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"SujHeOUQR1vxgpHs","SortingParam":"cUBoNXmG4PnLbrT8"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "SujHeOUQR1vxgpHs",
    "SortingParam": "cUBoNXmG4PnLbrT8"
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
## ApexNames.

Returns a list of the names of the existing ApexComms.
Success Cases :
1) Return the result successfully.
failure Cases:
1) Return empty list if there are no existing ApexComms.

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


