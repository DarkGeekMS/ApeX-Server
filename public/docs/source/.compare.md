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
    -d '{"name":"5ly0qKWFTyTBPLq4","content":"23FvxCAC9US99dVM","parent_ID":"hhlMWuE4fBvdGXCH","AuthID":"zIy3ZaZ6vAfraClK"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "5ly0qKWFTyTBPLq4",
    "content": "23FvxCAC9US99dVM",
    "parent_ID": "hhlMWuE4fBvdGXCH",
    "AuthID": "zIy3ZaZ6vAfraClK"
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
    -d '{"name":"fT803dM1FTSeX4Yi","ID":"IkMMkI72xAc6StMs"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "fT803dM1FTSeX4Yi",
    "ID": "IkMMkI72xAc6StMs"
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
    -d '{"name":"HJXxzFd3spsrrStF","content":"fVHtIrrQdVxIv6Hi","ID":"zTY1MOxuZnOakZpA"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "HJXxzFd3spsrrStF",
    "content": "fVHtIrrQdVxIv6Hi",
    "ID": "zTY1MOxuZnOakZpA"
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
    -d '{"name":"DLurINP95Qm3UQjK","ID":"ssCdVEIMk9oypURj"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "DLurINP95Qm3UQjK",
    "ID": "ssCdVEIMk9oypURj"
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
    -d '{"name":"zSs56PYeFWmuT1Qt","ID":"cTo93DtECaa4Suwb"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "zSs56PYeFWmuT1Qt",
    "ID": "cTo93DtECaa4Suwb"
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
    -d '{"parent":"3OurhHTecvUBrXPs","children":"KO9sJzPcM2PPJ5GA","ID":"3wnxBS9N8CBCWsgB"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "3OurhHTecvUBrXPs",
    "children": "KO9sJzPcM2PPJ5GA",
    "ID": "3wnxBS9N8CBCWsgB"
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
    -d '{"name":"3yDd4cITHt8Llvoh","reason":1,"ID":"MXa6zTu1f3P7KbzP"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "3yDd4cITHt8Llvoh",
    "reason": 1,
    "ID": "MXa6zTu1f3P7KbzP"
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
    -d '{"name":"ziaWfFhirTsIS88z","dirction":11,"ID":"0lnL4rPv8hV0NFFs"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ziaWfFhirTsIS88z",
    "dirction": 11,
    "ID": "0lnL4rPv8hV0NFFs"
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
## save
> Example request:

```bash
curl -X POST "http://localhost/save" \
    -H "Content-Type: application/json" \
    -d '{"title":"dQRM7Wt37OrVtkyi","body":"8thPNkdJlNkiEPRA","type":"R9UdGn37D96Zqpla","author_id":17,"thumbnail":"xDaCC706CflsyGlB"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "dQRM7Wt37OrVtkyi",
    "body": "8thPNkdJlNkiEPRA",
    "type": "R9UdGn37D96Zqpla",
    "author_id": 17,
    "thumbnail": "xDaCC706CflsyGlB"
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
    -d '{"title":"S9MH8qRXzjQqX9qY","body":"1T4rmHyWfAlqy3qM","type":"4IVjycZBtJvSqIAD","author_id":14,"thumbnail":"3j7mnzu7kmyKX0mA"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "S9MH8qRXzjQqX9qY",
    "body": "1T4rmHyWfAlqy3qM",
    "type": "4IVjycZBtJvSqIAD",
    "author_id": 14,
    "thumbnail": "3j7mnzu7kmyKX0mA"
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

#general
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## sign_up
> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"title":"eV37240F14fhyHYF","body":"uDdW6b8tCr8PkTME","type":"zy5aYXSwDshL7r8J","author_id":20,"thumbnail":"GuSRbvapdvjcCqYj"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "eV37240F14fhyHYF",
    "body": "uDdW6b8tCr8PkTME",
    "type": "zy5aYXSwDshL7r8J",
    "author_id": 20,
    "thumbnail": "GuSRbvapdvjcCqYj"
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
    -d '{"title":"tWIPUcRXDbIoV5ut","body":"kw80thFMxZETd7XM","type":"h4pQkbhALO5ry2gU","author_id":10,"thumbnail":"VbHw9BoBWo7anv56"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "tWIPUcRXDbIoV5ut",
    "body": "kw80thFMxZETd7XM",
    "type": "h4pQkbhALO5ry2gU",
    "author_id": 10,
    "thumbnail": "VbHw9BoBWo7anv56"
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
    -d '{"title":"6eSPgdm34OSUumcT","body":"8FG7XNdpKlUHclG5","type":"stmD4MTrOR09plG7","author_id":20,"thumbnail":"clAmIHbQwTWolVTG"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "6eSPgdm34OSUumcT",
    "body": "8FG7XNdpKlUHclG5",
    "type": "stmD4MTrOR09plG7",
    "author_id": 20,
    "thumbnail": "clAmIHbQwTWolVTG"
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
## del_msg
> Example request:

```bash
curl -X POST "http://localhost/del_msg" \
    -H "Content-Type: application/json" \
    -d '{"title":"aJHh3xmDhsLhOoOl","body":"9z6FfcjhY8lLDoP0","type":"J9RNINPHPmZ7ECEE","author_id":10,"thumbnail":"jY0rZ06h7hsDMAY3"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "aJHh3xmDhsLhOoOl",
    "body": "9z6FfcjhY8lLDoP0",
    "type": "J9RNINPHPmZ7ECEE",
    "author_id": 10,
    "thumbnail": "jY0rZ06h7hsDMAY3"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_cb128bb391940d8304e5ebb273373143 -->

