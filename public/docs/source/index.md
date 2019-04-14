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
<!-- START_17ab3166922a15e0dcef5180e5c57447 -->
## deleteMsg
Delete private messages from the recipient&#039;s view of their inbox.

Success Cases :
1) return true to ensure that the message is deleted successfully.
failure Cases:
1) message id is not found.
2) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/del_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"id":"BdK0FXLPX7SF2KzS","token":"b9L92YuzV1NC9nk6"}'

```

```javascript
const url = new URL("http://localhost/api/del_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "BdK0FXLPX7SF2KzS",
    "token": "b9L92YuzV1NC9nk6"
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
`POST api/del_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | The id of the message to be deleted.
    token | JWT |  required  | Used to verify the user.

<!-- END_17ab3166922a15e0dcef5180e5c57447 -->

<!-- START_293bfba07d359f07b62946a6702243f5 -->
## readMsg
Read a sent message.

Success Cases :
1) return the details of the message.
2) call moreChildren to retrieve replies to this message.
failure Cases:
1) NoAccessRight token is not authorized.
2) message id not found.

> Example request:

```bash
curl -X POST "http://localhost/api/read_msg" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"UCk0g56z5Beprq2E","token":"tiRimW0akcFrjaFo"}'

```

```javascript
const url = new URL("http://localhost/api/read_msg");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "UCk0g56z5Beprq2E",
    "token": "tiRimW0akcFrjaFo"
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
`POST api/read_msg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The id of the message.
    token | JWT |  required  | Used to verify the user recieving the message.

<!-- END_293bfba07d359f07b62946a6702243f5 -->

<!-- START_d131f717df7db546af1657d1e7ce10f6 -->
## Returns the user of the sent token.

The function extracts the token given in the request then it checks if it
corresponds to an existing user then it will return an error if that is
case else it will return the user object of the token.

> Example request:

```bash
curl -X POST "http://localhost/api/me" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/me");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/me`


<!-- END_d131f717df7db546af1657d1e7ce10f6 -->

<!-- START_7d778b4cd1f31a8abdc1f7156cf2439a -->
## updates
Updates the preferences of the user.

Success Cases :
1) return true to ensure that the data updated successfully.
2) in case deactivating the account the account will be deleted.
failure Cases:
1) NoAccessRight token is not authorized.
2) the changed email already exists.

> Example request:

```bash
curl -X PATCH "http://localhost/api/updateprefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"change_email":"FadcD1SLiI9k3v9w","change_password":"VssS58xrDJzUSuH1","deactivate_account":"BIhRK78ylZDug9tC","media_autoplay":true,"pm_notifications":true,"replies_notifications":true,"token":"qUG5WnEvuPUEZAQt"}'

```

```javascript
const url = new URL("http://localhost/api/updateprefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "change_email": "FadcD1SLiI9k3v9w",
    "change_password": "VssS58xrDJzUSuH1",
    "deactivate_account": "BIhRK78ylZDug9tC",
    "media_autoplay": true,
    "pm_notifications": true,
    "replies_notifications": true,
    "token": "qUG5WnEvuPUEZAQt"
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
    "error": "Not authorized"
}
```

### HTTP Request
`PATCH api/updateprefs`

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

<!-- END_7d778b4cd1f31a8abdc1f7156cf2439a -->

<!-- START_d9dd108ffd7d5fcce74f2072aeaea32e -->
## prefs
Returns the preferences of the user.

Success Cases :
1) return the preferences of the logged-in user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/prefs" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"NeHWIfGwYR1J1M7z"}'

```

```javascript
const url = new URL("http://localhost/api/prefs");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "NeHWIfGwYR1J1M7z"
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
`POST api/prefs`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_d9dd108ffd7d5fcce74f2072aeaea32e -->

<!-- START_09839bea62c266b3f7446dc71dd248c4 -->
## profileInfo
Displaying the profile info of the user.

Success Cases :
1) return username, profile picture , karma count , lists of the saved , personal and hidden posts of the user.
2) in case of moderator it will also return the reports of the ApexCom he is moderator in.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/info" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"0lymmqd0CPWlzper"}'

```

```javascript
const url = new URL("http://localhost/api/info");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "0lymmqd0CPWlzper"
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
`POST api/info`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_09839bea62c266b3f7446dc71dd248c4 -->

<!-- START_c2d21a2d9f4da12e2df2a5662f36d63c -->
## karma
Returns the karma of the user.

Success Cases :
1) return the karmas of the user.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/karma" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"token":"GmcUIrLRISIJHf23"}'

```

```javascript
const url = new URL("http://localhost/api/karma");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "GmcUIrLRISIJHf23"
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
`POST api/karma`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | JWT |  required  | Used to verify the user.

<!-- END_c2d21a2d9f4da12e2df2a5662f36d63c -->

<!-- START_6be4333f0293eadb670cdacf4092f237 -->
## messages
Returns the inbox messages of the user.

Success Cases :
1) return lists of the inbox messages of the user categorized by All , Sent and Unread.
failure Cases:
1) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/inbox_messages" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"max":17,"token":"3I3KtWHs2ka1LWVa"}'

