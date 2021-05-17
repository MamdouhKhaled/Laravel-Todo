# Todo List using Laravel 

## How install
```shell
git clone https://github.com/MamdouhKhaled/Laravel-Todo.git
composer install
php artisan key:generate
php artisan passport:install
```

## API Resourse
#### Get Single Todo
```
GET http://127.0.0.1:8000/api/v1/todos/1
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
```
Response
```json
{
    "data": {
        "id": 1,
        "title": "Update Topic",
        "status": "3",
        "description": "Numquam nulla cumque nihil ex natus",
        "user_id": 2,
        "created_at": "2021-05-07T07:53:58.000000Z",
        "updated_at": "2021-05-08T20:31:28.000000Z"
    }
}
```

#### Update Single Todo
```
POST http://127.0.0.1:8000/api/v1/todos/1
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
{
  "title": "Update Topic",
  "status": "3",
  "description": "Numquam nulla cumque nihil ex natus",
  "_method":PUT
}
```
Response
```json
{
    "data": {
        "id": 1,
        "title": "Update Topic",
        "status": "3",
        "description": "Numquam nulla cumque nihil ex natus",
        "user_id": 2,
        "created_at": "2021-05-07T07:53:58.000000Z",
        "updated_at": "2021-05-08T20:31:28.000000Z"
    }
}
```

#### Get All Todo
```
GET http://127.0.0.1:8000/api/v1/todos?page=1 
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
```
Response
```json
{
    "current_page": 2,
    "data": [
        {
            "id": 94,
            "title": "Prof. Sedrick Kulas",
            "status": "1",
            "description": "Repudiandae et sint illum ad officia et. Cum error vitae voluptatem fugiat quos. Sit et omnis ut eaque.",
            "user_id": 1,
            "created_at": "2021-05-17T19:11:15.000000Z",
            "updated_at": "2021-05-17T19:11:15.000000Z"
        },
        {
            "id": 98,
            "title": "Mr. Graham Doyle",
            "status": "3",
            "description": "Eligendi consequatur est in. Debitis distinctio omnis molestiae culpa eius. Commodi aut maxime voluptas quisquam. Quis consequatur laboriosam reiciendis corrupti molestiae et.",
            "user_id": 1,
            "created_at": "2021-05-17T19:11:15.000000Z",
            "updated_at": "2021-05-17T19:11:15.000000Z"
        },
        {
            "id": 101,
            "title": "Update Post",
            "status": "3",
            "description": "Numquam nulla cumque nihil ex natus",
            "user_id": 1,
            "created_at": "2021-05-17T20:37:45.000000Z",
            "updated_at": "2021-05-17T21:11:35.000000Z"
        },
        {
            "id": 102,
            "title": "Mamdouh Khaledasdhaskdj 2",
            "status": "1",
            "description": null,
            "user_id": 1,
            "created_at": "2021-05-17T20:55:34.000000Z",
            "updated_at": "2021-05-17T20:55:34.000000Z"
        }
    ],
    "first_page_url": "http://127.0.0.1:8000/api/v1/todos?page=1",
    "from": 21,
    "last_page": 2,
    "last_page_url": "http://127.0.0.1:8000/api/v1/todos?page=2",
    "links": [
        {
            "url": "http://127.0.0.1:8000/api/v1/todos?page=1",
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://127.0.0.1:8000/api/v1/todos?page=1",
            "label": "1",
            "active": false
        },
        {
            "url": "http://127.0.0.1:8000/api/v1/todos?page=2",
            "label": "2",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://127.0.0.1:8000/api/v1/todos",
    "per_page": 20,
    "prev_page_url": "http://127.0.0.1:8000/api/v1/todos?page=1",
    "to": 24,
    "total": 24
}
```
#### Add Todo
```
POST http://127.0.0.1:8000/api/v1/todos
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
{
  "title": "test",
  "description": "My description",
  "user_id": 1
}
```
Response
```json
{
    "data": {
        "id": 1,
        "title": "Update Topic",
        "status": "3",
        "description": "Numquam nulla cumque nihil ex natus",
        "user_id": 2,
        "created_at": "2021-05-07T07:53:58.000000Z",
        "updated_at": "2021-05-08T20:31:28.000000Z"
    }
}
```
#### Delete Todo
```
DELETE http://127.0.0.1:8000/api/v1/todos/1
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
```
### Login & Register
#### Register
```
POST http://127.0.0.1:8000/api/v1/register
** Request Headers
Accept application/json
{
    name: 'Mamdouh Khaled',
    email: 'Mamdouh.khaled@live.com',
    password: '',
    password_confirmation: '' 
}
```
Response
```json
{
    "status": "success",
    "data": {
        "name": "Mamdouh Khaled",
        "token": "{Access Token}"
    }
}
```
#### Login
```
POST http://127.0.0.1:8000/api/v1/login
** Request Headers
Accept application/json
{
    email: 'Mamdouh.khaled@live.com',
    password: '',
}
```
Response
```json
{
    "status": "success",
    "data": {
        "name": "Mamdouh Khaled",
        "token": "{Access Token}"
    }
}
```
