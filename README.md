# FFI Testing

Prepare the Docker with:

```bash
docker compose build builder
docker compose up builder
```

This will build the container, copy the files, and compile the C library.

You can also run `php main.php` from within the container too.

```php
docker compose exec builder bash
php main.php
```

Or

```php
docker compose exec builder php /source/main.php
```
