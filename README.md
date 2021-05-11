# Todo List using Laravel 

## How install
```shell
git clone https://github.com/MamdouhKhaled/Laravel-Todo.git
composer install
php artisan key:generate
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
PUT http://127.0.0.1:8000/api/v1/todos/1
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
{
  "title": "Update Topic",
  "status": "3",
  "description": "Numquam nulla cumque nihil ex natus",
  "user_id": 2
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
GET http://127.0.0.1:8000/api/v1/todos
Request Headers
Accept application/json
Authorization Bearer {AccessToken}
```
Res
```json
{
  "todos": [
    {
      "id": 1,
      "title": "Update Topic",
      "status": "3",
      "description": "Numquam nulla cumque nihil ex natus",
      "user_id": 2,
      "created_at": "2021-05-07T07:53:58.000000Z",
      "updated_at": "2021-05-08T20:31:28.000000Z"
    },
    {
      "id": 2,
      "title": "Test Test Test Test Test Test",
      "status": "1",
      "description": null,
      "user_id": 2,
      "created_at": "2021-05-08T18:17:19.000000Z",
      "updated_at": "2021-05-08T18:17:19.000000Z"
    }
  ]
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