<!-- START_869a605c7c3ad87a651842dddd0f4492 -->
## read_msg
> Example request:

```bash
curl -X POST "http://localhost/read_msg" \
    -H "Content-Type: application/json" \
    -d '{"title":"5Ewis2ChYcc16Uwc","body":"OTtMd11gu7y6VVVf","type":"2Of3mEWOPiwFpqIw","author_id":8,"thumbnail":"zdoc5MqnTTTEq7RD"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "5Ewis2ChYcc16Uwc",
    "body": "OTtMd11gu7y6VVVf",
    "type": "2Of3mEWOPiwFpqIw",
    "author_id": 8,
    "thumbnail": "zdoc5MqnTTTEq7RD"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_869a605c7c3ad87a651842dddd0f4492 -->

<!-- START_e43f1f7cccba02a3ecbce11183ad7aeb -->
## updateprefs
> Example request:

```bash
curl -X PATCH "http://localhost/updateprefs" \
    -H "Content-Type: application/json" \
    -d '{"title":"Ztw4tB75ljbBdOPJ","body":"3MU0JvX42Jedjs2b","type":"kV4wWsSPKT4RllSm","author_id":17,"thumbnail":"YPflbW7MGS2Cx5ZJ"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Ztw4tB75ljbBdOPJ",
    "body": "3MU0JvX42Jedjs2b",
    "type": "kV4wWsSPKT4RllSm",
    "author_id": 17,
    "thumbnail": "YPflbW7MGS2Cx5ZJ"
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
    -d '{"title":"7OyeuLgeoctQ7Wd2","body":"DYXVW3l9KQ2PnFsN","type":"0ZEQtjFGoc8Z9Leh","author_id":1,"thumbnail":"ixsLAMHJR8oPJDjM"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "7OyeuLgeoctQ7Wd2",
    "body": "DYXVW3l9KQ2PnFsN",
    "type": "0ZEQtjFGoc8Z9Leh",
    "author_id": 1,
    "thumbnail": "ixsLAMHJR8oPJDjM"
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
    -d '{"title":"nVvLHHKprJFEV7Hh","body":"BsvFQyOTOzYX1gHS","type":"Zjs0fr9pGh9k2cTx","author_id":4,"thumbnail":"1OTBX1XKPvnQBbu8"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "nVvLHHKprJFEV7Hh",
    "body": "BsvFQyOTOzYX1gHS",
    "type": "Zjs0fr9pGh9k2cTx",
    "author_id": 4,
    "thumbnail": "1OTBX1XKPvnQBbu8"
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
## info
> Example request:

```bash
curl -X GET -G "http://localhost/info" \
    -H "Content-Type: application/json" \
    -d '{"title":"r1s7oJngJ6J38lg9","body":"okfXLCc4s5kG9ZEr","type":"oCmnXnDdXFXJlrBt","author_id":3,"thumbnail":"0ocIv9vyTxswCD96"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "r1s7oJngJ6J38lg9",
    "body": "okfXLCc4s5kG9ZEr",
    "type": "oCmnXnDdXFXJlrBt",
    "author_id": 3,
    "thumbnail": "0ocIv9vyTxswCD96"
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
## karma
> Example request:

```bash
curl -X GET -G "http://localhost/karma" \
    -H "Content-Type: application/json" \
    -d '{"title":"wCg0Y1ANYxBmdg01","body":"6dgiaC38Lr0yYgRl","type":"UTRMXqBlXS2smIOm","author_id":17,"thumbnail":"9sKxLMvdED8MzxSJ"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "wCg0Y1ANYxBmdg01",
    "body": "6dgiaC38Lr0yYgRl",
    "type": "UTRMXqBlXS2smIOm",
    "author_id": 17,
    "thumbnail": "9sKxLMvdED8MzxSJ"
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
    -d '{"title":"lp2Ldcujx1bJV0UU","body":"R4VBsOFI58cf8rqK","type":"c42xsCCDsYhm4cxl","author_id":15,"thumbnail":"lnwjwe4gD4ILEek8"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "lp2Ldcujx1bJV0UU",
    "body": "R4VBsOFI58cf8rqK",
    "type": "c42xsCCDsYhm4cxl",
    "author_id": 15,
    "thumbnail": "lnwjwe4gD4ILEek8"
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

