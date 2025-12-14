Purpose
This file gives AI coding agents the minimal, actionable knowledge to work productively in this CodeIgniter-based PHP web app.

Quick facts
- Framework: CodeIgniter 3 (application/ follows CI3 MVC)
- PHP: legacy-compatible (composer.json lists php >=5.3.7; readme recommends 5.6+)
- App root served from: `http://localhost/supcharoen-services.com/` by default (see application/config/config.php)

Big picture
- Monolithic MVC: controllers in `application/controllers/`, models in `application/models/`, views in `application/views/`.
- Many controllers load several models and enforce session-based auth in the constructor (example: `application/controllers/Insurance_car.php` redirects if `user_id` session is missing).
- Database access is primarily raw SQL via `$this->db->query(...)` in models (search for `->query(`). Be cautious about SQL injection and prefer parameterized queries when changing DB code.

Key patterns & conventions
- Filenames: models typically end with `_model.php` (e.g., `Insurance_model.php`) and are loaded with `$this->load->model('insurance_model')`.
- Views are loaded by name: `$this->load->view('insurance_billing', $data)` — view files live in `application/views/`.
- Date handling: project uses model helper functions like `translateDateToThai()` / `translateDateToEng()` in `Insurance_model.php` — reuse these for consistent date formats.
- File uploads: controllers use CI `upload` and `image_lib` libraries and store images under `uploadfile/insurance_images/`.
- Session & auth: controllers check `$this->session->userdata('user_id')` — tests and patches should respect this flow.

Developer workflows
- Local dev: app is served under XAMPP (htdocs). Update `application/config/config.php` `base_url` to match local host if needed.
- DB: SQL backups are in `backups/` and `data-sql/`. To restore, import the SQL into local MySQL used by XAMPP.
- Composer: present, but `composer_autoload` is `FALSE` in `config.php`. If adding composer packages, enable autoload and run `composer install` in project root.
- Logging: `application/config/config.php` controls logging via `log_threshold` (currently `0`); enable for debugging.

Safety & maintainability notes
- Many model methods construct SQL strings directly (e.g., `Insurance_model.php`) — when modifying, convert to CI query bindings or query builder to avoid injection.
- Large controller methods (see `Insurance_car.php`) mix business logic, file I/O, and view rendering. Prefer moving heavy logic to models or service classes when refactoring.

Useful files to inspect for context
- `application/controllers/Insurance_car.php` — complex controller with auth, uploads, and many AJAX endpoints.
- `application/models/Insurance_model.php` — large model containing domain logic (date translation, payments, SQL queries).
- `application/config/config.php` — base_url, session, logging, and other runtime flags.
- `backups/` and `data-sql/` — SQL dumps useful to recreate the DB schema/data locally.

How to make common changes (examples)
- Add a new API endpoint: create method in controller, call a model method, return JSON via `echo json_encode($result)` (pattern used across controllers).
- Add a migration-safe DB change: create ALTER statements and test against a restored `backups/` SQL locally.
- Fix date logic: reuse `translateDateToThai()` / `translateDateToEng()` to maintain Thai Buddhist year behavior.

When to ask the human
- If a change requires DB schema alteration, confirm with the maintainer before updating production data.
- If authentication flow is unclear for an endpoint, request a sample user session or reproduction steps.

Contact the repo owner for sensitive decisions (DB schema, deployment, third-party credentials).

End