```

```javascript
const url = new URL("http://localhost/api/inbox_messages");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "max": 17,
    "token": "3I3KtWHs2ka1LWVa"
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
`POST api/inbox_messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    max | integer |  optional  | the maximum number of messages to be returned.
    token | JWT |  required  | Used to verify the user.

<!-- END_6be4333f0293eadb670cdacf4092f237 -->

<!-- START_61c037b1e23dc1e0f83fb62a8024cf9d -->
## Logs out a user from the website.

The function firstly extracts the token and invalidates it if any error
happens it will return an error message, else it will return the token
value equals to null to indicate a successfull logout.

> Example request:

```bash
curl -X POST "http://localhost/api/sign_out" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/sign_out");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/sign_out`


<!-- END_61c037b1e23dc1e0f83fb62a8024cf9d -->

<!-- START_311b0f388598aca8ed7f8fdf74916333 -->
## Registers the given user into the website.

The function takes the email, username and password and validates them
if the validation is failed it will return an error response and if it is
successeded it will generate a new id for the new user then it will hash its
password and creates a new user with the given data and creates a default
avatar then it will save the user into the database then it will generate a
JWT token from its data and returns the token with the data as a response.

> Example request:

```bash
curl -X POST "http://localhost/api/sign_up" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/sign_up");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "email": [
        "The email field is required."
    ],
    "password": [
        "The password field is required."
    ],
    "username": [
        "The username field is required."
    ]
}
```

### HTTP Request
`POST api/sign_up`


<!-- END_311b0f388598aca8ed7f8fdf74916333 -->

<!-- START_ae15188c9c0642b2c58e5b4bb8beb57d -->
## Signs in the user into the website.

The function first extracts the credentials of the user and checks for them
if they are wrong it will return an error message, else it will generate a
jwt token and returns it.

> Example request:

```bash
curl -X POST "http://localhost/api/sign_in" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/sign_in");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "error": "invalid_credentials"
}
```

### HTTP Request
`POST api/sign_in`


<!-- END_ae15188c9c0642b2c58e5b4bb8beb57d -->

<!-- START_9c2b68d84a5e58731426b62d8716d169 -->
## Sends a code to the email to reset password.

The function first validates the input username and if the validator fails it
will return an error else it will check if the user exists in the website if
it doesn't exist it will return an error, Then it will generate random code
and send it to the user's email, Then it will delete all codes in the
database asssociated with the user if exists then it will save the new code
in the database and return a success message.

> Example request:

```bash
curl -X POST "http://localhost/api/mail_verify" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/mail_verify");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
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
`POST api/mail_verify`


<!-- END_9c2b68d84a5e58731426b62d8716d169 -->

<!-- START_4b5bbd8dc31ae3073c29c9b679f448b5 -->
## Check the forgot password code to be correct.

The function firstly checks for the input data and if the validator is
failed it will return an error then it will extract the code and username
from the data and get the stored code of the user and compares the 2 codes
if the codes are matching then it will return true to indicate that the code
is correct, Else it will return false.

> Example request:

```bash
curl -X POST "http://localhost/api/check_code" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/check_code");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "username": [
        "The username field is required."
    ],
    "code": [
        "The code field is required."
    ]
}
```

### HTTP Request
`POST api/check_code`


<!-- END_4b5bbd8dc31ae3073c29c9b679f448b5 -->

#Adminstration

To manage the controls of admins and moderators
<!-- START_2da9e0236ffb9162cb62c0fc316dcf91 -->
## deleteApexCom
Deleting the ApexCom by the admin.

Success Cases :
1) return true to ensure ApexCom is deleted successfully.
failure Cases:
1) Apex fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X DELETE "http://localhost/api/del_account" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"Apex_ID":"eEoJMkw2Ak3SYS1O","token":"dHEBrnOyWvvYbiUG"}'

```

```javascript
const url = new URL("http://localhost/api/del_account");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Apex_ID": "eEoJMkw2Ak3SYS1O",
    "token": "dHEBrnOyWvvYbiUG"
}

fetch(url, {
    method: "DELETE",
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
`DELETE api/del_account`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Apex_ID | string |  required  | The ID of the ApexCom to be deleted.
    token | JWT |  required  | Used to verify the admin ID.

<!-- END_2da9e0236ffb9162cb62c0fc316dcf91 -->

<!-- START_e296e67bb691dee7c255f187ef41231e -->
## deleteUser
Delete a user from the application by the admin or self-delete (Account deactivation).

Success Cases :
1) return true to ensure that the user is deleted successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin or the same user token id.

> Example request:

```bash
curl -X DELETE "http://localhost/api/del_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"UserID":"VLGWGC895fSjbV9b","token":"mveTaPj5SIiEhfhu"}'

```

```javascript
const url = new URL("http://localhost/api/del_user");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserID": "VLGWGC895fSjbV9b",
    "token": "mveTaPj5SIiEhfhu"
}

