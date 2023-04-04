
# HELLOCSE - Technical Test

Here the backend of the app made with Laravel for my application for HelloCSE. 





## Deployment

First of all install the project

```bash
  git clone https://github.com/HelloCSE-Test-Technique/Back.git
  cd Back
```

Install dependencies

```bash
  composer install
```

Run server and API (Port 8000 by default)

```bash
  php artisan serve
```

By default, the link for the API will be :

```bash
  localhost:8000/api
```
## API Reference

#### GET all stars

```http
  GET /api/stars
```


#### GET star

```http
  GET /api/stars/${id}
```

| Parameter          | Type     | Description                       |
| :--------          | :------- | :-------------------------------- |
| `id`               | `string` | **Required**. Id of item to fetch |
| `lastname`         | `string` | **Required**. Id of item to fetch |
| `firstname`        | `string` | **Required**. Id of item to fetch |
| `description`      | `string` | **Required**. Id of item to fetch |

#### POST item

```http
  POST /api/stars/${id}
```

#### PUT item

```http
  PUT /api/stars/${id}
```

#### DELETE item

```http
  DELETE /api/stars/${id}
```

## Authors

- [@jeinero](https://github.com/jeinero) - Student at Lyon Ynov Campus

