<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# About Article

Article is a simple backend application built with laravel. It consist of APIs that performs basic CRUD and some other few functionalities such as search etc.

## Prerequisite for running this application

Below is a list of dependencies that is required for this application to run successfull:

-   **PHP-7 and PHP-Server e.g XAMPP,LAMP,MAMP** which ever serves you best
-   **Docker**
-   **MYSQL.** MYSQL is embeded in the php server
-   **Composer**
-   **Laravel**

## How To Run Article

You can run this project using either of the two steps:

# Step: 1

Run: `docker run -it liztank/article-backend-services:latest`

# Step: 2

1. Clone the project [article]('https://github.com/Liztank/articles.git') to your working directory.
2. Navigate to the project folder
3. Run: `docker up -d` or `docker-compose -f 'docker-compose.yaml' up -d --build`
4. Visit localhost:8181 This should open the laravel default page

## Articles

| Action | Method   | URL                          | Authentication |
| ------ | -------- | ---------------------------- | -------------- |
| List   | `GET`    | `/api/article`               | Not required   |
| Create | `POST`   | `/api/article`               | required       |
| Get    | `GET`    | `/api/articles/{id}`         | Not required   |
| Update | `PUT`    | `/api/articles/{id}`         | required       |
| Delete | `DELETE` | `/api/articles/{id}`         | required       |
| Rate   | `POST`   | `/api/articles/{id}/rating`  | Not required   |
| search | `GET`    | `/api/articles/{searchTerm}` | Not required   |