fetch(url, {
    method: "DELETE",
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
`DELETE api/del_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserID | string |  required  | The ID of the user to be deleted.
    token | JWT |  required  | Used to verify the admin or the same user ID.

<!-- END_e296e67bb691dee7c255f187ef41231e -->

<!-- START_fd85770e108112a824ea9fd5c16c7dfc -->
## addModerator
Adding (or Deleting) a moderator to ApexCom.

Success Cases :
1) return true to ensure that the moderator is added successfully.
failure Cases:
1) user fullname (ID) is not found.
2) NoAccessRight the token is not the site admin token id.

> Example request:

```bash
curl -X POST "http://localhost/api/add_moderator" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexComID":"VvhYlMquXiFSRdN2","token":"zapjDVSBl1D4jmJI","UserID":"JQYMuSEzzWDLDeHP"}'

```

```javascript
const url = new URL("http://localhost/api/add_moderator");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexComID": "VvhYlMquXiFSRdN2",
    "token": "zapjDVSBl1D4jmJI",
    "UserID": "JQYMuSEzzWDLDeHP"
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
`POST api/add_moderator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexComID | string |  required  | The ID of the ApexCom.
    token | JWT |  required  | Used to verify the Admin ID.
    UserID | string |  required  | The user ID to be added as a moderator.

<!-- END_fd85770e108112a824ea9fd5c16c7dfc -->

#ApexCom

Controls the ApexCom info , posts and admin.
<!-- START_e412045afd6394e3d300c08eb23558f6 -->
## getApexComs.

This Function used to get the apexComs names & IDs of the logged in user.

It makes sure that the user exists in our app,
select the apexComs ID's  and names which this user subscriber in then return them.

> Example request:

```bash
curl -X POST "http://localhost/api/get_ApexComs" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/get_ApexComs");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/get_ApexComs`


<!-- END_e412045afd6394e3d300c08eb23558f6 -->

<!-- START_1f26a7d3b191a04ab9c1bc160deb8481 -->
## About
to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count) with a logged in user.

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
curl -X POST "http://localhost/api/about" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"rw7FmKHcyof0Xlp9","token":"n7nQ5QtjUgYDcDZ3"}'

```

```javascript
const url = new URL("http://localhost/api/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "rw7FmKHcyof0Xlp9",
    "token": "n7nQ5QtjUgYDcDZ3"
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
{
    "contributers_count": 2,
    "moderators": [
        {
            "userID": "t2_3"
        }
    ],
    "subscribers_count": 0,
    "name": "New dawn",
    "description": "The name says it all.",
    "rules": "NO RULES"
}
```

### HTTP Request
`POST api/about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_1f26a7d3b191a04ab9c1bc160deb8481 -->

<!-- START_2a2f591ef5501e8aaaaa6c4d241d3b09 -->
## Post
to post text , image or video in any ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the user is not blocked from the apexcom, if he was blocked a logical error is returned.
Validation to request parameters is done, the post shall contain title and at least a body, an image, or a video url.
if validation fails logical error is returned, else a new post is added and return 'created'.

###Success Cases :
1) return true to ensure that the post was added to the ApexCom successfully.
###failure Cases:
1) User is blocked from this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.
3) Not including text , image or video in the request.
4) NoAccessRight token is not authorized.

> Example request:

```bash
curl -X POST "http://localhost/api/submit_post" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"htbZISP3gkS0VjrM","title":"Ozq3vE51fRyAvanN","body":"TfNMCmyJyNQ17TcL","img_name":"B0VJ6fv4gGjmqkiu","video_url":"TpfZI8Uyc96agkYX","isLocked":false,"token":"OLct5d6u8XrX1bqB"}'

```

```javascript
const url = new URL("http://localhost/api/submit_post");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "htbZISP3gkS0VjrM",
    "title": "Ozq3vE51fRyAvanN",
    "body": "TfNMCmyJyNQ17TcL",
    "img_name": "B0VJ6fv4gGjmqkiu",
    "video_url": "TpfZI8Uyc96agkYX",
    "isLocked": false,
    "token": "OLct5d6u8XrX1bqB"
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
`POST api/submit_post`

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

<!-- END_2a2f591ef5501e8aaaaa6c4d241d3b09 -->

<!-- START_95d2609383a86210e2424765cf8031d1 -->
## Subscribe
for a user to subscribe an ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the user is not blocked from the apexcom, if he was blocked a logical error is returned.
If, the user already subscribes this apexcom, it will delete the subscription and return 'unsubscribed'.
Else, the user will subscribe the apexcom, and it will return 'subscribed'.

###Success Cases :
1) return true to ensure that the subscription or unsubscribtion has been done successfully.
###failure Cases:
1) user blocked from this ApexCom.
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/subscribe" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"y24VEizI78hloee4","token":"CPdzgU00l0RecCZF"}'

```

