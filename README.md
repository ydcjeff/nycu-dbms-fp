# nycu-dbms-fp

1. First populate the database with `init_db.py`. See the python script for more.

2. Make sure PHP 8.x is installed with `pdo_mysql` extension enabled.

3. Run `php -S localhost:3000` to see the web app.

## Directory Structure

- `_data` contains necessary data to populate the DB.

- `controllers` handle the request from browser.

- `models` are ER models.

- `views` are PHP files that generate UI for frontend.

- `db.php` handles DB connection, and DBAPI with PHP.

- `index.php`, `login.php`, `signup.php` are routes.
