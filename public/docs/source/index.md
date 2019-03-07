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
    -d '{"name":"z8lEqM9DnaLgDTZv","content":"QDkXgALZNLMO0rrl","parent_ID":"v87dT4hraL0XTRUO","AuthID":"q4facdJcoXwL3qka"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "z8lEqM9DnaLgDTZv",
    "content": "QDkXgALZNLMO0rrl",
    "parent_ID": "v87dT4hraL0XTRUO",
    "AuthID": "q4facdJcoXwL3qka"
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
    -d '{"name":"lBTRrx2jJNFN9ajn","ID":"oicSSED4dg3qKeXc"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "lBTRrx2jJNFN9ajn",
    "ID": "oicSSED4dg3qKeXc"
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
    -d '{"name":"8paQxfaadueSQXn5","content":"H3tDPzkBStdB2Wy0","ID":"uWDgp73UuTASTWJV"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "8paQxfaadueSQXn5",
    "content": "H3tDPzkBStdB2Wy0",
    "ID": "uWDgp73UuTASTWJV"
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
    -d '{"name":"Vva8Ekx6LFZCJc09","ID":"jv03kidQ1o9pVjOJ"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "Vva8Ekx6LFZCJc09",
    "ID": "jv03kidQ1o9pVjOJ"
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
    -d '{"name":"7r5nZKkkPNYVB7ay","ID":"T997AVfp9MIW71au"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "7r5nZKkkPNYVB7ay",
    "ID": "T997AVfp9MIW71au"
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
    -d '{"parent":"JW0LzTnYCMxB6mpk","children":"pG8oPgml6nqh6SMW","ID":"CyOf8fIFL6ZzukTh"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "JW0LzTnYCMxB6mpk",
    "children": "pG8oPgml6nqh6SMW",
    "ID": "CyOf8fIFL6ZzukTh"
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
    -d '{"name":"hqgzgg1EmOEBjslc","reason":12,"ID":"xxV4xZnb8oerPlYL"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "hqgzgg1EmOEBjslc",
    "reason": 12,
    "ID": "xxV4xZnb8oerPlYL"
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
    -d '{"name":"1xDV6zWY3vbFt0oI","dirction":3,"ID":"Yqy9KssmT0ZmBlr6"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "1xDV6zWY3vbFt0oI",
    "dirction": 3,
    "ID": "Yqy9KssmT0ZmBlr6"
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
    -d '{"ID":"VqQTEJaqfKlDuqjQ","token":"sXmOYA1KJVrNjH5J"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "VqQTEJaqfKlDuqjQ",
    "token": "sXmOYA1KJVrNjH5J"
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
    -d '{"ID":"m2y0Vfsop0xXPpJj","token":"tTNnCkvFvYLT5FC8"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "m2y0Vfsop0xXPpJj",
    "token": "tTNnCkvFvYLT5FC8"
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

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "KKRPGJ6TxrFLHlQx",
    "token": "3OMKXC79PnDvQ359"
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
    -d '{"UserID":"AWMXb8u0MfApTbjE","Reason":"LFIfZ11KK7BK8oL2","token":"exn1DYn3RHPczwcW"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "AWMXb8u0MfApTbjE",
    "Reason": "LFIfZ11KK7BK8oL2",
    "token": "exn1DYn3RHPczwcW"
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
    -d '{"SubredditID":"kXs7VXbiKziPiBQY","token":"qtpGUno1UcA5ild1"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "SubredditID": "kXs7VXbiKziPiBQY",
    "token": "qtpGUno1UcA5ild1"
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
    -d '{"id":"zz2PsNnK4cAZQMpQ","token":"0YfWtFg2JdWdR2Ae"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "zz2PsNnK4cAZQMpQ",
    "token": "0YfWtFg2JdWdR2Ae"
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
    -d '{"to":"8r1fFlkLVTrBMa11","subject":"LfhBaYZqdTAFKkz7","mes":"WtK0PtflGDM6w5ev","token":"s2xdOuQYI70X3fcK"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "to": "8r1fFlkLVTrBMa11",
    "subject": "LfhBaYZqdTAFKkz7",
    "mes": "WtK0PtflGDM6w5ev",
    "token": "s2xdOuQYI70X3fcK"
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
    -d '{"id":"jrk8zMUB8q9yF3Nh","token":"j7m5vMSX7gcTmFl0"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "jrk8zMUB8q9yF3Nh",
    "token": "j7m5vMSX7gcTmFl0"
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
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## sign_up
> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"title":"nN83YBml97h6526k","body":"wPuvvA9Ywaf6CmoH","type":"kHUtH1AwEwIAyoLx","author_id":1,"thumbnail":"Ve7M6wcrBjPcMYKg"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "nN83YBml97h6526k",
    "body": "wPuvvA9Ywaf6CmoH",
    "type": "kHUtH1AwEwIAyoLx",
    "author_id": 1,
    "thumbnail": "Ve7M6wcrBjPcMYKg"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_3a06114e88089d07a3c29bdb6f844602 -->

