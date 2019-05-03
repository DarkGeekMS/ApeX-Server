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
<!-- START_d8051ae0416d98a1408407350b45bf62 -->
## Delete message
Delete a private message or a reply to a message. Either the receiver or the
sender can delete a message. If both the receiver and the sender
have deleted the message, then it&#039;s deleted entirely from the database,
If a message is deleted, all its replies will be deleted.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1.The parameters are valid, return json contains
 "the message is deleted successfully" (status code 200).

###Failure Cases:
1. Message ID is not found. (status code 404)
2. The user is not the sender nor the receiver of the message. (status code 400)
3. The message is already deleted from the current user
 but still not deleted from the other user. (status code 400)
4. The `token` is invalid, and the user is not authorized. (status code 400)

> Example request:

```bash
curl -X DELETE "http://localhost/api/DeleteMessage" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"t4_1","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9TaWduSW4iLCJpYXQiOjE1NTY3MTEwNjMsIm5iZiI6MTU1NjcxMTA2MywianRpIjoibExYQ3ZoY25ORmRPY0IxeCIsInN1YiI6InQyXzEyODM2IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ONpwJdRUzyitYLly3ULnfMlGlbOhCPAd4J6BhqMNRBI"}'

```

```javascript
const url = new URL("http://localhost/api/DeleteMessage");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "t4_1",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9TaWduSW4iLCJpYXQiOjE1NTY3MTEwNjMsIm5iZiI6MTU1NjcxMTA2MywianRpIjoibExYQ3ZoY25ORmRPY0IxeCIsInN1YiI6InQyXzEyODM2IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ONpwJdRUzyitYLly3ULnfMlGlbOhCPAd4J6BhqMNRBI"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "result": "The message is deleted successfully"
}
```
> Example response (404):

```json
{
    "error": "message ID is not found"
}
```
> Example response (400):

```json
{
    "error": "The user is not the sender nor the receiver of the message"
}
```
> Example response (400):

```json
{
    "error": "The message is already deleted from the sender"
}
```
> Example response (400):

```json
{
    "error": "The message is already deleted from the receiver"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`DELETE api/DeleteMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_d8051ae0416d98a1408407350b45bf62 -->

<!-- START_417c4408f0f4c6bb6a248e1049b05981 -->
## readMsg
retrieve a message and its replies for any user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. return the details of the message (status code 200).

###Failure Cases:
1. Invalid token (status code 400).
2. Message id not found (status code 500).
3. Message does not belong to the user (status code 300)

> Example request:

```bash
curl -X POST "http://localhost/api/ReadMessage" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"suscipit","token":"veritatis"}'

```

```javascript
const url = new URL("http://localhost/api/ReadMessage");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "suscipit",
    "token": "veritatis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "error": "Message doesnot exist"
}
```
> Example response (300):

```json
{
    "error": "Message doesnot belong to the user"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`POST api/ReadMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The id of the message.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_417c4408f0f4c6bb6a248e1049b05981 -->

<!-- START_0a84a513e1a9a5cd4c05dd5207246f2a -->
## Me
Returns the identity of the user logged in.

Success Cases :
1) return the user object of the sent token as json.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/Me" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"ut"}'

```

```javascript
const url = new URL("http://localhost/api/Me");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "ut"
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
    "user": {
        "id": "t2_2",
        "fullname": null,
        "email": "111@gmail.com",
        "username": "MohamedRamzy123",
        "avatar": "storage\/avatars\/users\/default.png",
        "karma": 1,
        "notification": 1,
        "type": 1,
        "created_at": "2019-03-18 09:36:09",
        "updated_at": "2019-03-18 09:36:09"
    }
}
```
> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (400):

```json
{
    "token_error": "The token has been blacklisted"
}
```

### HTTP Request
`POST api/Me`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_0a84a513e1a9a5cd4c05dd5207246f2a -->

<!-- START_93414b82dbdf9fc27deabfb1daa19caf -->
## updates
Updates the preferences of the user.

Success Cases :
1) return true to ensure that the data updated successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) the changed email already exists.

> Example request:

```bash
curl -X POST "http://localhost/api/UpdatePreferences" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"culpa","fullname":"sed","email":"sint","avatar":"est","notifications":true,"token":"distinctio"}'

```

```javascript
const url = new URL("http://localhost/api/UpdatePreferences");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "culpa",
    "fullname": "sed",
    "email": "sint",
    "avatar": "est",
    "notifications": true,
    "token": "distinctio"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/UpdatePreferences`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Enable changing the username.
    fullname | string |  required  | Enable changing the fullname.
    email | string |  required  | Enable changing the email.
    avatar | string |  required  | Enable changing the profile picture.
    notifications | boolean |  optional  | Enable notifications.
    token | JWT |  required  | Used to verify the user.

<!-- END_93414b82dbdf9fc27deabfb1daa19caf -->

<!-- START_c4b956ce3a15b66e26243b38735be0b6 -->
## prefs
Returns the preferences of the user.

Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/GetPreferences" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"earum"}'

```

```javascript
const url = new URL("http://localhost/api/GetPreferences");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "earum"
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
    "username": "Azzoz",
    "email": "Azzoz@hotmail.com",
    "fullname": "Azzoz mando",
    "avatar": "storage\/users\/default.jpg",
    "notification": 1
}
```

### HTTP Request
`POST api/GetPreferences`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_c4b956ce3a15b66e26243b38735be0b6 -->

<!-- START_71beb86f320860946e78c7d7dff1967e -->
## blockList
Returns the blocked users name &amp; IDs by the logged in user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. return the list of the blocked users (status code 200).

###Failure Cases:
1. Invalid token (status code 400).

> Example request:

```bash
curl -X POST "http://localhost/api/BlockList" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"saepe"}'

```

```javascript
const url = new URL("http://localhost/api/BlockList");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "saepe"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (200):

```json
{
    "blocklist": [
        {
            "username": "brekke.violet",
            "id": "t2_1"
        }
    ]
}
```

### HTTP Request
`POST api/BlockList`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_71beb86f320860946e78c7d7dff1967e -->

<!-- START_7274ea6372db5e05372084212e168f7e -->
## profileInfo
Displaying the profile info of the user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. return username, profile picture, karma count, lists of the saved,
     personal and hidden posts and comments of the user (status code 200).

###Failure Cases:
1. Invalid token (status code 400)

> Example request:

```bash
curl -X POST "http://localhost/api/ProfileInfo" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"accusantium"}'

```

```javascript
const url = new URL("http://localhost/api/ProfileInfo");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "accusantium"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`POST api/ProfileInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_7274ea6372db5e05372084212e168f7e -->

<!-- START_ea991777d0a3d3dc8ed2525e95a3748d -->
## Get Inbox Messages
Return a json contains the not-deleted inbox messages (without its replies)
 of the current user divided into `sent` and `received` messages,
 and the `received` messages are divided into `read`, `unread` and `all`
 that contain both `read` and `unread` messages,
 all messages are sorted by latest messages.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. The logged-in user is authorized,
 return the result successfully (status code 200)

###Failure Cases:
1. The `token` is invalid, or the user is not found. (status code 400 or 404)
2. The `max` is invalid (status code 400)

> Example request:

```bash
curl -X POST "http://localhost/api/InboxMessages" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"max":50,"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9TaWduSW4iLCJpYXQiOjE1NTY3MTEwNjMsIm5iZiI6MTU1NjcxMTA2MywianRpIjoibExYQ3ZoY25ORmRPY0IxeCIsInN1YiI6InQyXzEyODM2IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ONpwJdRUzyitYLly3ULnfMlGlbOhCPAd4J6BhqMNRBI"}'

```

```javascript
const url = new URL("http://localhost/api/InboxMessages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 50,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9TaWduSW4iLCJpYXQiOjE1NTY3MTEwNjMsIm5iZiI6MTU1NjcxMTA2MywianRpIjoibExYQ3ZoY25ORmRPY0IxeCIsInN1YiI6InQyXzEyODM2IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ONpwJdRUzyitYLly3ULnfMlGlbOhCPAd4J6BhqMNRBI"
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
    "sent": [
        {
            "id": "t4_2",
            "content": "Hello there",
            "subject": null,
            "sender": {
                "id": "t2_1",
                "username": "Monda Talaat"
            },
            "receiver": {
                "id": "t2_3",
                "username": "Anyone"
            },
            "read": 1,
            "created_at": "2019-03-23 17:20:51",
            "updated_at": "2019-04-14 21:22:05"
        }
    ],
    "received": {
        "read": [
            {
                "id": "t4_9",
                "content": "anything",
                "subject": null,
                "sender": {
                    "id": "t2_2",
                    "username": "mX"
                },
                "receiver": {
                    "id": "t2_1",
                    "username": "Monda Talaat"
                },
                "read": 1,
                "created_at": "2019-05-01 11:49:53",
                "updated_at": "2019-05-01 11:49:53"
            }
        ],
        "unread": [
            {
                "id": "t4_10",
                "content": "anything",
                "subject": null,
                "sender": {
                    "id": "t2_2",
                    "username": "mX"
                },
                "receiver": {
                    "id": "t2_1",
                    "username": "Monda Talaat"
                },
                "read": 0,
                "created_at": "2019-05-01 11:49:53",
                "updated_at": "2019-05-01 11:49:53"
            }
        ],
        "all": [
            {
                "id": "t4_9",
                "content": "anything",
                "subject": null,
                "sender": {
                    "id": "t2_2",
                    "username": "mX"
                },
                "receiver": {
                    "id": "t2_1",
                    "username": "Monda Talaat"
                },
                "read": 1,
                "created_at": "2019-05-01 11:49:53",
                "updated_at": "2019-05-01 11:49:53"
            },
            {
                "id": "t4_10",
                "content": "anything",
                "subject": null,
                "sender": {
                    "id": "t2_2",
                    "username": "mX"
                },
                "receiver": {
                    "id": "t2_1",
                    "username": "Monda Talaat"
                },
                "read": 0,
                "created_at": "2019-05-01 11:49:53",
                "updated_at": "2019-05-01 11:49:53"
            }
        ]
    }
}
```
> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (400):

```json
{
    "max": [
        "The max must be an integer."
    ]
}
```

### HTTP Request
`POST api/InboxMessages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned (default is no limit).
    token | JWT |  required  | Used to verify the user.

<!-- END_ea991777d0a3d3dc8ed2525e95a3748d -->

<!-- START_b4b86fa8876b3115a9baf186219c148b -->
## Logout
Logs out a user.

Success Cases :
1) return token equals to null to ensure that the user is logout successfully.
failure Cases:
1) Token invalid

> Example request:

```bash
curl -X POST "http://localhost/api/SignOut" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"minima"}'

```

```javascript
const url = new URL("http://localhost/api/SignOut");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "minima"
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
    "token": null
}
```
> Example response (400):

```json
{
    "token_error": "wrong number of segments"
}
```

### HTTP Request
`POST api/SignOut`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_b4b86fa8876b3115a9baf186219c148b -->

<!-- START_f5980ebe18b1e12221fe39786f0c0a64 -->
## SignUp
Registers new user into the website.

Success Cases :
1) return user data and JWT token to ensure that the user created successfully.
failure Cases:
1) username already exits.
2) email already exists.
3) username include space.
4) password less than 6 chars.

> Example request:

```bash
curl -X POST "http://localhost/api/SignUp" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"email":"sunt","username":"placeat","password":"qui"}'

```

```javascript
const url = new URL("http://localhost/api/SignUp");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "sunt",
    "username": "placeat",
    "password": "qui"
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
    "user": {
        "email": "hello@gmail.com",
        "username": "MohamedRamzy1234",
        "id": "t2_13",
        "avatar": "storage\/avatars\/users\/default.png",
        "updated_at": "2019-03-19 18:30:05",
        "created_at": "2019-03-19 18:30:05"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwv"
}
```
> Example response (400):

```json
{
    "email": [
        "The email has already been taken."
    ],
    "username": [
        "The username has already been taken."
    ]
}
```
> Example response (400):

```json
{
    "email": [
        "The email has already been taken."
    ]
}
```
> Example response (400):

```json
{
    "username": [
        "The username has already been taken."
    ]
}
```

### HTTP Request
`POST api/SignUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.
    username | string |  required  | The choosen username.
    password | string |  required  | The choosen password.

<!-- END_f5980ebe18b1e12221fe39786f0c0a64 -->

<!-- START_572fea2f500c3854cd48f78ed389e7ce -->
## login
Validates user&#039;s credentials and logs him in.

Success Cases :
1) return JWT token to ensure that the user loggedin successfully.
failure Cases:
1) username is not found.
2) invalid password.

> Example request:

```bash
curl -X POST "http://localhost/api/SignIn" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"quos","password":"amet"}'

```

```javascript
const url = new URL("http://localhost/api/SignIn");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "quos",
    "password": "amet"
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
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9X2luIiwiaWF0IjoxNTUzMD"
}
```
> Example response (400):

```json
{
    "error": "invalid_credentials"
}
```
> Example response (400):

```json
{
    "error": "could_not_create_token"
}
```

### HTTP Request
`POST api/SignIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The user's username.
    password | string |  required  | The user's password.

<!-- END_572fea2f500c3854cd48f78ed389e7ce -->

<!-- START_bc818fb0ab6f11a987dd2cf21deba523 -->
## mailVerify
Send a verification email to the user with a code in case of forgetting password.

Success Cases :
1) return success or failure message to indicate whether the email is sent or not.
failure Cases:
1) email is not found.
2) no password or email recieved.

> Example request:

```bash
curl -X POST "http://localhost/api/MailVerification" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"voluptas","password":"saepe","email":"hic"}'

```

```javascript
const url = new URL("http://localhost/api/MailVerification");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "voluptas",
    "password": "saepe",
    "email": "hic"
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
    "msg": "Email sent successfully"
}
```
> Example response (400):

```json
{
    "msg": "Username is not found"
}
```
> Example response (400):

```json
{
    "msg": "Error sending the email"
}
```

### HTTP Request
`POST api/MailVerification`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  optional  | The user's username.
    password | string |  optional  | The user's password.
    email | string |  required  | The user's email.

<!-- END_bc818fb0ab6f11a987dd2cf21deba523 -->

<!-- START_9890c2fbd8c14912ff333277af8ddd7b -->
## checkCode
Check whether the user entered the correct reset code sent to his email.

Success Cases :
1) return the username in case of success.
Failure Cases :
1) Code is invalid.