```javascript
const url = new URL("http://localhost/api/subscribe");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "y24VEizI78hloee4",
    "token": "CPdzgU00l0RecCZF"
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
`POST api/subscribe`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community required to be subscribed.
    token | JWT |  required  | Verifying user ID.

<!-- END_95d2609383a86210e2424765cf8031d1 -->

<!-- START_83008eaf25318b2ebea682cd9cd6b43b -->
## Site Admin
Used by the site admin to create or update a new ApexCom.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
First, a verification that the user creating or updating apexcom is an admin, if not a logical error is returned.
Then, validating the request parameters the name, description and rules are required, banner and avatar are optional but they should be images.
If, the validation fails all validation errors are returned.
Then, check if the apexcom with this name exists or not, if it already exists then its data is updatad and return 'updated'.
if apexcom name doesn't exist then a new apexcom is created and return 'created'.

###Success Cases :
1) return true to ensure that the ApexCom was created  successfully.
###failure Cases:
1) NoAccessRight the token does not support to Create an ApexCom ( not the admin token).
2) Wrong or unsufficient submitted information.

> Example request:

```bash
curl -X POST "http://localhost/api/site_admin" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"BhEONqoIqgO6pkh6","description":"M73T3j0eZ3k32qhO","rules":"a9N5CRH03Xalniwj","avatar":"53t5euzgGEZMUTHG","banner":"1OOlHhAR3FQc53ei","token":"EnGjuYrgSkafbDQj"}'

```

```javascript
const url = new URL("http://localhost/api/site_admin");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "BhEONqoIqgO6pkh6",
    "description": "M73T3j0eZ3k32qhO",
    "rules": "a9N5CRH03Xalniwj",
    "avatar": "53t5euzgGEZMUTHG",
    "banner": "1OOlHhAR3FQc53ei",
    "token": "EnGjuYrgSkafbDQj"
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
[
    true
]
```

### HTTP Request
`POST api/site_admin`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the community.
    description | string |  required  | The description of the community.
    rules | string |  required  | The rules of the community.
    avatar | string |  optional  | The icon image to the community.
    banner | string |  optional  | The header image to the community.
    token | JWT |  required  | Verifying user ID.

<!-- END_83008eaf25318b2ebea682cd9cd6b43b -->

<!-- START_931d45747883f17f4898d055e7277e3d -->
## Guest about
to get data about an ApexCom (moderators , name, contributors , rules , description and subscribers count).

It first checks the apexcom id, if it wasnot found an error is returned.
Then about information of apexcom is returned.

Success Cases :
1) return the information about the ApexCom.
failure Cases:
2) ApexCom fullname (ApexCom_id) is not found.

> Example request:

```bash
curl -X GET -G "http://localhost/api/about" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_ID":"ANBZzZ8surnPxdqv"}'

```

```javascript
const url = new URL("http://localhost/api/about");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_ID": "ANBZzZ8surnPxdqv"
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
    "contributers_count": 2,
    "moderators": [
        {
            "userID": "t2_3"
        }
    ],
    "subscribers_count": 0,
    "name": "New dawn",
    "description": "The name says it all.",
    "rules": "NO RULES"
}
```

### HTTP Request
`GET api/about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_ID | string |  required  | The fullname of the community.

<!-- END_931d45747883f17f4898d055e7277e3d -->

#Links and comments

controls the comments , replies and private messages for each user
<!-- START_e795fade4d25e2473e7fd22cababfe99 -->
## add.

This Function used to comment on post or another comment or reply to private message.

It makes sure that the user who want to add the comment (or reply) exists in our app,
Then check what kind of action he want to take depending on the parent ID sent to the function.
as the comment component ID starts with t1 so if the sent id t1 + value,
So he want to reply on comment and so on.
if (post or comment) check the post is not locked (can receive new comments) (if locked action not valid)
check the post\comment owner exists or not ( if not action not valid)
then add the comment\msg reply content in the specific table in the database.

> Example request:

```bash
curl -X POST "http://localhost/api/comment" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/comment");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/comment`


<!-- END_e795fade4d25e2473e7fd22cababfe99 -->

<!-- START_4f136192702be68001efc45896913292 -->
## delete.

This Function used to delete comment or post by their owner, any admin or
any moderator in the apexCom holds this post or comment.
any user can delete any comment on his own posts.

it receives the token of the logged in user as for the user to delete any post he has to be logged in our app.
It makes sure that the user who want to delete the comment/post exists in our app by the token,
then check what is the thing to be deleted (post or comment).
by checking the second char of the id as posts start with t3 but comment with t1.
In case of post : check the type of the logged in user,
if admin delete the post, if post owner delete the post, if moderator in the apexCom holds the post delete it.
If comment check the same with post
in addition to checking if the logged in is the owner of the post holds this comment, then delete it.
If none of the above return the action is not valid.

> Example request:

```bash
curl -X DELETE "http://localhost/api/delete" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/delete");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
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
`DELETE api/delete`


<!-- END_4f136192702be68001efc45896913292 -->

<!-- START_2dedef5a7a52cb3e96b8c08067a1b1d5 -->
## editText
to edit the text of a post , comment or reply by its owner.

Success Cases :
1) return true to ensure that the post or comment updated successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) NoAccessRight the token is not for the owner of the post or comment to be edited.
3) post or comment fullname (ID) is not found.

> Example request:

```bash
curl -X PATCH "http://localhost/api/edit" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"name":"EO6BETpjQrJJSPx9","content":"1k645biCcrTbNGyp","token":"MVtuq5qilhFqyDPH"}'

```

```javascript
const url = new URL("http://localhost/api/edit");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "EO6BETpjQrJJSPx9",
    "content": "1k645biCcrTbNGyp",
    "token": "MVtuq5qilhFqyDPH"
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
    "error": "Not authorized"
}
```

### HTTP Request
`PATCH api/edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The fullname of the self-post ,comment or reply to be edited.
    content | string |  required  | The body of the thing to be edited.
    token | JWT |  required  | Verifying user ID.