<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## del_ac
> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"title":"vPDRY5vWPMnCNfhX","body":"ZyCwJyjAsYGeooHF","type":"Y2O8XWVDAraQYB0J","author_id":13,"thumbnail":"HSdYoL7f9bgKYgm8"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "vPDRY5vWPMnCNfhX",
    "body": "ZyCwJyjAsYGeooHF",
    "type": "Y2O8XWVDAraQYB0J",
    "author_id": 13,
    "thumbnail": "HSdYoL7f9bgKYgm8"
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
    -d '{"title":"qFYRk3smxRw54izw","body":"kjR0G3zYCnBYPqWA","type":"5K852BWqAbjM2Gbj","author_id":9,"thumbnail":"FqEdlMDtsbmESqO7"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qFYRk3smxRw54izw",
    "body": "kjR0G3zYCnBYPqWA",
    "type": "5K852BWqAbjM2Gbj",
    "author_id": 9,
    "thumbnail": "FqEdlMDtsbmESqO7"
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
    -d '{"title":"WLS0SxX8AOJDD1Wr","body":"0ChNNxyo8WL7vG0R","type":"E2jC9bYlMOAdSLHR","author_id":1,"thumbnail":"uO8B7dkRojhOzlvm"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "WLS0SxX8AOJDD1Wr",
    "body": "0ChNNxyo8WL7vG0R",
    "type": "E2jC9bYlMOAdSLHR",
    "author_id": 1,
    "thumbnail": "uO8B7dkRojhOzlvm"
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
    -d '{"title":"hMpYJRNcHDTCrVnQ","body":"cMOipyQxUHkHUbWs","type":"gocplGBGovOYu90N","author_id":6,"thumbnail":"EXGBNKLtuQu8EolN"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "hMpYJRNcHDTCrVnQ",
    "body": "cMOipyQxUHkHUbWs",
    "type": "gocplGBGovOYu90N",
    "author_id": 6,
    "thumbnail": "EXGBNKLtuQu8EolN"
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
    -d '{"title":"NMHQ6nDahVoi0UsL","body":"5LLGj6L9OWTzESya","type":"QGuz1806CpYuCuix","author_id":14,"thumbnail":"eh0xJnSbGa7SdNjD"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "NMHQ6nDahVoi0UsL",
    "body": "5LLGj6L9OWTzESya",
    "type": "QGuz1806CpYuCuix",
    "author_id": 14,
    "thumbnail": "eh0xJnSbGa7SdNjD"
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
    -d '{"title":"q1JWSkExK7YWgTqG","body":"gVNgK7ll38aECLc7","type":"w9XcT6h03Q893oL5","author_id":13,"thumbnail":"pBBbV2dPH6AoOKnB"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "q1JWSkExK7YWgTqG",
    "body": "gVNgK7ll38aECLc7",
    "type": "w9XcT6h03Q893oL5",
    "author_id": 13,
    "thumbnail": "pBBbV2dPH6AoOKnB"
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
    -d '{"title":"r8uTtEMqYv0dk4N0","body":"sIV6Kx4HGxEYKh23","type":"I0xPZOpaFAR1pvkp","author_id":1,"thumbnail":"eYYhthDSp8LgukiZ"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "r8uTtEMqYv0dk4N0",
    "body": "sIV6Kx4HGxEYKh23",
    "type": "I0xPZOpaFAR1pvkp",
    "author_id": 1,
    "thumbnail": "eYYhthDSp8LgukiZ"
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
    -d '{"title":"Yvh8XSfSftvhev5K","body":"l8UvwJzKxCKFZ9Lr","type":"meKJZ02UlnfHi2YA","author_id":14,"thumbnail":"nGLpVde0lOnTSEvt"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Yvh8XSfSftvhev5K",
    "body": "l8UvwJzKxCKFZ9Lr",
    "type": "meKJZ02UlnfHi2YA",
    "author_id": 14,
    "thumbnail": "nGLpVde0lOnTSEvt"
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
    -d '{"title":"ddwMd3gwJA7FQiZv","body":"MJe1C2Yc1rpZZOem","type":"hDDEF9uh5azwglIP","author_id":14,"thumbnail":"VY0kmuPtRARM7scY"}'