> Example request:

```bash
curl -X POST "http://localhost/api/CheckCode" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"code":9,"email":"officia"}'

```

```javascript
const url = new URL("http://localhost/api/CheckCode");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": 9,
    "email": "officia"
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
{}
```
> Example response (400):

```json
{}
```

### HTTP Request
`POST api/CheckCode`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | integer |  required  | The entered code.
    email | string |  required  | The user's email.

<!-- END_9890c2fbd8c14912ff333277af8ddd7b -->

<!-- START_3f793ebdd543854927c5a024f8ac61b9 -->
## Change password whether with the old password or the forgot password code

The function first check if i want to change the password using the code.
or by inputting the old password, IN the first option we won't require a
token if we change it with the code first i will compare the code with the
code in the database then if it is true i will change the password
and delete the code, If we change without code, We will compare
the old password with the given one and if they are match we will
change the password.

> Example request:

```bash
curl -X PATCH "http://localhost/api/ChangePassword" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"assumenda","withcode":false,"password":"nihil","username":"et","key":"et"}'

```

```javascript
const url = new URL("http://localhost/api/ChangePassword");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "assumenda",
    "withcode": false,
    "password": "nihil",
    "username": "et",
    "key": "et"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Invalid password less than 6 chars"
}
```

### HTTP Request
`PATCH api/ChangePassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  optional  | Used to verify the user.
    withcode | boolean |  required  | changing password using forgot code or not.
    password | string |  required  | the new password.
    username | string |  required  | the username.
    key | string |  required  | the forgot password code or the old password.      *

<!-- END_3f793ebdd543854927c5a024f8ac61b9 -->

#Adminstration

To manage the controls of admins and moderators
<!-- START_6f3609a072184c07ac6ac01b586ad334 -->
## deleteApexCom
Deleting the ApexCom by the admin.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. Return true to ensure ApexCom is deleted successfully (status code 200).

###Failure Cases:
1. Invalid token (status code 400).
2. Apex fullname (ID) is not found (status code 500).
3. Unauthorized access the token is not the site admin token id (status code 300).

> Example request:

```bash
curl -X DELETE "http://localhost/api/DeleteApexcom" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"illum","token":"repellat"}'