<!-- END_2dedef5a7a52cb3e96b8c08067a1b1d5 -->

<!-- START_513d4e19011ae1f92bd8858b5eb059b2 -->
## report.

This Function used to report post or comment by logged in user.
Admin can't report any post/comment as he can take action directly aginst this post/comment.
post/comment owner can't report their own posts or comments.
post owners can't report comment on their own posts as they can take action directly against any comment.
moderator in the apexComs holds the post/comment can't report them.

It makes sure that the user who want to report the comment/post exists in our app,
check the logged in user if admin return invalid action.
Then check the this to be reported is post or comment.
as the comment component ID starts with t1_ but post with t3_.
check if the logged in user is the post/comment owner,
or moderator in the apexcom holds this post/comment return invalid action.
in case of comment check if the logged in user is the owner of the post holds this comment,
return invalid action.
then check if the user reported this post/comment before,
if so return the user already reported this post/comment.
if not create this report in the DB.

> Example request:

```bash
curl -X POST "http://localhost/api/report" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/report");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/report`


<!-- END_513d4e19011ae1f92bd8858b5eb059b2 -->

<!-- START_1ce8121bc6bb159652da3758695c4f33 -->
## vote.

This Function used to vote on comment or post by a logged in user.

It makes sure that the user who want to vote on post/comment exists in our app,
Then check the vote will be on comment or post.
as the comment component ID starts with t1_ but post with t3_.
check if the user voted on this post/comment before.
if not create the record and sum the votes on this post/comment then return it.
if it's not the first time for this user to vote on this post/comment,
check if the new vote on is the same as the previous one cancel this record return the updated votes count.
if not update the vote record with the new value and return the updated votes count of the post/comment.

> Example request:

```bash
curl -X POST "http://localhost/api/vote" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/vote");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/vote`


<!-- END_1ce8121bc6bb159652da3758695c4f33 -->

<!-- START_4a071a0a5195e750a36b0b89a51e2235 -->
## lock.

This Function used to un/lock a post from recieving any new comment.
By his owner, moderator in the apexCom holds the post or admin site.

It makes sure that the user who want to un/lock the posts exists in our app,
then check if the posts exists in our app.
then check if the logged in user was admin , post owner or moderator in the apexCom holds this post
It toggles the post locked status, if none of them it return Invalid action.

> Example request:

```bash
curl -X POST "http://localhost/api/lock_post" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/lock_post");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/lock_post`


<!-- END_4a071a0a5195e750a36b0b89a51e2235 -->

<!-- START_ebf64eb08a02a3600dbec8e628a60a56 -->
## hide.

This Function used to hide a post by logged in user.

It makes sure that the user who want to hide the post exists in our app,
Then check the post to be hidden exists in our app.
It check if the post already hidden by this user, remove this record if not add this record in DB.

> Example request:

```bash
curl -X POST "http://localhost/api/Hide" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/Hide");

let headers = {
    "Api-Version": "0.1.0",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
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
`POST api/Hide`


<!-- END_ebf64eb08a02a3600dbec8e628a60a56 -->

<!-- START_097a5f7f0c0183fb32d32b0e9bba6b31 -->
## save
Save or UnSave a post or a comment.

Success Cases :
1) return true to ensure that the post saved successfully.
failure Cases:
1) NoAccessRight token is not authorized.
2) post fullname (ID) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/save" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ID":"soHVyJethkBYqCGG","token":"OveqsOXoNmvIfw7l"}'

```

```javascript
const url = new URL("http://localhost/api/save");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ID": "soHVyJethkBYqCGG",
    "token": "OveqsOXoNmvIfw7l"
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
`POST api/save`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ID | string |  required  | The ID of the comment or post.
    token | JWT |  required  | Used to verify the user.

<!-- END_097a5f7f0c0183fb32d32b0e9bba6b31 -->

<!-- START_43ad8fbdbde00499a1f5e68c9d48283a -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).

Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X POST "http://localhost/api/moreComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"vJmQjMB34Hpcklb1","ID":"AB1X2JTDmWAlU3ug"}'

```

```javascript
const url = new URL("http://localhost/api/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "vJmQjMB34Hpcklb1",
    "ID": "AB1X2JTDmWAlU3ug"
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
`POST api/moreComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    ID | JWT |  required  | Verifying user ID.

<!-- END_43ad8fbdbde00499a1f5e68c9d48283a -->

<!-- START_42544bc9403ef51f80610dbe397862b5 -->
## moreChildren
to retrieve additional comments omitted from a base comment tree (comment , replies , private messages).

Success Cases :
1) return thr retrieved comments or replies (10 reply at a time ).
failure Cases:
1) NoAccessRight token is not authorized.
2) post , comment , reply or message fullname (ID) is not found for any of the parent IDs.

> Example request:

```bash
curl -X GET -G "http://localhost/api/moreComments" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"parent":"SvVWkfhrCU6ph13q","ID":"exGOYDQF85ySFeb5"}'

```