<!-- START_f2f2bd15a0a3125617af6284631682f0 -->
## Sign_in
> Example request:

```bash
curl -X POST "http://localhost/Sign_in" \
    -H "Content-Type: application/json" \
    -d '{"title":"VAOS83cWRfUnT35N","body":"dQt0XbgvYghWKfGa","type":"GCoOe8Kw8wDDWpCd","author_id":8,"thumbnail":"HqknQKDmB1iluC0s"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "VAOS83cWRfUnT35N",
    "body": "dQt0XbgvYghWKfGa",
    "type": "GCoOe8Kw8wDDWpCd",
    "author_id": 8,
    "thumbnail": "HqknQKDmB1iluC0s"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_f2f2bd15a0a3125617af6284631682f0 -->

<!-- START_99ada3ad1c00101e557456766317db7b -->
## sign_out
> Example request:

```bash
curl -X POST "http://localhost/sign_out" \
    -H "Content-Type: application/json" \
    -d '{"title":"MRnXtJITf5buubEE","body":"GIYkAhzmVJA3MoMP","type":"5v0VDosqAzNZgc0v","author_id":19,"thumbnail":"1emxSEi9WRFWQPf7"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "MRnXtJITf5buubEE",
    "body": "GIYkAhzmVJA3MoMP",
    "type": "5v0VDosqAzNZgc0v",
    "author_id": 19,
    "thumbnail": "1emxSEi9WRFWQPf7"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_99ada3ad1c00101e557456766317db7b -->

<!-- START_cb128bb391940d8304e5ebb273373143 -->
## Delete private messages from the recipient&#039;s view of their inbox

> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"id":"be93TCW71WO6v5JD","token":"KBGiAgpeDwpnulqx"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "be93TCW71WO6v5JD",
    "token": "KBGiAgpeDwpnulqx"
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
    id | string |  required  | The fullname of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
## ReadMsg
Read a sent message

> Example request:

```bash
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
    -d '{"ID":"7busofMdC4Obkp9T","body":"M1hjls9DPWBONyU9","read":true,"token":"uYMJbyffpu8KhjyL"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "7busofMdC4Obkp9T",
    "body": "M1hjls9DPWBONyU9",
    "read": true,
    "token": "uYMJbyffpu8KhjyL"
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
## updateprefs
> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
    -d '{"title":"NBdOYd5GprOksNcR","body":"Bh7qiB0ypjYjtPX7","type":"l0p1KnZsmb9hFfFR","author_id":15,"thumbnail":"lV18cyRbJoC4YWrV"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "NBdOYd5GprOksNcR",
    "body": "Bh7qiB0ypjYjtPX7",
    "type": "l0p1KnZsmb9hFfFR",
    "author_id": 15,
    "thumbnail": "lV18cyRbJoC4YWrV"
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
    -d '{"title":"2nIDmfQDJfgcdTAP","body":"dA5CR819N8DmVVSh","type":"G3fyv1Q2sbVqfThg","author_id":12,"thumbnail":"9q4ymaEj3pm3PUSt"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2nIDmfQDJfgcdTAP",
    "body": "dA5CR819N8DmVVSh",
    "type": "G3fyv1Q2sbVqfThg",
    "author_id": 12,
    "thumbnail": "9q4ymaEj3pm3PUSt"
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
    -d '{"title":"yAZiu1h1Z1Wmp9My","body":"h8bL0iEcfAbsb9Ri","type":"Fu3Y6YYCqoy0iQj0","author_id":1,"thumbnail":"8XQvUqWpdhbOxIhZ"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "yAZiu1h1Z1Wmp9My",
    "body": "h8bL0iEcfAbsb9Ri",
    "type": "Fu3Y6YYCqoy0iQj0",
    "author_id": 1,
    "thumbnail": "8XQvUqWpdhbOxIhZ"
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
    -d '{"ID":"XFBAnpZK6yZoRJzv","token":"xP3yxuhRh3ONRtL6"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "XFBAnpZK6yZoRJzv",
    "token": "xP3yxuhRh3ONRtL6"
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
    -d '{"title":"g4j7ff8xTEOMirv6","body":"ar2t3SIGzn9Drmaa","type":"KezdVYxmDBR1s2gy","author_id":6,"thumbnail":"6TkW6w7pMpzUWzRT"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "g4j7ff8xTEOMirv6",
    "body": "ar2t3SIGzn9Drmaa",
    "type": "KezdVYxmDBR1s2gy",
    "author_id": 6,
    "thumbnail": "6TkW6w7pMpzUWzRT"
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
    -d '{"title":"eEkQiqRLPWzWS6IP","body":"6TEH15ygwlrqkv8z","type":"ww2nzgP54NxBu4Ep","author_id":20,"thumbnail":"dksdUXHNbSMBRjjW"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "eEkQiqRLPWzWS6IP",
    "body": "6TEH15ygwlrqkv8z",
    "type": "ww2nzgP54NxBu4Ep",
    "author_id": 20,
    "thumbnail": "dksdUXHNbSMBRjjW"
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
    -d '{"title":"qwMRnhkWEyieQ5TU","body":"X8o639wcEqJlzyl1","type":"toLy67mkmTP97H6t","author_id":15,"thumbnail":"qD65MqzJZ19GPKqI"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qwMRnhkWEyieQ5TU",
    "body": "X8o639wcEqJlzyl1",
    "type": "toLy67mkmTP97H6t",
    "author_id": 15,
    "thumbnail": "qD65MqzJZ19GPKqI"
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
    -d '{"title":"Fv7fojxDuDI1Gfcj","body":"LGC4xRYH9BcfZwnb","type":"TMYGISnTVSEvDNxz","author_id":5,"thumbnail":"mz4A5C0fILnyN94K"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Fv7fojxDuDI1Gfcj",
    "body": "LGC4xRYH9BcfZwnb",
    "type": "TMYGISnTVSEvDNxz",
    "author_id": 5,
    "thumbnail": "mz4A5C0fILnyN94K"
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
    -d '{"title":"aJn6lD7YdA5eZaSw","body":"OslsWEjsYcjZs3eZ","type":"zybLE5CUCcooYb16","author_id":14,"thumbnail":"nEo9vm7h4xpNB8bk"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "aJn6lD7YdA5eZaSw",
    "body": "OslsWEjsYcjZs3eZ",
    "type": "zybLE5CUCcooYb16",
    "author_id": 14,
    "thumbnail": "nEo9vm7h4xpNB8bk"
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
    -d '{"title":"cPNbjBWfPTFrhqBc","body":"Z5AdBaZrRurrdxNB","type":"iARvs6yNxZiH0z9K","author_id":1,"thumbnail":"4aFn5UZ2REEvFUdL"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "cPNbjBWfPTFrhqBc",
    "body": "Z5AdBaZrRurrdxNB",
    "type": "iARvs6yNxZiH0z9K",
    "author_id": 1,
    "thumbnail": "4aFn5UZ2REEvFUdL"
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
    -d '{"title":"uYGtoiqwg0SDWlBl","body":"jx1z3VRUZpRNYWdJ","type":"0kBwl6y1SFmcNH6Z","author_id":2,"thumbnail":"eN3RDm99ywTd0aox"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "uYGtoiqwg0SDWlBl",
    "body": "jx1z3VRUZpRNYWdJ",
    "type": "0kBwl6y1SFmcNH6Z",
    "author_id": 2,
    "thumbnail": "eN3RDm99ywTd0aox"
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
    -d '{"title":"8gt4Ro05IRhEhsW7","body":"Tqr7tFfoNKiIkXmo","type":"pTqjigfX7Zwz44yh","author_id":20,"thumbnail":"VOQZYKdXnLJ53EfV"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8gt4Ro05IRhEhsW7",
    "body": "Tqr7tFfoNKiIkXmo",
    "type": "pTqjigfX7Zwz44yh",
    "author_id": 20,
    "thumbnail": "VOQZYKdXnLJ53EfV"
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
    -d '{"title":"Z7F685mGH9zRnEsT","body":"hXJFZFfhkoAlRyfl","type":"Bm6qZdX3q4nGbVO2","author_id":18,"thumbnail":"lRCczsVaZ20MGp8Y"}'

```

```javascript
const url = new URL("http://localhost/Apex_names");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Z7F685mGH9zRnEsT",
    "body": "hXJFZFfhkoAlRyfl",
    "type": "Bm6qZdX3q4nGbVO2",
    "author_id": 18,
    "thumbnail": "lRCczsVaZ20MGp8Y"
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