```

```javascript
const url = new URL("http://localhost/api/DeleteApexcom");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "illum",
    "token": "repellat"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "error": "ApexCom doesnot exist"
}
```
> Example response (300):

```json
{
    "error": "Unauthorized access"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (200):

```json
{
    "deleted": true
}
```

### HTTP Request
`DELETE api/DeleteApexcom`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_6f3609a072184c07ac6ac01b586ad334 -->

<!-- START_b96b3e30a9c4ebb65ad04d4bb592913d -->
## deleteUser
Delete a user from the application by the admin or self-delete (Account deactivation).

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. return true to ensure that the user is deleted successfully (status code 200).

###Failure Cases:
1. Invalid token (status code 400).
2. User fullname (ID) is not found (status code 500).
3. UnAuthorized Deletion the token is not the site admin or the same user token id (status code 300).
4. Wrong password confirmation in case of account deactivation (status code 403).

> Example request:

```bash
curl -X DELETE "http://localhost/api/DeleteUser" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"distinctio","token":"quam","passwordConfirmation":"alias"}'

```

```javascript
const url = new URL("http://localhost/api/DeleteUser");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "distinctio",
    "token": "quam",
    "passwordConfirmation": "alias"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "error": "User doesnot exist"
}
```
> Example response (403):

```json
{
    "error": "Wrong password entered"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (300):

```json
{
    "error": "UnAuthorized Deletion"
}
```
> Example response (200):

```json
{
    "deleted": true
}
```

### HTTP Request
`DELETE api/DeleteUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    token | JWT |  required  | Used to verify the admin or the same user ID.
    passwordConfirmation | string |  optional  | Used to verify the user deactivating his account.

<!-- END_b96b3e30a9c4ebb65ad04d4bb592913d -->

<!-- START_c7286be571297f4b19968cca18b5c899 -->
## addModerator
Adding (or Deleting) a moderator to ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. Return json contains 'the user moderation is added  successfully',
       if the user is added as a moderator (status code 200)
2. Return json contains 'the user moderation is deleted  successfully',
       if the user modration is removed (status code 200).

###Failure Cases:
1. Invalid token (status code 400).
2. User fullname (ID) is not found (status code 403).
3. Apex com ID is not found (status code 404).
4. Unauthorized access the token is not the site admin token id (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/AddModerator" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"nihil","token":"deleniti","UserID":"quis"}'

```

```javascript
const url = new URL("http://localhost/api/AddModerator");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "nihil",
    "token": "deleniti",
    "UserID": "quis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (403):

```json
{
    "error": "User doesnot exist"
}
```
> Example response (404):

```json
{
    "error": "ApexCom doesnot exist"
}
```
> Example response (500):

```json
{
    "error": "Unauthorized access"
}
```
> Example response (200):

```json
{
    "moderate": "the user moderation is added successfully"
}
```
> Example response (200):

```json
{
    "moderate": "the user moderation is deleted successfully"
}
```

### HTTP Request
`POST api/AddModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexComID | string |  required  | The ID of the ApexCom.
    token | JWT |  required  | Used to verify the Admin ID.
    UserID | string |  required  | The user ID to be added as a moderator.

<!-- END_c7286be571297f4b19968cca18b5c899 -->

#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_974043610df9d66f06305ffa9ab73419 -->
## getApexComs
getapexcom names which user subscribe in or all apexCom names the user can visit.

Success Cases :
1) return the apexComs names and ids the user subscribed in or the apexComs names and ids user can access.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/GetApexcoms" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"rerum","general":true}'

```

```javascript
const url = new URL("http://localhost/api/GetApexcoms");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "rerum",
    "general": true
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "Unauthorized access"
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`POST api/GetApexcoms`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Verifying user ID.
    general | boolean |  optional  | set to 1 get all the epexComs names and ids , 0 to get the user subscribed ones.

<!-- END_974043610df9d66f06305ffa9ab73419 -->

<!-- START_94c16530b372b3089f1f792e94dc3c6c -->
## About
to get data about an ApexCom (moderators , name, contributors , rules,
description and subscribers count) with a logged in user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the user is not blocked from the apexcom, if he was blocked a logical error is returned.
Then, The about information of apexcom is returned.

###Success Cases :
1) return the information about the ApexCom.
###failure Cases:
1) User is blocked from this apexcom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/AboutApexcom" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"est","token":"nemo"}'

```

```javascript
const url = new URL("http://localhost/api/AboutApexcom");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "est",
    "token": "nemo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`POST api/AboutApexcom`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_94c16530b372b3089f1f792e94dc3c6c -->

<!-- START_4673ccccf6327e19e1dce9447038394a -->
## Post
to post text , image or video in any ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the user is not blocked from the apexcom, if he was blocked a logical error is returned.
Validation to request parameters is done,
the post shall contain title and at least a body, an image, or a video url.
if validation fails logical error is returned, else a new post is added and return 'created'.

###Success Cases :
1) return post id to ensure that the post was added to the ApexCom successfully.
###failure Cases:
1) User is blocked from this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.
3) Not including text , image or video in the request.
4) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/SubmitPost" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"a","title":"voluptas","body":"soluta","img_name":"cupiditate","video_url":"iusto","isLocked":false,"token":"pariatur"}'

```

```javascript
const url = new URL("http://localhost/api/SubmitPost");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "a",
    "title": "voluptas",
    "body": "soluta",
    "img_name": "cupiditate",
    "video_url": "iusto",
    "isLocked": false,
    "token": "pariatur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (404):

```json
{
    "error": "User is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (400):

```json
{
    "error": "the url is not a youtube video"
}
```

### HTTP Request
`POST api/SubmitPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the post is posted.
    title | string |  required  | The title of the post.
    body | string |  optional  | The text body of the post.
    img_name | string |  optional  | The attached image to the post.
    video_url | string |  optional  | The url to attached video to the post.
    isLocked | boolean |  optional  | To allow or disallow comments on the posted post.
    token | JWT |  required  | Verifying user ID.

<!-- END_4673ccccf6327e19e1dce9447038394a -->

<!-- START_05500f39a6083aea013dbfd26923d727 -->
## Subscribe
for a user to subscribe an ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the user is not blocked from the apexcom, if he was blocked a logical error is returned.
If, the user already subscribes this apexcom, it will delete the subscription and return 'unsubscribed'.
Else, the user will subscribe the apexcom, and it will return 'subscribed'.

###Success Cases :
1) return state to ensure that the subscription or unsubscribtion has been done successfully.
###failure Cases:
1) user blocked from this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/Subscribe" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"voluptatum","token":"neque"}'

```

```javascript
const url = new URL("http://localhost/api/Subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "voluptatum",
    "token": "neque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
[
    true
]
```

### HTTP Request
`POST api/Subscribe`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the community required to be subscribed.
    token | JWT |  required  | Verifying user ID.

<!-- END_05500f39a6083aea013dbfd26923d727 -->

<!-- START_66bb2d9fe698010dfa5da71859a6fc1b -->
## Site Admin
Used by the site admin to create or update a new ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
First, a verification that the user creating or updating apexcom is an admin, if not a logical error is returned.
Then, validating the request parameters the name,
description and rules are required, banner and avatar are optional but they should be images.
If, the validation fails all validation errors are returned.
Then, check if the apexcom with this name exists or not,
if it already exists then its data is updatad and return 'updated'.
if apexcom name doesn't exist then a new apexcom is created and return 'created'.

###Success Cases :
1) return state to ensure that the ApexCom was created or updated successfully.
###failure Cases:
1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
2) Wrong or unsufficient submitted information.

> Example request:

```bash
curl -X POST "http://localhost/api/SiteAdmin" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"ipsum","description":"omnis","rules":"perferendis","avatar":"quia","banner":"ea","token":"sit"}'

```

```javascript
const url = new URL("http://localhost/api/SiteAdmin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ipsum",
    "description": "omnis",
    "rules": "perferendis",
    "avatar": "quia",
    "banner": "ea",
    "token": "sit"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "token_error": "The token could not be parsed from the request"
}
```
> Example response (400):

```json
{
    "error": "No Access Rights to create or edit an ApexCom"
}
```
> Example response (400):

```json
{
    "name": [
        "The name field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The description field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The rules field is required."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The name must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The description must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "name": [
        "The rules must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "avatar": [
        "The avatar must be an image."
    ]
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`POST api/SiteAdmin`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the community.
    description | string |  required  | The description of the community.
    rules | string |  required  | The rules of the community.
    avatar | string |  optional  | The icon image to the community.
    banner | string |  optional  | The header image to the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_66bb2d9fe698010dfa5da71859a6fc1b -->

<!-- START_8698a23d0c4d31095116518a7250c960 -->
## Guest about
to get data about an ApexCom (moderators (name and id ) ,
name, contributors , rules , description and subscribers count).

It first checks the apexcom id, if it wasnot found an error is returned.
Then about information of apexcom is returned.

Success Cases :
1) return the information about the ApexCom.
failure Cases:
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/AboutApexcom" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"enim"}'

```

```javascript
const url = new URL("http://localhost/api/AboutApexcom");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "enim"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`GET api/AboutApexcom`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the Apexcom.

<!-- END_8698a23d0c4d31095116518a7250c960 -->

#Links and comments

controls the comments , replies and private messages for each user
<!-- START_709e545012bcb47c235531fa5a882d4f -->
## add
submit a new comment or reply to a comment on a post or reply to any message.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return true to ensure that the comment , reply is added successfully.

###failure Cases:
1) post fullname (ID) is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/AddReply" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"content":"quia","parent":"doloremque","token":"non"}'

```

```javascript
const url = new URL("http://localhost/api/AddReply");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "content": "quia",
    "parent": "doloremque",
    "token": "non"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "comment not exists"
}
```
> Example response (404):

```json
{
    "error": "message not exists"
}
```
> Example response (400):

```json
{
    "token_error": "invalid Action"
}
```
> Example response (200):

```json
{
    "comment": "t1_12"
}
```
> Example response (200):

```json
{
    "reply": "t1_10"
}
```
> Example response (200):

```json
{
    "id": "t4_12"
}
```

### HTTP Request
`POST api/AddReply`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    content | string |  required  | The body of the comment.
    parent | string |  required  | The fullname of the thing to be replied to (post , comment or message).
    token | JWT |  required  | Verifying user ID.

<!-- END_709e545012bcb47c235531fa5a882d4f -->

<!-- START_73d8034cc7e640d2a337d44d13a2d7fe -->
## delete
to delete a post or comment or reply from any ApexCom by the owner of the thing,
the moderator of this ApexCom or any admin.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return true to ensure that the post, comment or reply is deleted successfully.

###failure Cases:
1) NoAccessRight token is not authorized.
2) NoAccessRight the token is not for the owner of the thing to be deleted or the moderator of this ApexCom.
3) post , comment or reply fullname (ID) is not found.

> Example request:

```bash
curl -X DELETE "http://localhost/api/Delete" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"magnam","token":"qui"}'

```

```javascript
const url = new URL("http://localhost/api/Delete");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "magnam",
    "token": "qui"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "comment not exists"
}
```
> Example response (400):

```json
{
    "token_error": "invalid user"
}
```
> Example response (400):

```json
{
    "token_error": "invalid action"
}
```
> Example response (200):

```json
{
    "deleted": "true"
}
```

### HTTP Request
`DELETE api/Delete`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to be deleted.
    token | JWT |  required  | Verifying user ID.

<!-- END_73d8034cc7e640d2a337d44d13a2d7fe -->

<!-- START_d4f86d1d28b5416fafbe748e1d347701 -->
## editText
to edit the text of a post , comment or reply by its owner.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. Return true to ensure that the post or comment updated successfully (status code 200).

###Failure Cases:
1. Invalid token (status code 400).
2. No Access Right the token is not for the owner of the post or comment to be edited (status code 403).
3. post or comment fullname (ID) is not found (status code 500).

> Example request:

```bash
curl -X PATCH "http://localhost/api/EditText" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"illum","content":"cupiditate","token":"ut"}'

```

```javascript
const url = new URL("http://localhost/api/EditText");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "illum",
    "content": "cupiditate",
    "token": "ut"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "error": "post or comment is not found"
}
```
> Example response (403):

```json
{
    "error": "user is not the owner of the post or comment"
}
```
> Example response (200):

