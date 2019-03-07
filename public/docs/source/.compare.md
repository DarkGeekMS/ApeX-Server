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

#Adminstration

APIs for managing the controls of admins and moderators
<!-- START_518c2787d7457d13136ce9ab90c7822b -->
## Deleting a subreddit by a moderator (the owner of the subbreddit)

> Example request:

```bash
curl -X POST "http://localhost/del_ac" \
    -H "Content-Type: application/json" \
    -d '{"ID":"EPcTgTcG1GQOpB0m","SubredditID":"p0YZv0eA3OwhRQlw","token":"uDmtcPd9O7KerMCH"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "EPcTgTcG1GQOpB0m",
    "SubredditID": "p0YZv0eA3OwhRQlw",
    "token": "uDmtcPd9O7KerMCH"
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
    ID | string |  required  | The ID of the moderator in charge of the subbredit.
    SubredditID | string |  required  | The ID of the subreddit to be deleted.
    token | JWT |  required  | Used to verify the moderator.

<!-- END_518c2787d7457d13136ce9ab90c7822b -->

<!-- START_ef7b81f691245619539d9452a88ace88 -->
## Deleting a user

> Example request:

```bash
curl -X POST "http://localhost/del_user" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"UOn2qtXrvBEPI0VC","AdminID":"EIX1ArTsWDxKETf3","Reason":"koHozrICZJAsfud7","token":"wrFWhUWs5uRvIYrH"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "UOn2qtXrvBEPI0VC",
    "AdminID": "EIX1ArTsWDxKETf3",
    "Reason": "koHozrICZJAsfud7",
    "token": "wrFWhUWs5uRvIYrH"
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
    AdminID | string |  required  | The ID of the admin deleting the user.
    Reason | string |  optional  | The reason for deleting the user.
    token | JWT |  required  | Used to verify the admin.

<!-- END_ef7b81f691245619539d9452a88ace88 -->

<!-- START_0277897590e5bd3534956fc7b78f21cd -->
## Adding a moderator for a subreddit

> Example request:

```bash
curl -X POST "http://localhost/add_mod" \
    -H "Content-Type: application/json" \
    -d '{"ID":"JLE5TciMyVFddop0","SubredditID":"YRcOllz2V043rFkm","token":"pwXXfqL1yonMS0Dk"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "JLE5TciMyVFddop0",
    "SubredditID": "YRcOllz2V043rFkm",
    "token": "pwXXfqL1yonMS0Dk"
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
    ID | string |  required  | The ID of the moderator in charge of the subbredit.
    SubredditID | string |  required  | The ID of the subreddit controlled by the moderator.
    token | JWT |  required  | Used to verify the moderator.

<!-- END_0277897590e5bd3534956fc7b78f21cd -->

#User management

APIs for managing users
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## comment
> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Content-Type: application/json" \
    -d '{"title":"y2PryLBm1zchqh12","body":"Nb825P6ys2PFVKrX","type":"IzFc2oS0u9FKh9TV","author_id":15,"thumbnail":"0XxHzHT1c3NuG5jo"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "y2PryLBm1zchqh12",
    "body": "Nb825P6ys2PFVKrX",
    "type": "IzFc2oS0u9FKh9TV",
    "author_id": 15,
    "thumbnail": "0XxHzHT1c3NuG5jo"
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
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
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
    -d '{"title":"m8TemFZHsjGQ3RxM","body":"d9xHtHNWzRW3B2El","type":"KclKjhYB3l8cyhSL","author_id":7,"thumbnail":"NCSLbccuHa3tD48B"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "m8TemFZHsjGQ3RxM",
    "body": "d9xHtHNWzRW3B2El",
    "type": "KclKjhYB3l8cyhSL",
    "author_id": 7,
    "thumbnail": "NCSLbccuHa3tD48B"
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
    -d '{"title":"qrQUGO4t6lip2Bjj","body":"OD08H2JJNSjwUtCd","type":"mEimgnBymRsIREqG","author_id":5,"thumbnail":"dJRAQxPluHtWSvPG"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qrQUGO4t6lip2Bjj",
    "body": "OD08H2JJNSjwUtCd",
    "type": "mEimgnBymRsIREqG",
    "author_id": 5,
    "thumbnail": "dJRAQxPluHtWSvPG"
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
    -d '{"title":"LlgE9NBHsMSIuydW","body":"hNZwf0csdzCdUJqQ","type":"wq5pN1y9OFiTHLLR","author_id":20,"thumbnail":"ypWSw2b0fLqhCGBd"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "LlgE9NBHsMSIuydW",
    "body": "hNZwf0csdzCdUJqQ",
    "type": "wq5pN1y9OFiTHLLR",
    "author_id": 20,
    "thumbnail": "ypWSw2b0fLqhCGBd"
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
    -d '{"title":"8NWRcw683e22cKUL","body":"LRCbk3pmWOQDdC9T","type":"bWGv9dBOrez060uy","author_id":5,"thumbnail":"3lOjvuMjTDpQSxi7"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8NWRcw683e22cKUL",
    "body": "LRCbk3pmWOQDdC9T",
    "type": "bWGv9dBOrez060uy",
    "author_id": 5,
    "thumbnail": "3lOjvuMjTDpQSxi7"
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
    -d '{"title":"HHtxAer9QL6udA4y","body":"hBBKPtTIcm3aT1IU","type":"5E4kGOGSDN0ubiyT","author_id":12,"thumbnail":"o5pGigJAVUKxMuaJ"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "HHtxAer9QL6udA4y",
    "body": "hBBKPtTIcm3aT1IU",
    "type": "5E4kGOGSDN0ubiyT",
    "author_id": 12,
    "thumbnail": "o5pGigJAVUKxMuaJ"
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
    -d '{"title":"NhWQo4hHMPcORCRX","body":"ZEjdHnd3vQz6BElg","type":"Tf5X7zsNwDoxkJ7s","author_id":7,"thumbnail":"nzWzwWAW1uCkGZIx"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "NhWQo4hHMPcORCRX",
    "body": "ZEjdHnd3vQz6BElg",
    "type": "Tf5X7zsNwDoxkJ7s",
    "author_id": 7,
    "thumbnail": "nzWzwWAW1uCkGZIx"
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
    -d '{"title":"C02s0do1rRTPnE3s","body":"k8bgFlVg1tEqido4","type":"I0qc5yehjPYGmQXa","author_id":9,"thumbnail":"NnUlDvPxwOdiy6LM"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "C02s0do1rRTPnE3s",
    "body": "k8bgFlVg1tEqido4",
    "type": "I0qc5yehjPYGmQXa",
    "author_id": 9,
    "thumbnail": "NnUlDvPxwOdiy6LM"
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
    -d '{"ID":"OzUydWElDrLRCH4h","UserID":"XvfiYJGE3xu2nvhJ","token":"IpMVlIwgzY9sXKNV"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "OzUydWElDrLRCH4h",
    "UserID": "XvfiYJGE3xu2nvhJ",
    "token": "IpMVlIwgzY9sXKNV"
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
    UserID | string |  required  | The ID of the user.
    token | JWT |  required  | Used to verify the user.

<!-- END_3a7b8eca0c87791144dc77858615f215 -->

<!-- START_c73ea2693dc9203931a2533cdef33d33 -->
## unsave
> Example request:

```bash
curl -X POST "http://localhost/unsave" \
    -H "Content-Type: application/json" \
    -d '{"ID":"6zi5LoTRgiWtIVei","UserID":"uleVOEK1CCN4JjZl","token":"o92rWryNNM02dmMW"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "6zi5LoTRgiWtIVei",
    "UserID": "uleVOEK1CCN4JjZl",
    "token": "o92rWryNNM02dmMW"
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
    ID | string |  required  | The ID of the commen or link.
    UserID | string |  required  | The ID of the user.
    token | JWT |  required  | Used to verify the user.

<!-- END_c73ea2693dc9203931a2533cdef33d33 -->

#general
<!-- START_3a06114e88089d07a3c29bdb6f844602 -->
## sign_up
> Example request:

```bash
curl -X POST "http://localhost/sign_up" \
    -H "Content-Type: application/json" \
    -d '{"title":"2iIB7HVnV2uG7Oor","body":"SwAgX4WJuRDXiAn2","type":"sUe9uzwsPgukmJBu","author_id":1,"thumbnail":"isxTvtesjw6bzl65"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2iIB7HVnV2uG7Oor",
    "body": "SwAgX4WJuRDXiAn2",
    "type": "sUe9uzwsPgukmJBu",
    "author_id": 1,
    "thumbnail": "isxTvtesjw6bzl65"
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
    -d '{"title":"rd1kOLAZilU0c4Rb","body":"WFpbd9hgWBEu6kNc","type":"DuaqeAys6idBqJyM","author_id":17,"thumbnail":"ugaXETCO3NjOsl98"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "rd1kOLAZilU0c4Rb",
    "body": "WFpbd9hgWBEu6kNc",
    "type": "DuaqeAys6idBqJyM",
    "author_id": 17,
    "thumbnail": "ugaXETCO3NjOsl98"
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
    -d '{"title":"VYVzRDKVvuj4i7uG","body":"qqDuVYMbLDM4Kkos","type":"dCw8Zy40kgxnCSYM","author_id":12,"thumbnail":"a56MiwqHcpMbTWT3"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "VYVzRDKVvuj4i7uG",
    "body": "qqDuVYMbLDM4Kkos",
    "type": "dCw8Zy40kgxnCSYM",
    "author_id": 12,
    "thumbnail": "a56MiwqHcpMbTWT3"
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
    -d '{"title":"uNzpXlbxAuy5GlQI","body":"6uWJSocD9Hgb2WR1","type":"etVo56hantUyQUcQ","author_id":3,"thumbnail":"A6CXicCAwT9ESy24"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "uNzpXlbxAuy5GlQI",
    "body": "6uWJSocD9Hgb2WR1",
    "type": "etVo56hantUyQUcQ",
    "author_id": 3,
    "thumbnail": "A6CXicCAwT9ESy24"
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
    -d '{"ID":"jXPDv99F9ojRex9p","body":"b0Uc8Z5zYXHPm2Ke","read":false,"token":"vrz0fBfV7nl0J7a5"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "jXPDv99F9ojRex9p",
    "body": "b0Uc8Z5zYXHPm2Ke",
    "read": false,
    "token": "vrz0fBfV7nl0J7a5"
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
    -d '{"title":"2Pk9zT6dMbLKNbPv","body":"cAsSRIsRUnnTR6yL","type":"g48ehHt8iiXbdLs4","author_id":4,"thumbnail":"4mkBGP8q6eZvt3rE"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2Pk9zT6dMbLKNbPv",
    "body": "cAsSRIsRUnnTR6yL",
    "type": "g48ehHt8iiXbdLs4",
    "author_id": 4,
    "thumbnail": "4mkBGP8q6eZvt3rE"
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
    -d '{"title":"rVGKsyNSBSxxCwmt","body":"8FEwjVpM6Igwi0tU","type":"JwiDiBaiWEv0N8Nq","author_id":20,"thumbnail":"FweAFpFNJ4Z4Nc9E"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "rVGKsyNSBSxxCwmt",
    "body": "8FEwjVpM6Igwi0tU",
    "type": "JwiDiBaiWEv0N8Nq",
    "author_id": 20,
    "thumbnail": "FweAFpFNJ4Z4Nc9E"
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
    -d '{"title":"15PdnMiwXFXyGsCB","body":"dLCvWafoC7Nr5g8I","type":"uJUGJPwo6yuQvgXr","author_id":15,"thumbnail":"A4jd1Ey482Ixrj48"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "15PdnMiwXFXyGsCB",
    "body": "dLCvWafoC7Nr5g8I",
    "type": "uJUGJPwo6yuQvgXr",
    "author_id": 15,
    "thumbnail": "A4jd1Ey482Ixrj48"
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
    -d '{"ID":"5CsucPMy7l7D594z","token":"sUBzEggsWTpQ98Sb"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "5CsucPMy7l7D594z",
    "token": "sUBzEggsWTpQ98Sb"
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
    -d '{"title":"RPFMBFN0yLkBl2Nx","body":"s03UcGzGCZhCqvXh","type":"zPuD2B2yWLCNyXAL","author_id":14,"thumbnail":"CNj6Agporyo5DtIh"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "RPFMBFN0yLkBl2Nx",
    "body": "s03UcGzGCZhCqvXh",
    "type": "zPuD2B2yWLCNyXAL",
    "author_id": 14,
    "thumbnail": "CNj6Agporyo5DtIh"
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
    -d '{"title":"ML1nLvRq71gftqVM","body":"xR72Ado1DSXiTK4z","type":"yVReXzQGKtLVftEf","author_id":9,"thumbnail":"MkG20C3zA3K74lnE"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ML1nLvRq71gftqVM",
    "body": "xR72Ado1DSXiTK4z",
    "type": "yVReXzQGKtLVftEf",
    "author_id": 9,
    "thumbnail": "MkG20C3zA3K74lnE"
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
    -d '{"title":"0LlfqKfFVe6tIKaa","body":"mJUG3ahhh3i3Etcu","type":"DhzIk8KDYqHW9l58","author_id":11,"thumbnail":"VAuW58jf8R5RbAOi"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "0LlfqKfFVe6tIKaa",
    "body": "mJUG3ahhh3i3Etcu",
    "type": "DhzIk8KDYqHW9l58",
    "author_id": 11,
    "thumbnail": "VAuW58jf8R5RbAOi"
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
    -d '{"title":"ISRWv0bF8NuEskx7","body":"XtbyydSHZ91tiyLw","type":"7KyaVoo7TdS1MMDg","author_id":8,"thumbnail":"owTEm5u40XNNpHIa"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ISRWv0bF8NuEskx7",
    "body": "XtbyydSHZ91tiyLw",
    "type": "7KyaVoo7TdS1MMDg",
    "author_id": 8,
    "thumbnail": "owTEm5u40XNNpHIa"
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
    -d '{"title":"tGotWME1nHjYic4m","body":"VzcSxrrx4ZrlUhhZ","type":"oX66zW3bN5EI31q3","author_id":19,"thumbnail":"kj5hkt4esFMn5wha"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "tGotWME1nHjYic4m",
    "body": "VzcSxrrx4ZrlUhhZ",
    "type": "oX66zW3bN5EI31q3",
    "author_id": 19,
    "thumbnail": "kj5hkt4esFMn5wha"
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
    -d '{"title":"zk2ZhUP3mrlufmBW","body":"mqdRL1zvLtB7mCJm","type":"8dcRZFz3JuCWVlVA","author_id":18,"thumbnail":"H25TizCs9cr1Od7B"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "zk2ZhUP3mrlufmBW",
    "body": "mqdRL1zvLtB7mCJm",
    "type": "8dcRZFz3JuCWVlVA",
    "author_id": 18,
    "thumbnail": "H25TizCs9cr1Od7B"
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
    -d '{"title":"VQHUCEGkhIzOonGq","body":"JKimHE1ygjR18qoO","type":"KgxqyRCGjiGhfaWW","author_id":19,"thumbnail":"DPIoT0Um4CFerE4T"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "VQHUCEGkhIzOonGq",
    "body": "JKimHE1ygjR18qoO",
    "type": "KgxqyRCGjiGhfaWW",
    "author_id": 19,
    "thumbnail": "DPIoT0Um4CFerE4T"
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

<!-- START_ee89138ce9c25aef47e41236b3459dc6 -->
## trendings
> Example request:

```bash
curl -X GET -G "http://localhost/trendings" \
    -H "Content-Type: application/json" \
    -d '{"title":"kOW4ghcCD5KlWfav","body":"LUHndivJqfSpr92Z","type":"A5YrExrKA2PHc2iy","author_id":7,"thumbnail":"aawS0SYff0wmXodK"}'