```javascript
const url = new URL("http://localhost/api/moreComments");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "parent": "SvVWkfhrCU6ph13q",
    "ID": "exGOYDQF85ySFeb5"
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
`GET api/moreComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    parent | string |  required  | The fullname of the posts whose comments are being fetched
    ID | JWT |  required  | Verifying user ID.

<!-- END_42544bc9403ef51f80610dbe397862b5 -->

#Moderation

Controls the Moderators actions.
<!-- START_bfe5eadf66f0e0ddc26472dc0275da31 -->
## blockUser
to block a user from ApexCom he is moderator in so that he can&#039;t interact in this ApexCom anymore.

Success Cases :
1) return true to ensure that the post or comment is removed successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the post or comment to be removed.
2) user fullname (id) is not found , already blocked or not subscribed in this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/api/block" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"Hrh5dkTECHHJrUWk","user_id":"EhqohfY9guLYxYOG","_token":"aoQYWw9cJ8Aq3Llt"}'

```

```javascript
const url = new URL("http://localhost/api/block");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "Hrh5dkTECHHJrUWk",
    "user_id": "EhqohfY9guLYxYOG",
    "_token": "aoQYWw9cJ8Aq3Llt"
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
`POST api/block`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the user is blocked.
    user_id | string |  required  | The fullname of the user to be blocked.
    _token | JWT |  required  | Verifying user ID.

<!-- END_bfe5eadf66f0e0ddc26472dc0275da31 -->

<!-- START_85b1e06ff0cc2a00de486d21459568f9 -->
## ignoreReport
to delete the ignored report from  ApexCom&#039;s reports.

Success Cases :
1) return true to ensure that the report is deleted successfully.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom including the report to be removed.
2) report fullname (id) is not found.

> Example request:

```bash
curl -X POST "http://localhost/api/report_action" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"report_id":"JP8KL8KSuh3PmX53","_token":"Wi5PUQjeY864rDrs"}'

```

```javascript
const url = new URL("http://localhost/api/report_action");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "report_id": "JP8KL8KSuh3PmX53",
    "_token": "Wi5PUQjeY864rDrs"
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
`POST api/report_action`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    report_id | string |  required  | The fullname of the report to be ignored.
    _token | JWT |  required  | Verifying user ID.

<!-- END_85b1e06ff0cc2a00de486d21459568f9 -->

<!-- START_6a8a2ddc981aad24b0a9445fed663ae5 -->
## reviewReports
view the reports sent by any user for any post or comment in the ApexCom he is moderator in.

Success Cases :
1) return the reported posts and comments.
failure Cases:
1) NoAccessRight the token is not for the moderator of this ApexCom.

> Example request:

```bash
curl -X POST "http://localhost/api/review_reports" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCom_id":"E4CgNupnRZLF9aLD","_token":"C7cny0VTKIeUi4zl"}'

```

```javascript
const url = new URL("http://localhost/api/review_reports");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCom_id": "E4CgNupnRZLF9aLD",
    "_token": "C7cny0VTKIeUi4zl"
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
`POST api/review_reports`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCom_id | string |  required  | The fullname of the community where the reported comments or posts.
    _token | JWT |  required  | Verifying user ID.

<!-- END_6a8a2ddc981aad24b0a9445fed663ae5 -->

#User

Control the user interaction with other users
<!-- START_5603f5edd050cc1888d2fe64500d5499 -->
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
curl -X POST "http://localhost/api/block_user" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"blockedID":"t2_1","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/block_user");

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
`POST api/block_user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    blockedID | string |  required  | the id of the user to be blocked.
    token | JWT |  required  | Used to verify the user.

<!-- END_5603f5edd050cc1888d2fe64500d5499 -->

<!-- START_77449fa4952e985b77eff4023c7451dd -->
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
curl -X POST "http://localhost/api/compose" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"receiver":"t2_1","subject":"Hello","content":"Can I have a date with you?","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/compose");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "receiver": "t2_1",
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
`POST api/compose`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    receiver | string |  required  | The id of the user to be messaged.
    subject | string |  required  | The subject of the message.
    content | text |  required  | the body of the message.
    token | JWT |  required  | Used to verify the user.

<!-- END_77449fa4952e985b77eff4023c7451dd -->

<!-- START_afac9f990e2b5e3d484085ba83568706 -->
## User Get User Data
Just like [Guest Get User Data](#guest-get-user-data), except that
it does&#039;t return user data between blocked users.

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
curl -X POST "http://localhost/api/user_data" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"username":"King","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMzg0ODYyLCJuYmYiOjE1NTMzODQ4NjIsImp0aSI6Ikg0bU5yR1k0eGpHQkd4eXUiLCJzdWIiOiJ0Ml8yMSIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.OJU25mPYGRiPkBuZCrCxCleaRXLklvHMyMJWX9ijR9I"}'

```