```json
{
    "value": true
}
```

### HTTP Request
`PATCH api/EditText`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    token | JWT |  required  | Verifying user ID.

<!-- END_d4f86d1d28b5416fafbe748e1d347701 -->

<!-- START_d752fc6bd0cd5d44affc43e585e07ef7 -->
## report
report a post , comment to the ApexCom moderator
 posts or comments will be hidden implicitly as well.

( moderators con't report postsor comment in their ApexComs).
user can't report his post or comment.
user can't report comment on his post.
admin can't report on post or comment.

###Success Cases :
1) return true to ensure that the report is added successfully.

###failure Cases:
1) no content send.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/Report" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"fuga","content":"quaerat","token":"consequuntur"}'

```

```javascript
const url = new URL("http://localhost/api/Report");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "fuga",
    "content": "quaerat",
    "token": "consequuntur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (404):

```json
{
    "error": "report content not found"
}
```
> Example response (404):

```json
{
    "error": "comment_not_found"
}
```
> Example response (400):

```json
{
    "error": "invalid Action"
}
```
> Example response (200):

```json
{
    "reported": true
}
```

### HTTP Request
`POST api/Report`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post or comment  to report.
    content | string |  optional  | The reason for the report.
    token | JWT |  required  | Verifying user ID.

<!-- END_d752fc6bd0cd5d44affc43e585e07ef7 -->

<!-- START_8c6e4e2ef99acc0aea3c7fe055cb991c -->
## vote
cast a vote on a post , comment or reply and update the karma of the post or comment owner post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
each 50 upVote for a post or 70 upVote for comment will increase the karama by 1.

###Success Cases :
1) return total number of votes on this post,comment or reply.

###failure Cases:
1) NoAccessRight token is not authorized.
2) fullname of the thing to vote on is not found.
3) direction of the vote is not integer between -1 , 1.

> Example request:

```bash
curl -X POST "http://localhost/api/Vote" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"similique","dir":6,"token":"quidem"}'

```

```javascript
const url = new URL("http://localhost/api/Vote");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "similique",
    "dir": 6,
    "token": "quidem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (400):

```json
{
    "error": "Invalid Action"
}
```
> Example response (200):

```json
{
    "votes": 5
}
```

### HTTP Request
`POST api/Vote`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post,comment or reply to vote on.
    dir | integer |  required  | The direction of the vote ( 1 up-vote , -1 down-vote).
    token | JWT |  required  | Verifying user ID.

<!-- END_8c6e4e2ef99acc0aea3c7fe055cb991c -->

<!-- START_d56676a688e2c0ac7b9414979c85b980 -->
## lock
to lock or unlock a post so it can&#039;t recieve new comments.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
check the user id the post owner or admin in the ApexCom or moderator in the ApexCom holds the post
to be able to lock this post otherwise error message Not Allowed will return.

###Success Cases :
1) return true to ensure that the post was locked/unlock.

###failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.
3) NoAccessRight the user ID is not for the owner of the post or a moderator in the ApexCom includes this post.

> Example request:

```bash
curl -X POST "http://localhost/api/LockPost" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"aut","token":"aspernatur"}'

```

```javascript
const url = new URL("http://localhost/api/LockPost");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "aut",
    "token": "aspernatur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (400):

```json
{
    "token_error": "Not allowed"
}
```
> Example response (200):

```json
{
    "locked": true
}
```

### HTTP Request
`POST api/LockPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be locked.
    token | JWT |  required  | Verifying user ID.

<!-- END_d56676a688e2c0ac7b9414979c85b980 -->

<!-- START_ebf64eb08a02a3600dbec8e628a60a56 -->
## hide
to hide or UnHide a post from the user view.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
check valid user and post and if the post was hidden it removes it from hiddens and vice versa.

###Success Cases :
1) return true to ensure that the post hidden.

###failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/Hide" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"voluptatem","token":"earum"}'

```

```javascript
const url = new URL("http://localhost/api/Hide");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "voluptatem",
    "token": "earum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (200):

```json
{
    "hide": true
}
```
> Example response (200):

```json
{
    "un-hide": true
}
```

### HTTP Request
`POST api/Hide`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the post to be hidden.
    token | JWT |  required  | Verifying user ID.

<!-- END_ebf64eb08a02a3600dbec8e628a60a56 -->

<!-- START_3da95270ecd2427490ff1a0778688878 -->
## save
Save or UnSave a post or a comment.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. Return json contains 'the post is saved successfully',
       if the user saved a post (status code 200)
2. Return json contains 'the post is unsaved successfully',
       if the user unsaved a post (status code 200).
3. Return json contains 'the comment is saved successfully',
       if the user saved a comment (status code 200)
4. Return json contains 'the comment is umsaved successfully',
       if the user unsaved a comment (status code 200).

###Failure Cases:
1. post or comment fullname (ID) is not found (status code 404).
2. Invalid token(status code 400).

> Example request:

```bash
curl -X POST "http://localhost/api/Save" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"consequuntur","token":"omnis"}'

```

```javascript
const url = new URL("http://localhost/api/Save");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "consequuntur",
    "token": "omnis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "post or comment doesnot exist"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (200):

```json
{
    "value": "the post is saved successfully"
}
```
> Example response (200):

```json
{
    "value": "the post is unsaved successfully"
}
```
> Example response (200):

```json
{
    "value": "the comment is saved successfully"
}
```
> Example response (200):

```json
{
    "value": "the comment is unsaved successfully"
}
```

### HTTP Request
`POST api/Save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
    token | JWT |  required  | Used to verify the user.

<!-- END_3da95270ecd2427490ff1a0778688878 -->

<!-- START_c03c4538b82af21b580b359d5f894744 -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies).

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return thr retrieved comments and replies sorted by date { level represent the comment depth}.

###failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X POST "http://localhost/api/RetrieveComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"rerum","token":"et"}'

```

```javascript
const url = new URL("http://localhost/api/RetrieveComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "rerum",
    "token": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "user_not_found"
}
```
> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (200):

```json
{
    "comments": [
        {
            "id": "t1_12",
            "commented_by": "t2_3873",
            "content": "hahah",
            "root": "t3_1",
            "parent": null,
            "created_at": "2019-05-01 18:20:00",
            "updated_at": "2019-05-01 18:20:00",
            "userVote": 0,
            "Saved": false,
            "votes": 0,
            "writerUsername": "1111",
            "level": 0
        }
    ]
}
```

### HTTP Request
`POST api/RetrieveComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    token | JWT |  required  | Verifying user ID.

<!-- END_c03c4538b82af21b580b359d5f894744 -->

<!-- START_46e31d79bbf6fc215af1be2850986a81 -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies ).

###Success Cases :
1) return the retrieved comments or replies.

###failure Cases:
1) post  fullname (ID) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/RetrieveComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"est"}'

```

```javascript
const url = new URL("http://localhost/api/RetrieveComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "est"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "post not exists"
}
```
> Example response (200):

```json
{
    "comments": [
        {
            "id": "t1_10",
            "commented_by": "t2_280",
            "content": "Doloremque voluptatum tempora id vitae quis. Consequatur eos nobis et qui. Expedita quo ea est aut quia ea. Quas velit est et est ex quasi ipsam.",
            "root": "t3_2",
            "parent": null,
            "created_at": "2019-05-01 16:02:32",
            "updated_at": "2019-05-01 16:02:32",
            "votes": 2,
            "writerUsername": "lew.collier",
            "level": 0
        }
    ]
}
```

