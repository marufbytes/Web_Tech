This folder contains three simple MVC example projects for students.

- `simple_todo` - Minimal todo list (list + add) using MVC.
- `product_catalog` - Simple product listing with add form.
- `contact_book` - Small contact manager (list + add).

Each project follows a consistent structure:

- `db.php` : database connection wrapper (now points to the centralized `wt` DB)
- `index.php` : redirects to the login view (lab4 style)
- `controller/` : procedural controller scripts (login/add)
- `model/` : model classes for DB access
- `view/` : HTML/PHP views for display

Database setup (XAMPP / phpMyAdmin)

Follow these steps to import the unified schema using XAMPP's phpMyAdmin (recommended for students):

1. Start XAMPP and make sure **Apache** and **MySQL** are running.
2. Open your browser and go to: `http://localhost/phpmyadmin`.
3. Click the **Databases** tab, enter `wt` as the database name, choose collation `utf8mb4_general_ci`, then click **Create**.
4. Click the newly created `wt` database in the left sidebar, then click the **Import** tab.
5. Click **Choose file**, select the file `mvc-examples/schema.sql` from your workspace, then click **Go** to import. This will create all tables and insert sample rows.

If you prefer the CLI (optional):

```sh
# run from the folder containing schema.sql, or give the full path
mysql -u root < schema.sql
# or if your MySQL user requires a password
mysql -u root -p < schema.sql
```

Notes:
- The `users` table in the `wt` database is used for authentication in all examples. For teaching simplicity the sample rows use plain-text passwords — do not use this in production.
- Examples assume MySQL is `localhost` and user `root` with an empty password. Edit each example's `db.php` if your environment differs.
- Per-example SQL files were removed; run only the single `schema.sql` to set up everything.

After importing, open an example in your browser, e.g. `http://localhost/wt_o/mvc-examples/simple_todo/index.php`.
