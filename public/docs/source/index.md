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
    -d '{"title":"A783R5GsZMwr3BT4","body":"XuIITVn7ruqTTJVd","type":"wre6PDsJhu3lKvNF","author_id":14,"thumbnail":"YKzcVQxoNP7YfOOT"}'

```

```javascript
const url = new URL("http://localhost/comment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "A783R5GsZMwr3BT4",
    "body": "XuIITVn7ruqTTJVd",
    "type": "wre6PDsJhu3lKvNF",
    "author_id": 14,
    "thumbnail": "YKzcVQxoNP7YfOOT"
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
    -d '{"title":"E5imXDplGnH5QmJN","body":"qu0vx3m2AHpChO5P","type":"Gp1YyBZ0Odq41Bou","author_id":8,"thumbnail":"TU7W2bO2ZwHXgWVp"}'

```

```javascript
const url = new URL("http://localhost/DelComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "E5imXDplGnH5QmJN",
    "body": "qu0vx3m2AHpChO5P",
    "type": "Gp1YyBZ0Odq41Bou",
    "author_id": 8,
    "thumbnail": "TU7W2bO2ZwHXgWVp"
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
    -d '{"title":"8u7A63Ccg5X3OBIY","body":"IR5hsjYH4DExzbGL","type":"OPq68L1DFxX4mLw9","author_id":16,"thumbnail":"IMxSQcUhBmptnLsB"}'

```

```javascript
const url = new URL("http://localhost/Edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8u7A63Ccg5X3OBIY",
    "body": "IR5hsjYH4DExzbGL",
    "type": "OPq68L1DFxX4mLw9",
    "author_id": 16,
    "thumbnail": "IMxSQcUhBmptnLsB"
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
    -d '{"title":"EZFVf0nQM1KWcSNR","body":"BYE5kmSYlbxOMGtQ","type":"WfNHYteh9WzbDtPZ","author_id":9,"thumbnail":"YLqLhCmeyHccB4FM"}'

```

```javascript
const url = new URL("http://localhost/Hide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "EZFVf0nQM1KWcSNR",
    "body": "BYE5kmSYlbxOMGtQ",
    "type": "WfNHYteh9WzbDtPZ",
    "author_id": 9,
    "thumbnail": "YLqLhCmeyHccB4FM"
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
    -d '{"title":"aIEkLAUjBGaKSE0v","body":"EBsNV9ocmhwbFPVS","type":"Cvx85TVkncbjy7Tj","author_id":4,"thumbnail":"5hwRDEGZ2hM7cnCg"}'

```

```javascript
const url = new URL("http://localhost/unhide");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "aIEkLAUjBGaKSE0v",
    "body": "EBsNV9ocmhwbFPVS",
    "type": "Cvx85TVkncbjy7Tj",
    "author_id": 4,
    "thumbnail": "5hwRDEGZ2hM7cnCg"
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
    -d '{"title":"X4DzKCaxA8vBDloJ","body":"7Vid9N0lNJsCPOtU","type":"IA4d1UuENnBaAzrl","author_id":7,"thumbnail":"TOAYkWQQdN3ra1nk"}'

```

```javascript
const url = new URL("http://localhost/moreComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "X4DzKCaxA8vBDloJ",
    "body": "7Vid9N0lNJsCPOtU",
    "type": "IA4d1UuENnBaAzrl",
    "author_id": 7,
    "thumbnail": "TOAYkWQQdN3ra1nk"
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
    -d '{"title":"cwLKz9mzuW9uvytg","body":"rvksWBjfcRm2m8Nk","type":"gClC5d7qsnYE7gUn","author_id":17,"thumbnail":"gtxHpRvd59z3H4dB"}'

```

```javascript
const url = new URL("http://localhost/report");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "cwLKz9mzuW9uvytg",
    "body": "rvksWBjfcRm2m8Nk",
    "type": "gClC5d7qsnYE7gUn",
    "author_id": 17,
    "thumbnail": "gtxHpRvd59z3H4dB"
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
    -d '{"title":"a2doGQSFNmqZeFzn","body":"eGFQcSQvfy6HVTP3","type":"punmJluy0niEUQ60","author_id":1,"thumbnail":"5gkb23xbPB4PO4cJ"}'

```

```javascript
const url = new URL("http://localhost/vote");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "a2doGQSFNmqZeFzn",
    "body": "eGFQcSQvfy6HVTP3",
    "type": "punmJluy0niEUQ60",
    "author_id": 1,
    "thumbnail": "5gkb23xbPB4PO4cJ"
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
    -d '{"title":"8L3EsLEHLh7YpGfJ","body":"eZ62pIpxVxbeszdM","type":"jAOdooB49qdCqnQk","author_id":16,"thumbnail":"VyZEv63k5aXEmHES"}'

```

```javascript
const url = new URL("http://localhost/save");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8L3EsLEHLh7YpGfJ",
    "body": "eZ62pIpxVxbeszdM",
    "type": "jAOdooB49qdCqnQk",
    "author_id": 16,
    "thumbnail": "VyZEv63k5aXEmHES"
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
    -d '{"title":"qSByFAJTGeoYeeU0","body":"zZe56BuePEKPPeXs","type":"gltOtsOMuYBfmdQV","author_id":6,"thumbnail":"3xceilm4uKblNdUU"}'

```

```javascript
const url = new URL("http://localhost/unsave");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "qSByFAJTGeoYeeU0",
    "body": "zZe56BuePEKPPeXs",
    "type": "gltOtsOMuYBfmdQV",
    "author_id": 6,
    "thumbnail": "3xceilm4uKblNdUU"
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
    -d '{"title":"XQG5OiMpDSw9HXkl","body":"fXI0UC1OHepiMPjp","type":"fdbmuMyc2NA8mAFN","author_id":14,"thumbnail":"eAHeLOQhJdOPydVk"}'

```

```javascript
const url = new URL("http://localhost/sign_up");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "XQG5OiMpDSw9HXkl",
    "body": "fXI0UC1OHepiMPjp",
    "type": "fdbmuMyc2NA8mAFN",
    "author_id": 14,
    "thumbnail": "eAHeLOQhJdOPydVk"
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
    -d '{"title":"bomRYEFXaFAl5Dgu","body":"xMefx9WVsMss0H6f","type":"ha08w4HD5l6ZiCXC","author_id":2,"thumbnail":"12XsVYuMD4JwpXk1"}'

```

```javascript
const url = new URL("http://localhost/Sign_in");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "bomRYEFXaFAl5Dgu",
    "body": "xMefx9WVsMss0H6f",
    "type": "ha08w4HD5l6ZiCXC",
    "author_id": 2,
    "thumbnail": "12XsVYuMD4JwpXk1"
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
    -d '{"title":"DUNKZS6md9s9AThq","body":"DWxzVrvCP85s6tn0","type":"NA17M0IdcW4s7M2B","author_id":6,"thumbnail":"AZZlq0x48PbC8y6u"}'

```

```javascript
const url = new URL("http://localhost/sign_out");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "DUNKZS6md9s9AThq",
    "body": "DWxzVrvCP85s6tn0",
    "type": "NA17M0IdcW4s7M2B",
    "author_id": 6,
    "thumbnail": "AZZlq0x48PbC8y6u"
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
    -d '{"title":"52KjdPUEianyB8Tq","body":"HyN8cSBYMvWemL1g","type":"gj5hACcE0B4jIg2d","author_id":10,"thumbnail":"poeGMcE5qaVZF0zC"}'

```

```javascript
const url = new URL("http://localhost/del_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "52KjdPUEianyB8Tq",
    "body": "HyN8cSBYMvWemL1g",
    "type": "gj5hACcE0B4jIg2d",
    "author_id": 10,
    "thumbnail": "poeGMcE5qaVZF0zC"
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
    -d '{"title":"Z0Bw2R0Ye7qIOdmi","body":"DIN63bYLUr63aOqU","type":"zfDCGlIERqEaJZAm","author_id":5,"thumbnail":"e9XpLYVc01wpZCez"}'

```

```javascript
const url = new URL("http://localhost/read_msg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Z0Bw2R0Ye7qIOdmi",
    "body": "DIN63bYLUr63aOqU",
    "type": "zfDCGlIERqEaJZAm",
    "author_id": 5,
    "thumbnail": "e9XpLYVc01wpZCez"
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
    -d '{"title":"l8I0KJ5Oj4CRkarj","body":"jR1M6iLp3ZWzDzUq","type":"EPljkBEMHS0cx4aN","author_id":2,"thumbnail":"gg6rxKGgbzLr1VlJ"}'

```

```javascript
const url = new URL("http://localhost/updateprefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "l8I0KJ5Oj4CRkarj",
    "body": "jR1M6iLp3ZWzDzUq",
    "type": "EPljkBEMHS0cx4aN",
    "author_id": 2,
    "thumbnail": "gg6rxKGgbzLr1VlJ"
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
    -d '{"title":"efa4N2p007iXKKlL","body":"80kWS8t5lvRWS9Bd","type":"dYDsNA3sh9gBFcsi","author_id":1,"thumbnail":"0cxiEBvDCxsYNwOo"}'

```

```javascript
const url = new URL("http://localhost/prefs");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "efa4N2p007iXKKlL",
    "body": "80kWS8t5lvRWS9Bd",
    "type": "dYDsNA3sh9gBFcsi",
    "author_id": 1,
    "thumbnail": "0cxiEBvDCxsYNwOo"
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
    -d '{"title":"USBIBnmAGXeHf7yy","body":"YJIx1lVX4A5ZXGyw","type":"jZLEDu8UPIHr4EIE","author_id":19,"thumbnail":"ePjaWc1s74iCz3I2"}'

```

```javascript
const url = new URL("http://localhost/me");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "USBIBnmAGXeHf7yy",
    "body": "YJIx1lVX4A5ZXGyw",
    "type": "jZLEDu8UPIHr4EIE",
    "author_id": 19,
    "thumbnail": "ePjaWc1s74iCz3I2"
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
    -d '{"title":"Rb2BVcVi7wabDjgd","body":"QTLCSwVRSBXwBrbN","type":"O1lOJu00zAOIvRxC","author_id":20,"thumbnail":"dorB9pB4LDr5AAcc"}'

```

```javascript
const url = new URL("http://localhost/info");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Rb2BVcVi7wabDjgd",
    "body": "QTLCSwVRSBXwBrbN",
    "type": "O1lOJu00zAOIvRxC",
    "author_id": 20,
    "thumbnail": "dorB9pB4LDr5AAcc"
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
    -d '{"title":"jrwgd6vSAmlBfKyS","body":"rfl1E93WbQsE9VuL","type":"YzYiTnk3y2lhqrqz","author_id":18,"thumbnail":"hOMFwSs2VwKQ3Dec"}'

```

```javascript
const url = new URL("http://localhost/karma");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "jrwgd6vSAmlBfKyS",
    "body": "rfl1E93WbQsE9VuL",
    "type": "YzYiTnk3y2lhqrqz",
    "author_id": 18,
    "thumbnail": "hOMFwSs2VwKQ3Dec"
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
    -d '{"title":"JBfLnSrj2wmXQQJS","body":"D8qVSuGJ2gZtpfWk","type":"GRwh0cf1TtbKvZQZ","author_id":3,"thumbnail":"ZtdPvDHAKybJqS3f"}'

```

```javascript
const url = new URL("http://localhost/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "JBfLnSrj2wmXQQJS",
    "body": "D8qVSuGJ2gZtpfWk",
    "type": "GRwh0cf1TtbKvZQZ",
    "author_id": 3,
    "thumbnail": "ZtdPvDHAKybJqS3f"
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
    -d '{"title":"1k4fww320ozmOAXf","body":"0Dx01XMwzVqom17A","type":"fSl3fNJ9FyWCCq9E","author_id":18,"thumbnail":"fQmsXnBXdEw8ViaV"}'

```

```javascript
const url = new URL("http://localhost/del_ac");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "1k4fww320ozmOAXf",
    "body": "0Dx01XMwzVqom17A",
    "type": "fSl3fNJ9FyWCCq9E",
    "author_id": 18,
    "thumbnail": "fQmsXnBXdEw8ViaV"
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
    -d '{"title":"Bn3O5nTKOn9FK8eB","body":"pbueHQtqkCk1fy7q","type":"lPgScQQctX2FV2r9","author_id":9,"thumbnail":"3i0SRLTnhjBKtVaw"}'

```

```javascript
const url = new URL("http://localhost/del_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Bn3O5nTKOn9FK8eB",
    "body": "pbueHQtqkCk1fy7q",
    "type": "lPgScQQctX2FV2r9",
    "author_id": 9,
    "thumbnail": "3i0SRLTnhjBKtVaw"
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
    -d '{"title":"0KBZO6pMop40NSv0","body":"SCPInbXb16iDezGg","type":"ktHns4qXVqQdCq9e","author_id":11,"thumbnail":"2phTjVyQZpJwAVs6"}'

```

```javascript
const url = new URL("http://localhost/add_mod");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "0KBZO6pMop40NSv0",
    "body": "SCPInbXb16iDezGg",
    "type": "ktHns4qXVqQdCq9e",
    "author_id": 11,
    "thumbnail": "2phTjVyQZpJwAVs6"
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
    -d '{"title":"8DGyvHpNRhyCR65C","body":"Bqy96wtgxxi39O0K","type":"F2HTeedToVM4GS0o","author_id":4,"thumbnail":"AqUmMYFzTk9cdgrH"}'

```

```javascript
const url = new URL("http://localhost/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "8DGyvHpNRhyCR65C",
    "body": "Bqy96wtgxxi39O0K",
    "type": "F2HTeedToVM4GS0o",
    "author_id": 4,
    "thumbnail": "AqUmMYFzTk9cdgrH"
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
    -d '{"title":"V9WzDOhYLxIr0BwD","body":"zH7KNTfj47cktQGi","type":"cDz8EhdMRIPyEoKe","author_id":11,"thumbnail":"Cz3KEuVfHZ9Cbstg"}'

```

```javascript
const url = new URL("http://localhost/posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "V9WzDOhYLxIr0BwD",
    "body": "zH7KNTfj47cktQGi",
    "type": "cDz8EhdMRIPyEoKe",
    "author_id": 11,
    "thumbnail": "Cz3KEuVfHZ9Cbstg"
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
    -d '{"title":"p0RGTrQb1uE3qEqt","body":"HHIM7unA43pezNzR","type":"K35hg1VchTAjTdPd","author_id":6,"thumbnail":"MFqrJ1DMY01aJhSw"}'

```

```javascript
const url = new URL("http://localhost/subscribe");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "p0RGTrQb1uE3qEqt",
    "body": "HHIM7unA43pezNzR",
    "type": "K35hg1VchTAjTdPd",
    "author_id": 6,
    "thumbnail": "MFqrJ1DMY01aJhSw"
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
    -d '{"title":"BKthyni5hvxkWTiZ","body":"fmT6xuIcgIQTS1GK","type":"ZxR9YqI4eqcjckUw","author_id":9,"thumbnail":"G9uoMrf7VnvIxZrb"}'

```

```javascript
const url = new URL("http://localhost/site_admin");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "BKthyni5hvxkWTiZ",
    "body": "fmT6xuIcgIQTS1GK",
    "type": "ZxR9YqI4eqcjckUw",
    "author_id": 9,
    "thumbnail": "G9uoMrf7VnvIxZrb"
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
    -d '{"title":"2rEJMyLZbmQs1bsU","body":"WEjDATiccN4vRdQq","type":"ocuwSMoHqBRfrnab","author_id":16,"thumbnail":"Lx8sSTNAuodetXOL"}'

```

```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2rEJMyLZbmQs1bsU",
    "body": "WEjDATiccN4vRdQq",
    "type": "ocuwSMoHqBRfrnab",
    "author_id": 16,
    "thumbnail": "Lx8sSTNAuodetXOL"
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
    -d '{"title":"pzE1H4InxcEQdlbA","body":"qFRtTFAJd0zgy6re","type":"vNzSXCC5Dm1SSuuE","author_id":9,"thumbnail":"modnicCYkSGMiNGB"}'

```

```javascript
const url = new URL("http://localhost/trendings");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "pzE1H4InxcEQdlbA",
    "body": "qFRtTFAJd0zgy6re",
    "type": "vNzSXCC5Dm1SSuuE",
    "author_id": 9,
    "thumbnail": "modnicCYkSGMiNGB"
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
    -d '{"title":"5ELSbNybvdlsesUs","body":"x1j8ykX8LkIaamHN","type":"dAhQty3tqxnCetKY","author_id":10,"thumbnail":"RjvEHUUGbRTbVwac"}'

```

```javascript
const url = new URL("http://localhost/hot_posts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "5ELSbNybvdlsesUs",
    "body": "x1j8ykX8LkIaamHN",
    "type": "dAhQty3tqxnCetKY",
    "author_id": 10,
    "thumbnail": "RjvEHUUGbRTbVwac"
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
    -d '{"title":"3vaCPkgoYChUCj42","body":"50RD977JiB7IS7hv","type":"1TVOGv8sIhDk3GvJ","author_id":5,"thumbnail":"X2I80c1Du2FjgGsO"}'

```

```javascript
const url = new URL("http://localhost/remove");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "3vaCPkgoYChUCj42",
    "body": "50RD977JiB7IS7hv",
    "type": "1TVOGv8sIhDk3GvJ",
    "author_id": 5,
    "thumbnail": "X2I80c1Du2FjgGsO"
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
    -d '{"title":"Bbp73u2d6H9Q72QP","body":"QC3FRJMNejJqVO9E","type":"S716ilmOjhf4G877","author_id":4,"thumbnail":"ceuQCLTmKNeALjCL"}'

```

```javascript
const url = new URL("http://localhost/approve");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "Bbp73u2d6H9Q72QP",
    "body": "QC3FRJMNejJqVO9E",
    "type": "S716ilmOjhf4G877",
    "author_id": 4,
    "thumbnail": "ceuQCLTmKNeALjCL"
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
    -d '{"title":"jIhQPZg5Q58bUqc2","body":"ANi7v5eNa7Alw7ix","type":"nipYdkkiixFO3Sv5","author_id":18,"thumbnail":"MvWNpmOG1C2FAICt"}'

```

```javascript
const url = new URL("http://localhost/review_reports");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "jIhQPZg5Q58bUqc2",
    "body": "ANi7v5eNa7Alw7ix",
    "type": "nipYdkkiixFO3Sv5",
    "author_id": 18,
    "thumbnail": "MvWNpmOG1C2FAICt"
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
    -d '{"title":"2s9rmw82S18V9jsG","body":"FAJVLF5o1LExBvHI","type":"7JVUvhy3wFVmpNRc","author_id":16,"thumbnail":"KqwACysLr2FhrAnc"}'

```

```javascript
const url = new URL("http://localhost/block_user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "2s9rmw82S18V9jsG",
    "body": "FAJVLF5o1LExBvHI",
    "type": "7JVUvhy3wFVmpNRc",
    "author_id": 16,
    "thumbnail": "KqwACysLr2FhrAnc"
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
    -d '{"title":"ZTmwR31L1UFz5fpY","body":"Wb6qvCiNAJCOwIO9","type":"Swd71GSl4YncnrTs","author_id":11,"thumbnail":"GvT4QSZdKBOHfRlA"}'

```

```javascript
const url = new URL("http://localhost/compose");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "ZTmwR31L1UFz5fpY",
    "body": "Wb6qvCiNAJCOwIO9",
    "type": "Swd71GSl4YncnrTs",
    "author_id": 11,
    "thumbnail": "GvT4QSZdKBOHfRlA"
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
    -d '{"title":"CIwZkp8pdkIdQlBT","body":"9Glz58WjgdAtGC7w","type":"NNYNBYXJiAVOFJrD","author_id":20,"thumbnail":"TRZwM1OeBhqWTjsY"}'

```

```javascript
const url = new URL("http://localhost/user_date");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "CIwZkp8pdkIdQlBT",
    "body": "9Glz58WjgdAtGC7w",
    "type": "NNYNBYXJiAVOFJrD",
    "author_id": 20,
    "thumbnail": "TRZwM1OeBhqWTjsY"
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