### HTTP Request
`GET api/RetrieveComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the post whose comments are being fetched

<!-- END_46e31d79bbf6fc215af1be2850986a81 -->

#Moderation

Controls the Moderators actions.
<!-- START_15f937df7c47370b0cde916f9f24285e -->
## Block user
A functionality related to apexcom moderators to block a user from ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return state (blocked/ unblocked) to ensure the success of the process.

###failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.
2) user fullname (id) is not found.
3) Apexcom is not found.
4) you can not block an admin or moderator in the apexcom.

> Example request:

```bash
curl -X POST "http://localhost/api/ApexcomBlockUser" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"et","user_id":"id","token":"voluptate"}'

```

```javascript
const url = new URL("http://localhost/api/ApexcomBlockUser");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "et",
    "user_id": "id",
    "token": "voluptate"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (404):

```json
{
    "error": "User not found."
}
```
> Example response (400):

```json
{
    "error": "You are not a moderator of this apexcom."
}
```
> Example response (400):

```json
{
    "error": "You can not block a moderator in the apexcom."
}
```
> Example response (200):

```json
{
    "state": "Blocked"
}
```

### HTTP Request
`POST api/ApexcomBlockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the user is blocked.
    user_id | string |  required  | The fullname of the user to be blocked.
    token | JWT |  required  | Verifying user ID.

<!-- END_15f937df7c47370b0cde916f9f24285e -->

<!-- START_5ede00f5ff0da85d5e297b781892e239 -->
## IgnoreReport
to delete the ignored report from  ApexCom&#039;s reports.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return state(post or comment) to ensure that the report is deleted successfully.
###failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
2) report fullname (id) is not found.
3) reported id does not exist (there exist a post or comment with this id but it is not reported
 by this userid).
4) user id who made the report is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/IgnoreReport" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"user_id":"et","reported_id":"est","token":"eveniet"}'

```

```javascript
const url = new URL("http://localhost/api/IgnoreReport");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": "et",
    "reported_id": "est",
    "token": "eveniet"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "Unable to find a post or a comment."
}
```
> Example response (404):

```json
{
    "error": "Report not found."
}
```
> Example response (404):

```json
{
    "error": "User not found."
}
```
> Example response (400):

```json
{
    "error": "You have no rights to edit posts or comments in this apexcom."
}
```
> Example response (200):

```json
{
    "state": "Ignore report on post"
}
```
> Example response (200):

```json
{
    "state": "Ignore report on comment"
}
```

### HTTP Request
`POST api/IgnoreReport`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | string |  required  | The fullname of the user who reported the comment or post to be ignored.
    reported_id | string |  required  | The fullname of the post or comment to be ignored.
    token | JWT |  required  | Verifying user ID.

<!-- END_5ede00f5ff0da85d5e297b781892e239 -->

<!-- START_a0028868ad09d975e77702f2ecccfd07 -->
## ReviewReports
view the reports sent by any user for any post or comment in the ApexCom he is moderator in.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1) return the reported posts and comments.

###failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.
2) Apexcom is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/ReviewReports" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"voluptas","token":"quia"}'

```

```javascript
const url = new URL("http://localhost/api/ReviewReports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "voluptas",
    "token": "quia"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are not a moderator of this apexcom."
}
```

### HTTP Request
`POST api/ReviewReports`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the reported comments or posts.
    token | JWT |  required  | Verifying user ID.

<!-- END_a0028868ad09d975e77702f2ecccfd07 -->

#User

Control the user interaction with other users
<!-- START_cb15867be3e7fe011888270761799078 -->
## Block
User block another user, so they can&#039;t send private messages to each other
 or see their each other posts or comments.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
If the user is already blocked, the request will unblock him

###Success Cases :
1. Return json contains 'the user has been blocked successfully',
       if the user was not blocked (status code 200)
2. Return json contains 'the user has been unblocked seccessfully',
       if the user was blocked already (status code 200).

###Failure Cases:
1. The `token` is invalid, return a message about the error (stauts code 400).
2. Blocked user is not found (status code 404)
3. The user is blocking himself (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/BlockUser" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"blockedID":"t2_1","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/BlockUser");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "blockedID": "t2_1",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
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
    "result": "The user has been blocked successfully"
}
```
> Example response (200):

```json
{
    "result": "The user has been unblocked successfully"
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (404):

```json
{
    "error": "Blocked user is not found"
}
```
> Example response (400):

```json
{
    "error": "The user can't block himself"
}
```

### HTTP Request
`POST api/BlockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    blockedID | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<!-- END_cb15867be3e7fe011888270761799078 -->

<!-- START_fd27df8f92bd13c77da6bf95e6214a30 -->
## Compose
Send a private message to another user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
###Success Cases :
1. The parameters are valid, return the id of the composed message
   (status code 200)

