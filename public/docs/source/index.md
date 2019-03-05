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

#User management

APIs for managing users
<!-- START_4479052af7e53f808c3e66f3a63e68f3 -->
## comment
> Example request:

```bash
curl -X POST "http://localhost/comment" \
    -H "Content-Type: application/json" \
    -d '{"title":"ylWx1Ugnx9EmeByq","body":"8yxLaSCypqdnYLIw","type":"HvtDbF0ob60NeanJ","author_id":15,"thumbnail":"8VRkkc7EaFRp9Nb3"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ylWx1Ugnx9EmeByq",
    "body": "8yxLaSCypqdnYLIw",
    "type": "HvtDbF0ob60NeanJ",
    "author_id": 15,
    "thumbnail": "8VRkkc7EaFRp9Nb3"
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
    -d '{"title":"fTPSB8uscJOCxuEl","body":"vyuSyAzd3Sa4fDGt","type":"iDwxTDA9C5j9nIox","author_id":6,"thumbnail":"EuwmlMJrKfVdvuQF"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "fTPSB8uscJOCxuEl",
    "body": "vyuSyAzd3Sa4fDGt",
    "type": "iDwxTDA9C5j9nIox",
    "author_id": 6,
    "thumbnail": "EuwmlMJrKfVdvuQF"
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
    -d '{"title":"4yIsdSjsjE2t6K0G","body":"ljMoD7hZ7160NClF","type":"DhsXo7jB4yndBw8B","author_id":9,"thumbnail":"UTOaRldPBPWpMNmB"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "4yIsdSjsjE2t6K0G",
    "body": "ljMoD7hZ7160NClF",
    "type": "DhsXo7jB4yndBw8B",
    "author_id": 9,
    "thumbnail": "UTOaRldPBPWpMNmB"
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
    -d '{"title":"4FP250eN54BEZiFp","body":"Lw7W0J9WzjJvBWti","type":"xF1RzeRIzGPwEPkQ","author_id":16,"thumbnail":"L0SRiFWi5zYM9hsY"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "4FP250eN54BEZiFp",
    "body": "Lw7W0J9WzjJvBWti",
    "type": "xF1RzeRIzGPwEPkQ",
    "author_id": 16,
    "thumbnail": "L0SRiFWi5zYM9hsY"
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
    -d '{"title":"U4ON6k71NqcX8ZCd","body":"PcAXnvbCFyJ4UVY4","type":"4jP0MSSFiyFjZXwt","author_id":6,"thumbnail":"p0MRd5L9Ih9u7fBs"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "U4ON6k71NqcX8ZCd",
    "body": "PcAXnvbCFyJ4UVY4",
    "type": "4jP0MSSFiyFjZXwt",
    "author_id": 6,
    "thumbnail": "p0MRd5L9Ih9u7fBs"
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
    -d '{"title":"cW7IzqUaGITTRo0D","body":"gbpjo5SsJYDQMlJ1","type":"UbfyP2K4I9jkraiq","author_id":17,"thumbnail":"caY4Va8Xoaabnq5E"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "cW7IzqUaGITTRo0D",
    "body": "gbpjo5SsJYDQMlJ1",
    "type": "UbfyP2K4I9jkraiq",
    "author_id": 17,
    "thumbnail": "caY4Va8Xoaabnq5E"
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
    -d '{"title":"nEGR37KI3eq3CQJV","body":"QBCKar55WR5jDpCi","type":"NPafI8Gxvc5WhrrK","author_id":15,"thumbnail":"nvlqSa4h1jl5f6ES"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "nEGR37KI3eq3CQJV",
    "body": "QBCKar55WR5jDpCi",
    "type": "NPafI8Gxvc5WhrrK",
    "author_id": 15,
    "thumbnail": "nvlqSa4h1jl5f6ES"
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
    -d '{"title":"DodXm50OOpahP43O","body":"0UcQJjwA7Xnjz2Dl","type":"XV8J3QhLCCa7gJpq","author_id":5,"thumbnail":"7e4WjxdXQB99t4Qn"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "DodXm50OOpahP43O",
    "body": "0UcQJjwA7Xnjz2Dl",
    "type": "XV8J3QhLCCa7gJpq",
    "author_id": 5,
    "thumbnail": "7e4WjxdXQB99t4Qn"
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
    -d '{"title":"jYGVPzv0Yq9MYlKX","body":"HuzIKS8UwpRWE4WB","type":"GROJAcS5PLXIhLBG","author_id":4,"thumbnail":"qHXWwiYWeGTz4lQ4"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "jYGVPzv0Yq9MYlKX",
    "body": "HuzIKS8UwpRWE4WB",
    "type": "GROJAcS5PLXIhLBG",
    "author_id": 4,
    "thumbnail": "qHXWwiYWeGTz4lQ4"
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
    -d '{"title":"c2xCjsKD2okVHBrk","body":"NIeRS8ohnWJwhcmf","type":"zIKHTzzDqULGSWTm","author_id":9,"thumbnail":"ayBKobwM6holi1nD"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "c2xCjsKD2okVHBrk",
    "body": "NIeRS8ohnWJwhcmf",
    "type": "zIKHTzzDqULGSWTm",
    "author_id": 9,
    "thumbnail": "ayBKobwM6holi1nD"
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
    -d '{"title":"f57NJCEfUcxUVg93","body":"8lrHdgAPA3bvG5Ks","type":"21alBevGFE7rs3kV","author_id":12,"thumbnail":"scfHgbuiOJN5UXpP"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "f57NJCEfUcxUVg93",
    "body": "8lrHdgAPA3bvG5Ks",
    "type": "21alBevGFE7rs3kV",
    "author_id": 12,
    "thumbnail": "scfHgbuiOJN5UXpP"
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
    -d '{"title":"kwZl0ZN5731XCeXn","body":"TbYJZO7lvnpHbHze","type":"Qru8JpGnlRkxDau8","author_id":6,"thumbnail":"1RBrAZO0qu90uHVf"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "kwZl0ZN5731XCeXn",
    "body": "TbYJZO7lvnpHbHze",
    "type": "Qru8JpGnlRkxDau8",
    "author_id": 6,
    "thumbnail": "1RBrAZO0qu90uHVf"
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
    -d '{"title":"CoI8cohQ619hyMma","body":"bwc6yWjxuSFt6D9Y","type":"0KrwNAbIf9ySvVVA","author_id":4,"thumbnail":"0yfHYKpXQvT0UZg1"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "CoI8cohQ619hyMma",
    "body": "bwc6yWjxuSFt6D9Y",
    "type": "0KrwNAbIf9ySvVVA",
    "author_id": 4,
    "thumbnail": "0yfHYKpXQvT0UZg1"
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
    -d '{"title":"cJqFV763Gk33B2Jg","body":"Pfavns0o57BoMNYg","type":"kJTTbMJTcb73Ik1l","author_id":1,"thumbnail":"M3pU7MnoHuqp7eBS"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "cJqFV763Gk33B2Jg",
    "body": "Pfavns0o57BoMNYg",
    "type": "kJTTbMJTcb73Ik1l",
    "author_id": 1,
    "thumbnail": "M3pU7MnoHuqp7eBS"
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
    -d '{"title":"SEMQoPomFcfmqULT","body":"q7CrfCUi84PEyW7S","type":"Qj0BNrSGPcuSwS5C","author_id":11,"thumbnail":"3JXLny1yXQizkoXb"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "SEMQoPomFcfmqULT",
    "body": "q7CrfCUi84PEyW7S",
    "type": "Qj0BNrSGPcuSwS5C",
    "author_id": 11,
    "thumbnail": "3JXLny1yXQizkoXb"
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
    -d '{"title":"0bBk693wdpVVXH3f","body":"oXXHLIStWQ0lpL2W","type":"A0mBd4AR5y5KE8uV","author_id":17,"thumbnail":"vJWQjCs3QPoKc0ZB"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "0bBk693wdpVVXH3f",
    "body": "oXXHLIStWQ0lpL2W",
    "type": "A0mBd4AR5y5KE8uV",
    "author_id": 17,
    "thumbnail": "vJWQjCs3QPoKc0ZB"
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
    -d '{"title":"uUfPwZBLcSR23TV2","body":"wUcCxjiycz1Xzus3","type":"yN2gCncBgfVpnt3p","author_id":1,"thumbnail":"SzbF5uwrQKUNQKIA"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "uUfPwZBLcSR23TV2",
    "body": "wUcCxjiycz1Xzus3",
    "type": "yN2gCncBgfVpnt3p",
    "author_id": 1,
    "thumbnail": "SzbF5uwrQKUNQKIA"
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
    -d '{"title":"BiIDdA3sUrSxjcFF","body":"6V1YGqIuvNOB6YE9","type":"XHf38PHUK4lRp351","author_id":6,"thumbnail":"SKwsqc4IX4lepfkr"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "BiIDdA3sUrSxjcFF",
    "body": "6V1YGqIuvNOB6YE9",
    "type": "XHf38PHUK4lRp351",
    "author_id": 6,
    "thumbnail": "SKwsqc4IX4lepfkr"
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
    -d '{"title":"IesIsztkvQ01w99J","body":"glNPiwyQ6K4ir6u5","type":"tKHNxlWxbVNblMt0","author_id":5,"thumbnail":"M3Y1CElTEMmUMnfe"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "IesIsztkvQ01w99J",
    "body": "glNPiwyQ6K4ir6u5",
    "type": "tKHNxlWxbVNblMt0",
    "author_id": 5,
    "thumbnail": "M3Y1CElTEMmUMnfe"
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
    -d '{"title":"zvINIykwuIZc1LZW","body":"kudRn1QCbhfOdnc9","type":"MrjcwpEz7HnOepFC","author_id":12,"thumbnail":"uapB9QrPp7ad9lLg"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "zvINIykwuIZc1LZW",
    "body": "kudRn1QCbhfOdnc9",
    "type": "MrjcwpEz7HnOepFC",
    "author_id": 12,
    "thumbnail": "uapB9QrPp7ad9lLg"
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
    -d '{"title":"MfA1bGmsdjHeA3Rt","body":"NDXXg9afqjqfdcme","type":"iIqsQmqmlODUtS9g","author_id":3,"thumbnail":"kqWrWE6Vixgnf3eH"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "MfA1bGmsdjHeA3Rt",
    "body": "NDXXg9afqjqfdcme",
    "type": "iIqsQmqmlODUtS9g",
    "author_id": 3,
    "thumbnail": "kqWrWE6Vixgnf3eH"
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
    -d '{"title":"DJNCbiBzmIBcnug5","body":"Tkp5JjiDUV5tRbIj","type":"2JAKsqk5UUTmozm8","author_id":14,"thumbnail":"UBwEGIxDctP24QUk"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "DJNCbiBzmIBcnug5",
    "body": "Tkp5JjiDUV5tRbIj",
    "type": "2JAKsqk5UUTmozm8",
    "author_id": 14,
    "thumbnail": "UBwEGIxDctP24QUk"
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
    -d '{"title":"WEew1CgiFSEmU7Zs","body":"flJw57SK3wEhZK7f","type":"os9tIEdlo6gaGGZD","author_id":7,"thumbnail":"8ASQzXIVsiaQtDXo"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "WEew1CgiFSEmU7Zs",
    "body": "flJw57SK3wEhZK7f",
    "type": "os9tIEdlo6gaGGZD",
    "author_id": 7,
    "thumbnail": "8ASQzXIVsiaQtDXo"
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
    -d '{"title":"cWQ53AdF0ir6oAn5","body":"vPQwFFHRHckLbD8c","type":"qf40Z4At5t8gx6jt","author_id":12,"thumbnail":"BDXgwR5CgrIzEMfg"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "cWQ53AdF0ir6oAn5",
    "body": "vPQwFFHRHckLbD8c",
    "type": "qf40Z4At5t8gx6jt",
    "author_id": 12,
    "thumbnail": "BDXgwR5CgrIzEMfg"
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
    -d '{"title":"vEE9iujUXgc0wOQQ","body":"BDLPTKXG6Bnz0GGK","type":"UBeCvED6TR6BDD3u","author_id":10,"thumbnail":"lwYXxP4xpYDFyF11"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "vEE9iujUXgc0wOQQ",
    "body": "BDLPTKXG6Bnz0GGK",
    "type": "UBeCvED6TR6BDD3u",
    "author_id": 10,
    "thumbnail": "lwYXxP4xpYDFyF11"
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
    -d '{"title":"WU673k7U7GIwiNmc","body":"Ye2qIFmx9NpTYhLO","type":"voUvBvQVqABEMKMJ","author_id":6,"thumbnail":"eVaI5eFdJiNe9l8u"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "WU673k7U7GIwiNmc",
    "body": "Ye2qIFmx9NpTYhLO",
    "type": "voUvBvQVqABEMKMJ",
    "author_id": 6,
    "thumbnail": "eVaI5eFdJiNe9l8u"
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
    -d '{"title":"WfU0Kv7IzFMgrRyo","body":"MdWnpw0K7L4i9OUM","type":"WShlM8NdR1PO6amC","author_id":13,"thumbnail":"KlD7P3uk7dLVDJ78"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "WfU0Kv7IzFMgrRyo",
    "body": "MdWnpw0K7L4i9OUM",
    "type": "WShlM8NdR1PO6amC",
    "author_id": 13,
    "thumbnail": "KlD7P3uk7dLVDJ78"
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
    -d '{"title":"8fJ0BY653DS0WMMY","body":"4BYPHlg8F0jUDB0P","type":"O2XSkAS9gP5STlKv","author_id":3,"thumbnail":"7wdamkt1ZEz8r6aR"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8fJ0BY653DS0WMMY",
    "body": "4BYPHlg8F0jUDB0P",
    "type": "O2XSkAS9gP5STlKv",
    "author_id": 3,
    "thumbnail": "7wdamkt1ZEz8r6aR"
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
    -d '{"title":"y9Sgfy07SNTmVcM4","body":"WLKCHDnjH2JokD0i","type":"dfymyZ6dXi6ZSEtj","author_id":19,"thumbnail":"cBFhFld6P7rF1nf3"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "y9Sgfy07SNTmVcM4",
    "body": "WLKCHDnjH2JokD0i",
    "type": "dfymyZ6dXi6ZSEtj",
    "author_id": 19,
    "thumbnail": "cBFhFld6P7rF1nf3"
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
    -d '{"title":"TXhMsxEMsIbYCprN","body":"2CDHFtYxtD3e8CaA","type":"rZIHMQdQ9TIa2wxE","author_id":19,"thumbnail":"rdgoUjapGgOKojBf"}'

```

```javascript
const url = new URL("http://localhost/trendings");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "TXhMsxEMsIbYCprN",
    "body": "2CDHFtYxtD3e8CaA",
    "type": "rZIHMQdQ9TIa2wxE",
    "author_id": 19,
    "thumbnail": "rdgoUjapGgOKojBf"
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
    -d '{"title":"dHFDdUaFSjCntEYj","body":"gJbT4NgfEQneYDdv","type":"gwu1ZxMrv7Tyozo1","author_id":7,"thumbnail":"ZQppUgg1G9JcAu6Z"}'

```

```javascript
const url = new URL("http://localhost/hot_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "dHFDdUaFSjCntEYj",
    "body": "gJbT4NgfEQneYDdv",
    "type": "gwu1ZxMrv7Tyozo1",
    "author_id": 7,
    "thumbnail": "ZQppUgg1G9JcAu6Z"
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
    -d '{"title":"97UErEbjrsTmxPhz","body":"80BVN1WV5pAh5bG7","type":"SirBJTLllQtVIX3G","author_id":7,"thumbnail":"dX01EoELEFY6JacR"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "97UErEbjrsTmxPhz",
    "body": "80BVN1WV5pAh5bG7",
    "type": "SirBJTLllQtVIX3G",
    "author_id": 7,
    "thumbnail": "dX01EoELEFY6JacR"
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
    -d '{"title":"7Ir4RKhCrrbLRzku","body":"HkYZeaVhM8pZZ54K","type":"4RbQbAekI5p7Kw94","author_id":14,"thumbnail":"8aKuwyB9TPsO83wa"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "7Ir4RKhCrrbLRzku",
    "body": "HkYZeaVhM8pZZ54K",
    "type": "4RbQbAekI5p7Kw94",
    "author_id": 14,
    "thumbnail": "8aKuwyB9TPsO83wa"
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
    -d '{"title":"OjWTDi4mxm2GX4ir","body":"hE6Fd3jRD1xFvVpT","type":"NYkTHOiP6Aahy2i8","author_id":18,"thumbnail":"SNpc8uvco9Ew61sK"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "OjWTDi4mxm2GX4ir",
    "body": "hE6Fd3jRD1xFvVpT",
    "type": "NYkTHOiP6Aahy2i8",
    "author_id": 18,
    "thumbnail": "SNpc8uvco9Ew61sK"
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
    -d '{"title":"K4F3jiSMBaSpAm9v","body":"5ZXVVeHnHhvykwqr","type":"tdAaNxBBdchfO1RL","author_id":15,"thumbnail":"fqyghsXWDHwxJcCk"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "K4F3jiSMBaSpAm9v",
    "body": "5ZXVVeHnHhvykwqr",
    "type": "tdAaNxBBdchfO1RL",
    "author_id": 15,
    "thumbnail": "fqyghsXWDHwxJcCk"
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
    -d '{"title":"FcBAkRwVV7Qhyaq1","body":"wQMo8k3CTpHCUphW","type":"azkvDWPz6HZesNOK","author_id":18,"thumbnail":"BhoH1IRH1XAM5eub"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "FcBAkRwVV7Qhyaq1",
    "body": "wQMo8k3CTpHCUphW",
    "type": "azkvDWPz6HZesNOK",
    "author_id": 18,
    "thumbnail": "BhoH1IRH1XAM5eub"
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
    -d '{"title":"IgYKS6HacZZBtDlY","body":"8l5l5CWrK1JhDZKf","type":"jlds5W6TbxGi9L8v","author_id":11,"thumbnail":"ZioWZR9bqNkep6c1"}'

```

```javascript
const url = new URL("http://localhost/user_date");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "IgYKS6HacZZBtDlY",
    "body": "8l5l5CWrK1JhDZKf",
    "type": "jlds5W6TbxGi9L8v",
    "author_id": 11,
    "thumbnail": "ZioWZR9bqNkep6c1"
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