```

```javascript
const url = new URL("http://localhost/sort_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ddwMd3gwJA7FQiZv",
    "body": "MJe1C2Yc1rpZZOem",
    "type": "hDDEF9uh5azwglIP",
    "author_id": 14,
    "thumbnail": "VY0kmuPtRARM7scY"
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
    -d '{"title":"aCtqT8bmakTzQ9qx","body":"RGJy4eeXKYp2rKnt","type":"sGjQNaofsa4Vi31E","author_id":18,"thumbnail":"ogNzgs08W0BG78O8"}'

```

```javascript
const url = new URL("http://localhost/Apex_names");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "aCtqT8bmakTzQ9qx",
    "body": "RGJy4eeXKYp2rKnt",
    "type": "sGjQNaofsa4Vi31E",
    "author_id": 18,
    "thumbnail": "ogNzgs08W0BG78O8"
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
    -d '{"title":"eSrOAhk9Bkjnjkr4","body":"Nu178BjjulWHjGrb","type":"b8rqrHkNOTup1xRz","author_id":19,"thumbnail":"IIGtvgxxGRk7bvJm"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "eSrOAhk9Bkjnjkr4",
    "body": "Nu178BjjulWHjGrb",
    "type": "b8rqrHkNOTup1xRz",
    "author_id": 19,
    "thumbnail": "IIGtvgxxGRk7bvJm"
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
    -d '{"title":"NSSjoaWaO8hAOZ1B","body":"QQBypi7SjxssmDTv","type":"BnD1mec4SmBdnjoY","author_id":13,"thumbnail":"sk5IcohFzo9x9GJO"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "NSSjoaWaO8hAOZ1B",
    "body": "QQBypi7SjxssmDTv",
    "type": "BnD1mec4SmBdnjoY",
    "author_id": 13,
    "thumbnail": "sk5IcohFzo9x9GJO"
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
    -d '{"title":"16XfGCnCb7mNKy2E","body":"G6gaksS9py82PCSW","type":"1uUB3ij45K2ThFtp","author_id":11,"thumbnail":"FTVOw0mx3sXHITcg"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "16XfGCnCb7mNKy2E",
    "body": "G6gaksS9py82PCSW",
    "type": "1uUB3ij45K2ThFtp",
    "author_id": 11,
    "thumbnail": "FTVOw0mx3sXHITcg"
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

<!-- START_1a7af546cd175bbafae3c156085b8064 -->
## block_user
> Example request:

```bash
curl -X POST "http://localhost/block_user" \
    -H "Content-Type: application/json" \
    -d '{"title":"2zm41ErpYHQtGOLL","body":"pwVIQYn0BGUsibio","type":"JacyrtWCFiXFlLL1","author_id":13,"thumbnail":"buSRaNaGjf6QC0Xv"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2zm41ErpYHQtGOLL",
    "body": "pwVIQYn0BGUsibio",
    "type": "JacyrtWCFiXFlLL1",
    "author_id": 13,
    "thumbnail": "buSRaNaGjf6QC0Xv"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_1a7af546cd175bbafae3c156085b8064 -->

<!-- START_9a86fc0b67608be77b22a771d49949db -->
## compose
> Example request:

```bash
curl -X POST "http://localhost/compose" \
    -H "Content-Type: application/json" \
    -d '{"title":"yvgN9qNxZmxgdWIB","body":"fg3RHyUecbRGzYUq","type":"iYO6eQC02HWJckn4","author_id":18,"thumbnail":"0TtbS1IxGAEQTWUP"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "yvgN9qNxZmxgdWIB",
    "body": "fg3RHyUecbRGzYUq",
    "type": "iYO6eQC02HWJckn4",
    "author_id": 18,
    "thumbnail": "0TtbS1IxGAEQTWUP"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_9a86fc0b67608be77b22a771d49949db -->

<!-- START_6b60bbfb91f5581a2b2f1932856691c2 -->
## user_data
> Example request:

```bash
curl -X GET -G "http://localhost/user_data" \
    -H "Content-Type: application/json" \
    -d '{"title":"ip2hdTzTH2Mnyi7h","body":"z56HJY0HyoAlwV7m","type":"NSpWZkGQ4QNvYHs8","author_id":20,"thumbnail":"En6P3VnYtsaabQyE"}'

```

```javascript
const url = new URL("http://localhost/user_data");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ip2hdTzTH2Mnyi7h",
    "body": "z56HJY0HyoAlwV7m",
    "type": "NSpWZkGQ4QNvYHs8",
    "author_id": 20,
    "thumbnail": "En6P3VnYtsaabQyE"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_6b60bbfb91f5581a2b2f1932856691c2 -->


