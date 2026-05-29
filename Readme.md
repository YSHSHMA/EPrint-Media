# EPrint Media

EPrint-Media is a digital publishing and media management platform designed to streamline content handling, publication workflows, and efficient media organization.

---

## Tech Stack

* PHP / Laravel
* MySQL
* Docker
* Docker Compose
* Nginx
* Composer

---

## Prerequisites

Before running this project, make sure you have installed:

* Docker
* Docker Compose
* Git

Check installation:

```bash
docker --version
docker compose version
git --version
```

---

## Clone Repository

Clone the project:

```bash
git clone: https://github.com/YSHSHMA/EPrint-Media.git
cd EPrint
```

---

## Environment Setup

Copy environment file:

```bash
cp .env.example .env
```

Update database configuration in `.env` if required:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=news
DB_USERNAME=root
DB_PASSWORD=root
```

---

## Build Docker Containers

Build the Docker images:

```bash
docker compose build
```

Build without cache:

```bash
docker compose build --no-cache
```

---

## Start Containers

Run containers in detached mode:

```bash
docker compose up -d
```

Run with logs:

```bash
docker compose up
```

Check running containers:

```bash
docker ps
```

---

## Stop Containers

Stop containers:

```bash
docker compose down
```

Stop and remove volumes:

```bash
docker compose down -v
```

Restart containers:

```bash
docker compose restart
```

---

## Access PHP Container

Enter application container:

```bash
docker compose exec app sh
```

or

```bash
docker exec -it <app-container-name> sh
```

---

## Install PHP Dependencies

Inside PHP container:

```bash
composer install
```

If vendor issues occur:

```bash
rm -rf vendor composer.lock
composer install
```

Generate optimized autoload:

```bash
composer dump-autoload
```

---

## Laravel Setup

Generate application key:

```bash
php artisan key:generate
```

Clear Laravel caches:

```bash
php artisan optimize:clear
```

Additional cache commands:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## MySQL Setup

Access MySQL container:

```bash
docker compose exec mysql sh
```

Login to MySQL:

```bash
mysql -uroot -proot
```

Create database:

```sql
CREATE DATABASE news;
SHOW DATABASES;
EXIT;
```

Import SQL file:

```bash
mysql -uroot -proot news < /news.sql
```

Verify tables:

```bash
mysql -uroot -proot -e "USE news; SHOW TABLES;"
```

---

## Run Database Migrations

Inside PHP container:

Run migrations:

```bash
php artisan migrate
```

Check migration status:

```bash
php artisan migrate:status
```

Fresh migration (development only):

```bash
php artisan migrate:fresh
```

Fresh migration with seeder:

```bash
php artisan migrate:fresh --seed
```

---

## Application Access

Once containers are running, open:

```text
http://localhost
```

or configured Nginx port.

---

## View Logs

View all logs:

```bash
docker compose logs
```

View application logs:

```bash
docker compose logs app
```

View MySQL logs:

```bash
docker compose logs mysql
```

Follow logs live:

```bash
docker compose logs -f
```

---

## Troubleshooting

### MySQL Connection Refused

Check MySQL container:

```bash
docker ps
```

Verify `.env`:

```env
DB_HOST=mysql
```

Clear config:

```bash
php artisan config:clear
```

---

### Composer / Vendor Issues

If missing package errors appear:

```bash
rm -rf vendor
composer install
composer dump-autoload
```

---

### Permission Issues

Fix permissions:

```bash
chown -R www-data:www-data /var/www
chmod -R 775 /var/www
```

Git safe directory:

```bash
git config --global --add safe.directory /var/www
```

---

## Useful Commands

Enter container:

```bash
docker exec -it <container> sh
```

Rebuild and restart:

```bash
docker compose down
docker compose build --no-cache
docker compose up -d
```

Check containers:

```bash
docker ps
```

---

## Contributing

Contributions, issues, and feature requests are welcome.

---

## Owner

© Yash Sharma. All Rights Reserved. For support, questions, or issue reporting, feel free to email: 06yashsharma@gmail.com