```

```javascript
const url = new URL("http://localhost/trendings");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "kOW4ghcCD5KlWfav",
    "body": "LUHndivJqfSpr92Z",
    "type": "A5YrExrKA2PHc2iy",
    "author_id": 7,
    "thumbnail": "aawS0SYff0wmXodK"
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
`GET trendings`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_ee89138ce9c25aef47e41236b3459dc6 -->

<!-- START_99ecc95fd34f9a2d55575f35ccff8f1c -->
## hot_posts
> Example request:

```bash
curl -X GET -G "http://localhost/hot_posts" \
    -H "Content-Type: application/json" \
    -d '{"title":"MPdF9UrIBrSHS8zv","body":"VsuknC18RFjtN2of","type":"JE7UbmN3Bnz9ai7R","author_id":10,"thumbnail":"OHo7oOceBOmcdp4Q"}'

```

```javascript
const url = new URL("http://localhost/hot_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "MPdF9UrIBrSHS8zv",
    "body": "VsuknC18RFjtN2of",
    "type": "JE7UbmN3Bnz9ai7R",
    "author_id": 10,
    "thumbnail": "OHo7oOceBOmcdp4Q"
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
`GET hot_posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_99ecc95fd34f9a2d55575f35ccff8f1c -->

<!-- START_b885f7f4714d80477084c1fd4bf3e729 -->
## remove
> Example request:

```bash
curl -X POST "http://localhost/remove" \
    -H "Content-Type: application/json" \
    -d '{"title":"uP2l9LYNuFjEO1dW","body":"7QEZdsoGNwzpOnGj","type":"illD131HAbSk0y0f","author_id":20,"thumbnail":"jN9uGTNcUyv86cOw"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "uP2l9LYNuFjEO1dW",
    "body": "7QEZdsoGNwzpOnGj",
    "type": "illD131HAbSk0y0f",
    "author_id": 20,
    "thumbnail": "jN9uGTNcUyv86cOw"
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
    -d '{"title":"4JZAevOwmnsLXljn","body":"YhAcOOckuQ1sGntC","type":"JAzqFPfyke4wRfQh","author_id":9,"thumbnail":"dJ6Ctp8soPMnIPPS"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "4JZAevOwmnsLXljn",
    "body": "YhAcOOckuQ1sGntC",
    "type": "JAzqFPfyke4wRfQh",
    "author_id": 9,
    "thumbnail": "dJ6Ctp8soPMnIPPS"
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
    -d '{"title":"U1unxstyuIO5Z8sf","body":"a1iXnERYlr0IfXSZ","type":"teqMjkXK3W5qnLtF","author_id":16,"thumbnail":"A3RcG9pfY3efL4DL"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "U1unxstyuIO5Z8sf",
    "body": "a1iXnERYlr0IfXSZ",
    "type": "teqMjkXK3W5qnLtF",
    "author_id": 16,
    "thumbnail": "A3RcG9pfY3efL4DL"
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
    -d '{"title":"AXGVOPI3OpI2HoFm","body":"swpqjZv80RyyZSM1","type":"TeDe86RQy5R10wVd","author_id":6,"thumbnail":"wpxtSouA1XBtGukf"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "AXGVOPI3OpI2HoFm",
    "body": "swpqjZv80RyyZSM1",
    "type": "TeDe86RQy5R10wVd",
    "author_id": 6,
    "thumbnail": "wpxtSouA1XBtGukf"
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
    -d '{"title":"3BtjexYEVfxG7x5r","body":"SuhLP3pw1tKFw0TZ","type":"HLLR7PMSt6eeFbbk","author_id":18,"thumbnail":"f9MmAOMW3vJl27sZ"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "3BtjexYEVfxG7x5r",
    "body": "SuhLP3pw1tKFw0TZ",
    "type": "HLLR7PMSt6eeFbbk",
    "author_id": 18,
    "thumbnail": "f9MmAOMW3vJl27sZ"
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

<!-- START_f0b4e6662ec08c711effced61a4a1985 -->
## user_date
> Example request:

```bash
curl -X GET -G "http://localhost/user_date" \
    -H "Content-Type: application/json" \
    -d '{"title":"PrX01pl1rqbScY6P","body":"0gPjbRJKFLF3KuXz","type":"gChFowmN8kwoYeOq","author_id":19,"thumbnail":"j8kVWqvSOKF6s9zK"}'

```

```javascript
const url = new URL("http://localhost/user_date");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "PrX01pl1rqbScY6P",
    "body": "0gPjbRJKFLF3KuXz",
    "type": "gChFowmN8kwoYeOq",
    "author_id": 19,
    "thumbnail": "j8kVWqvSOKF6s9zK"
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
`GET user_date`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the post.
    body | string |  required  | The title of the post.
    type | string |  optional  | The type of post to create. Defaults to 'textophonious'.
    author_id | integer |  optional  | the ID of the author
    thumbnail | image |  optional  | This is required if the post type is 'imagelicious'.

<!-- END_f0b4e6662ec08c711effced61a4a1985 -->


