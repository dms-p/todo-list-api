
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

#### Get all Todo

```http
  GET /api/todo
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get detail Todo

```http
  GET /api/todo/${slug}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get detail Todo

```http
  GET /api/todo/${slug}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get detail Todo

```http
  GET /api/todo/${slug}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |


