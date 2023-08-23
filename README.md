
# TODO List API

A brief description of what this project does and who it's for


## Tech Stack



**Server:** [Laravel V.10](https://laravel.com/)

**Package:** [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum)

## Installation

download or clone this repository

```bash
  git clone https://github.com/dms-p/todo-list-api.git
```

Setup .env Database

```bash
  DB_DATABASE=todoApp
  DB_USERNAME=root
  DB_PASSWORD=
```

Jalankan Migration

```bash
  php artisan migrate
```

Jalankan Aplikasi

```bash
  php artisan serve
```
    
## API Reference

### Access API
**Required**. Your API key

#### Get all Todo

```http
  GET /api/todo
```

#### Get detail Todo

```http
  GET /api/todo/${slug}
```

#### Create Todo

```http
  POST /api/todo
```

|    key    | Type     | Description                |
| :-------- | :------- | :------------------------- |
|  `title`        | `string` |  Masukan Title Todo        |
|  `description`  | `text`   |  Masukan description Todo        |
|  `status`       | `enum`   |  Masukan Status Todo        |

#### Update Todo

```http
  POST /api/todo/${slug}
```


|    key    | Type     | Description                |
| :-------- | :------- | :------------------------- |
|  `title`        | `string` |  Masukan Title Todo        |
|  `description`  | `text`   |  Masukan description Todo        |
|  `status`       | `enum`   |  Masukan Status Todo        |
| `_method`    | `string`    | Masukan Value PATCH/PUT    |


#### Delete Todo

```http
  DELETE /api/todo/${slug}
```