```javascript
const url = new URL("http://localhost/api/user_data");

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
            "updated_at": null
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
            "updated_at": null
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
`POST api/user_data`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | The username of an existing user.
    token | JWT |  required  | Used to verify the user.

<!-- END_afac9f990e2b5e3d484085ba83568706 -->

<!-- START_642cf7a37db701458812f02d6082db55 -->
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
curl -X GET -G "http://localhost/api/user_data" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/user_data");

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
            "updated_at": null
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
            "updated_at": null
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
`GET api/user_data`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    username |  required  | The username of an existing user.

<!-- END_642cf7a37db701458812f02d6082db55 -->

#general
<!-- START_422a9a84e2e26d41816d8167e5e45304 -->
## User Sort Posts
Just like [Guest Sort Posts](#guest-sort-posts), except that
it does&#039;t return the posts between blocked users
and posts that are hidden or reported by the current user
and posts from apexComs that the current user is blocked from.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Use this request only if the user is logged in and authorized.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. ApexCom is not found (status code 404).
2. The `token` is invalid, return a message about the error (status code 400)
3. There is a server-side error (status code 500).

> Example request:

```bash
curl -X POST "http://localhost/api/sort_posts" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"apexComID":"t5_1","sortingParam":"votes","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/sort_posts");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "apexComID": "t5_1",
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
            "id": "t3_4",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 2
        },
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_2",
            "posted_by": "t2_1",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        }
    ],
    "sortingParam": "comments"
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

### HTTP Request
`POST api/sort_posts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    apexComID | string |  optional  | The ID of the ApexComm that contains the posts, default is null.
    sortingParam | string |  optional  | The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`.
    token | JWT |  required  | Used to verify the user.

<!-- END_422a9a84e2e26d41816d8167e5e45304 -->

<!-- START_9792377865465dfd12bebd73e7326925 -->
## User Search
Just like [Guest Search](#guest-search) except that
it does&#039;t return the posts between blocked users,
posts that are hidden or reported by the current user
and posts from apexComs that the current user is blocked from
it also doesn&#039;t return blocked users
and the apexComs that the user is blocked from.

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
curl -X POST "http://localhost/api/search" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"query":"lorem","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9zaWduX3VwIiwiaWF0IjoxNTUzMjgwMTgwLCJuYmYiOjE1NTMyODAxODAsImp0aSI6IldDU1ZZV0ROb1lkbXhwSWkiLCJzdWIiOiJ0Ml8xMDYwIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dLI9n6NQ1EKS5uyzpPoguRPJWJ_NJPKC3o8clofnuQo"}'

```

```javascript
const url = new URL("http://localhost/api/search");

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
            "id": "t3_10",
            "posted_by": "t2_31",
            "apex_id": "t5_10",
            "title": "5yackoudW8",
            "img": null,
            "videolink": null,
            "content": "Architecto nesciunt deleniti ut. Commodi doloremque blanditiis est odio sit quia. Eos sit et sunt in repellat omnis.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        },
        {
            "id": "t3_12",
            "posted_by": "t2_35",
            "apex_id": "t5_9",
            "title": "qYxfPEUHif",
            "img": null,
            "videolink": null,
            "content": "Assumenda iusto sed quae hic ex non rerum. Officia voluptatem minus perferendis distinctio sint qui. Dolorem ut aliquid id illum qui placeat sit.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        }
    ],
    "apexComs": [
        {
            "id": "t5_7",
            "name": "e4GiNXiUN6",
            "avatar": "public\\img\\apx.png",
            "banner": "public\\img\\banner.jpg",
            "rules": "Reprehenderit qui vero eum. Qui et quos est autem culpa perferendis. Vero omnis ea culpa doloremque dolorem.",
            "description": "Maxime quos sit omnis dolore error reprehenderit et. Harum rerum nisi magni. Qui rerum voluptatem dolorem perspiciatis ut et.",
            "created_at": "2019-03-22 16:58:24",
            "updated_at": "2019-03-22 16:58:24"
        }
    ],
    "users": []
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
`POST api/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    query | string |  required  | The query to be searched for (at least 3 characters).
    token | JWT |  required  | Used to verify the user.

<!-- END_9792377865465dfd12bebd73e7326925 -->

<!-- START_f97178f40bfc121782991110d19861b1 -->
## Get Subscribers
Returns a list of the users subscribed to a certain ApexCom to an authorized user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
It first checks the apexcom id, if it wasnot found an error is returned.
Then a check that the authorized user is not blocked from the apexcom, if he was blocked a logical error is returned.
Then, it gets the username and id of the subscribers and returns them.

###Success Cases :
1) Return the result successfully.
###failure Cases:
1) Return empty list if there are no subscribers.
2) ApexComm Fullname (ID) is not found.
3) User blocked from this apexcom.

> Example request:

```bash
curl -X POST "http://localhost/api/get_subscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"Z0mLSYGawvut1QA0","token":"AQ6eI69jFWGkZXZt"}'

```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "Z0mLSYGawvut1QA0",
    "token": "AQ6eI69jFWGkZXZt"
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
{
    "subscribers": [
        {
            "id": "t2_1017",
            "fullname": null,
            "email": "ms16@gmail.com",
            "username": "ms16",
            "avatar": "storage\/avatars\/users\/default.png",
            "karma": 1,
            "notification": 1,
            "type": 3,
            "created_at": "2019-03-23 21:34:24",
            "updated_at": "2019-03-23 21:34:24",
            "userID": "t2_1017"
        }
    ]
}
```

