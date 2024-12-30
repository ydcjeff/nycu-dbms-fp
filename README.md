# nycu-dbms-fp

1. Copy `.env.example` to `.env` and configure your DB parameters.

2. Run `init_db.py` to populate the database.

3. Make sure PHP 8.x is installed with `pdo_mysql` extension enabled.

4. Run `php -S localhost:3000` to see the web app.

## Directory Structure

- `_data` contains necessary data to populate the DB.

- `controllers` handle the request from browser.

- `views` are PHP files that generate UI for frontend.

- `db.php` handles DB connection, and DBAPI with PHP.

- `index.php`, `login.php`, `signup.php` are routes.