###Failure Cases:
1. Messaged-user id is not found (status code 404).
2. Invalid token, return a message about the error (status code 400).
3. The users are blocked from each other (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/ComposeMessage" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"receiver":"king","subject":"Hello","content":"Can I have a date with you?","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/ComposeMessage");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "receiver": "king",
    "subject": "Hello",
    "content": "Can I have a date with you?",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
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
    "id": "t4_1"
}
```
> Example response (404):

```json
{
    "error": "Receiver id is not found"
}
```
> Example response (400):

```json
{
    "error": [
        "blocked users can't message each other"
    ]
}
```
> Example response (400):

```json
{
    "subject": [
        "The subject field is required."
    ]
}
```
> Example response (400):

```json
{
    "reciever": [
        "The receiver field is required."
    ]
}
```
> Example response (400):

```json
{
    "content": [
        "The content field is required."
    ]
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/ComposeMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    receiver | string |  required  | The username of the user to be messaged.
    subject | string |  required  | The subject of the message.
    content | text |  required  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_fd27df8f92bd13c77da6bf95e6214a30 -->

<!-- START_fa3ecd6b90f129f66b3e3f7a0e1fdd66 -->
## User Get User Data
Just like [Guest Get User Data](#guest-get-user-data), except that
it does&#039;t return user data between blocked users,
it also adds the current user vote on the user&#039;s posts
and if he had saved them.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. Return the data of the user successfully.

###Failure Cases:
1. User is not found (status code 400).
2. The `token` is invalid, return a message about the error (status code 400).
3. The users are blocked from each other (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/UserData" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"King","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I"}'

```

```javascript
const url = new URL("http://localhost/api/UserData");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "King",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I"
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
    "userData": {
        "username": "King",
        "fullname": "Martin Luther King",
        "karma": 1,
        "avatar": "publicimgdef.png"
    },
    "posts": [
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:32",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 1,
            "apex_com_name": "Elder Scrolls",
            "post_writer_username": "King"
        },
        {
            "id": "t3_6",
            "posted_by": "t2_4",
            "apex_id": "t5_2",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:35",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 0,
            "apex_com_name": "New dawn",
            "post_writer_username": "King"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "User is not found"
}
```
> Example response (400):

```json
{
    "username": [
        "The username field is required."
    ]
}
```
> Example response (400):

```json
{
    "error": "blocked users can't view data of each other"
}
```

### HTTP Request
`POST api/UserData`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The username of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_fa3ecd6b90f129f66b3e3f7a0e1fdd66 -->

<!-- START_ae19afde970d282482000760f9b34e5c -->
## Guest Get User Data
Return user data to be seen by another user.

User data includes: username, fullname, karma,
 profile picture (URL) and personal posts

Use this request only if the user is a guest and not authorized

###Success Cases :
1.The parameters are valid, return the data of the user successfully
 (status code 200).

###Failure Cases:
1. User is not found (status code 404).
2. There is a server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/UserData" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/UserData");

    let params = {
            "username": "King",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
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
    "userData": {
        "username": "King",
        "fullname": "Martin Luther King",
        "karma": 1,
        "avatar": "publicimgdef.png"
    },
    "posts": [
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:32",
            "updated_at": null,
            "votes": 0,
            "comments_count": 1,
            "apex_com_name": "Elder Scrolls",
            "post_writer_username": "King"
        },
        {
            "id": "t3_6",
            "posted_by": "t2_4",
            "apex_id": "t5_2",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:35",
            "updated_at": null,
            "votes": 0,
            "comments_count": 0,
            "apex_com_name": "New dawn",
            "post_writer_username": "King"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "User is not found"
}
```
> Example response (400):

```json
{
    "username": [
        "The username field is required."
    ]
}
```

### HTTP Request
`GET api/UserData`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    username |  required  | The username of an existing user.

<!-- END_ae19afde970d282482000760f9b34e5c -->

#general
<!-- START_90fc065f5e865939d2348b176b0711ed -->
## User Sort Posts
Just like [Guest Sort Posts](#guest-sort-posts), except that
it does&#039;t return the posts between blocked users
and posts that are hidden or reported by the current user
and posts from apexComs that the current user is blocked from,
it also adds to every post the current user vote and if he had saved the post,
If the boolean `subscribedApexComs` is true, then it ignores the `apexComID`
and return only posts in the apexComs that the user is subscribed in.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. ApexCom is not found (status code 404).
2. The user is not subscribed in any apexCom. (status code 400)
3. The `token` is invalid, return a message about the error (status code 400)
4. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/SortPosts" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"apexComID":"t5_1","subscribedApexCom":false,"sortingParam":"votes","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/SortPosts");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "apexComID": "t5_1",
    "subscribedApexCom": false,
    "sortingParam": "votes",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
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
    "posts": [
        {
            "id": "t3_16",
            "posted_by": "t2_6",
            "apex_id": "t5_9",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:45",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 0,
            "apex_com_name": "health care",
            "post_writer_username": "double",
            "post_writer_is_deleted": false
        },
        {
            "id": "t3_15",
            "posted_by": "t2_13",
            "apex_id": "t5_8",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:44",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 0,
            "apex_com_name": "movies",
            "post_writer_username": "waleed",
            "post_writer_is_deleted": true
        },
        {
            "id": "t3_14",
            "posted_by": "t2_15",
            "apex_id": "t5_7",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:43",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 1,
            "apex_com_name": "memes",
            "post_writer_username": "menna",
            "post_writer_is_deleted": false
        }
    ],
    "sortingParam": "date"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```
> Example response (400):

```json
{
    "error": "The user is not subscribed in any ApexCom"
}
```

### HTTP Request
`POST api/SortPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    apexComID | string |  optional  | The ID of the ApexComm that contains the posts, default is null.
    subscribedApexCom | boolean |  optional  | If true return only the posts in ApexComs that the user is subscribed in, takes a value of [`true`, `false`, `1`, `0`, `"1"`, `"0"`], default is `false`.
    sortingParam | string |  optional  | The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`.
    token | JWT |  required  | Used to verify the user.

<!-- END_90fc065f5e865939d2348b176b0711ed -->

<!-- START_b4fdc5ef1d91b78b7db0c1e9bca83a8b -->
## User Search
Just like [Guest Search](#guest-search) except that
it does&#039;t return the posts between blocked users,
posts that are hidden or reported by the current user
and posts from apexComs that the current user is blocked from,
it also doesn&#039;t return blocked users
and the apexComs that the user is blocked from,
it also adds the current user vote on the posts and if he had saved them
and adds the current user subscription of the apexComs.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. The `query` is valid, return the results successfullly (status code 200)

###Failure Cases:
1. The `query` is invalid, return message about the error (status code 400)
2. The `token` is invalid, return a message about the error (status code 400)
3. There is server-side error (status code 500)

> Example request:

```bash
curl -X POST "http://localhost/api/Search" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"query":"lorem","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/Search");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "query": "lorem",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"
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
    "posts": [
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:30",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": 0,
            "comments_count": 1,
            "apex_com_name": "Elder Scrolls",
            "post_writer_username": "mX"
        },
        {
            "id": "t3_10",
            "posted_by": "t2_8",
            "apex_id": "t5_4",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:39",
            "updated_at": null,
            "current_user_vote": 0,
            "current_user_saved_post": false,
            "votes": -2,
            "comments_count": 1,
            "apex_com_name": "foods",
            "post_writer_username": "mazen"
        }
    ],
    "apexComs": [
        {
            "id": "t5_1",
            "name": "Elder Scrolls",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0,
            "current_user_subscribed": false
        },
        {
            "id": "t5_10",
            "name": "comics",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0,
            "current_user_subscribed": false
        },
        {
            "id": "t5_2",
            "name": "New dawn",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0,
            "current_user_subscribed": false
        }
    ],
    "users": [
        {
            "id": "t2_3",
            "username": "Anyone",
            "avatar": "publicimgdef.png",
            "karma": 1
        }
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query field is required."
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "error": "Not authorized"
}
```

### HTTP Request
`POST api/Search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    query | string |  required  | The query to be searched for (at least 3 characters).
    token | JWT |  required  | Used to verify the user.

<!-- END_b4fdc5ef1d91b78b7db0c1e9bca83a8b -->

<!-- START_3ecb97933b3d5d1d2cac0065fed60a19 -->
## Get Subscribers
Returns a list of the users subscribed to a certain ApexCom to an authorized user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the authorized user is not blocked from the apexcom,
if he was blocked a logical error is returned.
Then, it gets the username and id of the subscribers and returns them.

###Success Cases :
1) Return the result successfully.
###failure Cases:
1) Return empty list if there are no subscribers.
2) ApexComm Fullname (ID) is not found.
3) User blocked from this apexcom.

> Example request:

```bash
curl -X POST "http://localhost/api/GetSubscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"dolores","token":"excepturi"}'

```

```javascript
const url = new URL("http://localhost/api/GetSubscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "dolores",
    "token": "excepturi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (400):

```json
{
    "error": "You are blocked from this Apexcom"
}
```
> Example response (200):

```json
{
    "subscribers": [
        {
            "id": "t2_1017",
            "username": "ms16"
        }
    ]
}
```

### HTTP Request
`POST api/GetSubscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexCom that contains the subscribers.
    token | JWT |  required  | Verifying user ID.

<!-- END_3ecb97933b3d5d1d2cac0065fed60a19 -->

<!-- START_39c06606c7aed19fb0b85e779cb69d48 -->
## Guest Search
Returns a json contains posts, apexComs and users that match the given query.

Use this request only if the user is a guest and not authorized