### HTTP Request
`POST api/get_subscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexCom that contains the subscribers.
    token | JWT |  required  | Verifying user ID.

<!-- END_f97178f40bfc121782991110d19861b1 -->

<!-- START_f7828fe70326ce6166fdba9c0c9d80ed -->
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
curl -X GET -G "http://localhost/api/search" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/search");

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
            "id": "t3_10",
            "posted_by": "t2_31",
            "apex_id": "t5_10",
            "title": "5yackoudW8",
            "img": null,
            "videolink": null,
            "content": "Architecto nesciunt deleniti ut. Commodi doloremque blanditiis est odio sit quia. Eos sit et sunt in repellat omnis.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        },
        {
            "id": "t3_12",
            "posted_by": "t2_35",
            "apex_id": "t5_9",
            "title": "qYxfPEUHif",
            "img": null,
            "videolink": null,
            "content": "Assumenda iusto sed quae hic ex non rerum. Officia voluptatem minus perferendis distinctio sint qui. Dolorem ut aliquid id illum qui placeat sit.",
            "locked": 0,
            "created_at": "2019-03-22 16:58:26",
            "updated_at": "2019-03-22 16:58:26"
        }
    ],
    "apexComs": [
        {
            "id": "t5_7",
            "name": "e4GiNXiUN6",
            "avatar": "public\\img\\apx.png",
            "banner": "public\\img\\banner.jpg",
            "rules": "Reprehenderit qui vero eum. Qui et quos est autem culpa perferendis. Vero omnis ea culpa doloremque dolorem.",
            "description": "Maxime quos sit omnis dolore error reprehenderit et. Harum rerum nisi magni. Qui rerum voluptatem dolorem perspiciatis ut et.",
            "created_at": "2019-03-22 16:58:24",
            "updated_at": "2019-03-22 16:58:24"
        }
    ],
    "users": []
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
`GET api/search`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    query |  required  | The query to be searched for (at least 3 characters).

<!-- END_f7828fe70326ce6166fdba9c0c9d80ed -->

<!-- START_09bdc60a87430aec21b4b32b21773baa -->
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
curl -X GET -G "http://localhost/api/sort_posts" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/sort_posts");

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
            "id": "t3_4",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 2
        },
        {
            "id": "t3_1",
            "posted_by": "t2_2",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_2",
            "posted_by": "t2_1",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        },
        {
            "id": "t3_3",
            "posted_by": "t2_4",
            "apex_id": "t5_1",
            "title": "Anything",
            "img": null,
            "videolink": null,
            "content": null,
            "locked": 0,
            "created_at": null,
            "updated_at": null,
            "votes": 0,
            "comments_num": 1
        }
    ],
    "sortingParam": "comments"
}
```
> Example response (404):

```json
{
    "error": "ApexCom is not found."
}
```

### HTTP Request
`GET api/sort_posts`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    apexComID |  optional  | The ID of the ApexComm that contains the posts, default is null.
    sortingParam |  optional  | The sorting parameter, takes a value of [`votes`, `date`, `comments`], default is `date`.

<!-- END_09bdc60a87430aec21b4b32b21773baa -->

<!-- START_b402718e2399a5ffc349d38706b47a9f -->
## Apex Names
Returns a list of the names and ids of all of the existing ApexComs.

###Success Cases :
1. Return the result successfully (status code 200).

###Failure Cases:
1. There is server-side error (status code 500).

> Example request:

```bash
curl -X GET -G "http://localhost/api/Apex_names" \
    -H "Api-Version: 0.1.0"
```

```javascript
const url = new URL("http://localhost/api/Apex_names");

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
[
    [
        {
            "id": "t5_10",
            "name": "comics"
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
            "id": "t5_3",
            "name": "gaming area"
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
            "id": "t5_5",
            "name": "sports area"
        },
        {
            "id": "t5_6",
            "name": "technology"
        }
    ]
]
```

### HTTP Request
`GET api/Apex_names`


<!-- END_b402718e2399a5ffc349d38706b47a9f -->

<!-- START_75042856f5cd6cbf0efd54f67a2e85e8 -->
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
curl -X GET -G "http://localhost/api/get_subscribers" \
    -H "Api-Version: 0.1.0" \
    -H "Content-Type: application/json" \
    -d '{"ApexCommID":"5OIhzj2MWR3gHZ3D"}'

```

```javascript
const url = new URL("http://localhost/api/get_subscribers");

let headers = {
    "Api-Version": "0.1.0",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ApexCommID": "5OIhzj2MWR3gHZ3D"
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
            "fullname": null,
            "email": "ms16@gmail.com",
            "username": "ms16",
            "avatar": "storage\/avatars\/users\/default.png",
            "karma": 1,
            "notification": 1,
            "type": 3,
            "created_at": "2019-03-23 21:34:24",
            "updated_at": "2019-03-23 21:34:24",
            "userID": "t2_1017"
        }
    ]
}
```

### HTTP Request
`GET api/get_subscribers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ApexCommID | string |  required  | The ID of the ApexComm that contains the subscribers.

<!-- END_75042856f5cd6cbf0efd54f67a2e85e8 -->