###Success Cases :
1. The `query` is valid, return the results successfullly (status code 200)

###Failure Cases:
1. The `query` is invalid, return message about the error (status code 400)
2. There is server-side error (status code 500)

> Example request:

```bash
curl -X GET -G "http://localhost/api/Search" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/Search");

    let params = {
            "query": "lorem",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
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
    "posts": [
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:30",
            "updated_at": null,
            "votes": 0,
            "comments_count": 1,
            "apex_com_name": "Elder Scrolls",
            "post_writer_username": "mX"
        },
        {
            "id": "t3_10",
            "posted_by": "t2_8",
            "apex_id": "t5_4",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:39",
            "updated_at": null,
            "votes": -2,
            "comments_count": 1,
            "apex_com_name": "foods",
            "post_writer_username": "mazen"
        },
        {
            "id": "t3_11",
            "posted_by": "t2_8",
            "apex_id": "t5_3",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:40",
            "updated_at": null,
            "votes": 1,
            "comments_count": 1,
            "apex_com_name": "gaming area",
            "post_writer_username": "mazen"
        }
    ],
    "apexComs": [
        {
            "id": "t5_1",
            "name": "Elder Scrolls",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0
        },
        {
            "id": "t5_10",
            "name": "comics",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0
        },
        {
            "id": "t5_2",
            "name": "New dawn",
            "avatar": "public\\img\\apx.png",
            "description": "The name says it all.",
            "subscribers_count": 0
        }
    ],
    "users": [
        {
            "id": "t2_3",
            "username": "Anyone",
            "avatar": "publicimgdef.png",
            "karma": 1
        }
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query must be at least 3 characters."
    ]
}
```
> Example response (400):

```json
{
    "query": [
        "The query field is required."
    ]
}
```

### HTTP Request
`GET api/Search`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    query |  required  | The query to be searched for (at least 3 characters).

<!-- END_39c06606c7aed19fb0b85e779cb69d48 -->

<!-- START_ea6d2a48194e2c800ae60e784593047b -->
## Guest Sort Posts
Returns a list of posts in a given ApexCom
sorted either by the votes or by the date when they were created
or by the number of comments.

- When `apexComID` is missing or equals null,
    it returns all the posts in all apexComs.
- When `sortingParam` is missing or equals null, it uses the default value

Use this request only if the user is a guest and not authorized

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. ApexCom is not found (status code 404).
2. There is a server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/SortPosts" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/SortPosts");

    let params = {
            "apexComID": "t5_1",
            "sortingParam": "votes",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Api-Version": "0.1.0",
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
    "posts": [
        {
            "id": "t3_8",
            "posted_by": "t2_12",
            "apex_id": "t5_3",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 1,
            "created_at": "2019-03-23 17:20:37",
            "updated_at": null,
            "votes": 1,
            "comments_count": 2,
            "apex_com_name": "gaming area",
            "post_writer_username": "dina",
            "post_writer_is_deleted": true
        },
        {
            "id": "t3_11",
            "posted_by": "t2_8",
            "apex_id": "t5_3",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:40",
            "updated_at": null,
            "votes": 1,
            "comments_count": 1,
            "apex_com_name": "gaming area",
            "post_writer_username": "mazen",
            "post_writer_is_deleted": false
        },
        {
            "id": "t3_9",
            "posted_by": "t2_7",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": "2019-03-23 17:20:38",
            "updated_at": null,
            "votes": 1,
            "comments_count": 3,
            "apex_com_name": "Elder Scrolls",
            "post_writer_username": "ramzy",
            "post_writer_is_deleted": false
        }
    ],
    "sortingParam": "votes"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```

### HTTP Request
`GET api/SortPosts`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    apexComID |  optional  | The ID of the ApexComm that contains the posts, default is null.
    sortingParam |  optional  | The sorting parameter,takes a value of [`votes`, `date`, `comments`], default is `date`.

<!-- END_ea6d2a48194e2c800ae60e784593047b -->

<!-- START_1a89ab7ed21c58fe5f13956e29efaf06 -->
## Apex Names
Returns a list of the names and ids of all of the existing ApexComs.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. There is server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/ApexComs" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/ApexComs");

let headers = {
    "Api-Version": "0.1.0",
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
    "apexComs": [
        {
            "id": "t5_17",
            "name": "0DFMimwvXH"
        },
        {
            "id": "t5_24",
            "name": "0pjHJnsykI"
        },
        {
            "id": "t5_27",
            "name": "1TiI90tkGl"
        },
        {
            "id": "t5_14",
            "name": "5R6xBtkMWi"
        },
        {
            "id": "t5_25",
            "name": "6t492yOgR2"
        },
        {
            "id": "t5_12",
            "name": "742HgVteXc"
        },
        {
            "id": "t5_19",
            "name": "8FSkAyxTdN"
        },
        {
            "id": "t5_13",
            "name": "A7F2JiJ9Lz"
        },
        {
            "id": "t5_10",
            "name": "comics"
        },
        {
            "id": "t5_18",
            "name": "dHZXEOkqHF"
        },
        {
            "id": "t5_1",
            "name": "Elder Scrolls"
        },
        {
            "id": "t5_4",
            "name": "foods"
        },
        {
            "id": "t5_15",
            "name": "fZJ70kuKnq"
        },
        {
            "id": "t5_3",
            "name": "gaming area"
        },
        {
            "id": "t5_11",
            "name": "GQZEX6QbQ8"
        },
        {
            "id": "t5_23",
            "name": "hbab"
        },
        {
            "id": "t5_22",
            "name": "hbabe"
        },
        {
            "id": "t5_9",
            "name": "health care"
        },
        {
            "id": "t5_7",
            "name": "memes"
        },
        {
            "id": "t5_8",
            "name": "movies"
        },
        {
            "id": "t5_2",
            "name": "New dawn"
        },
        {
            "id": "t5_26",
            "name": "NXvarZiWLu"
        },
        {
            "id": "t5_5",
            "name": "sports area"
        },
        {
            "id": "t5_21",
            "name": "ssportss"
        },
        {
            "id": "t5_20",
            "name": "stgWFLOkM9"
        },
        {
            "id": "t5_6",
            "name": "technology"
        },
        {
            "id": "t5_16",
            "name": "v0Jb4Gc5ZR"
        },
        {
            "id": "t5_28",
            "name": "wj3Z65p27J"
        }
    ]
}
```

### HTTP Request
`GET api/ApexComs`


<!-- END_1a89ab7ed21c58fe5f13956e29efaf06 -->

<!-- START_ff6d9c0ae6b088f47d45e3a239d792cc -->
## GuestGetSubscribers
Returns a list of the users subscribed to a certain ApexCom to a guest user.

It first checks the apexcom id, if it was not found an error is returned.
it gets the username and id of the subscribers and returns them.

###Success Cases :
1) Return the result successfully.
###failure Cases:
2) ApexComm Fullname (ID) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/GetSubscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"exercitationem"}'

```

```javascript
const url = new URL("http://localhost/api/GetSubscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "exercitationem"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```
> Example response (200):

```json
{
    "subscribers": [
        {
            "id": "t2_1017",
            "username": "ms16"
        }
    ]
}
```

### HTTP Request
`GET api/GetSubscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the subscribers.

<!-- END_ff6d9c0ae6b088f47d45e3a239d792cc -->


