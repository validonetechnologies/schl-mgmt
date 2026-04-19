# PRODUCTION SECURITY CHECKLIST - SchlMgmt SaaS

## 🛡️ Server Hardening
- [ ] **Disable Directory Listing:** Done via `Options -Indexes` in .htaccess.
- [ ] **Protect Configs:** Core, Config, and App directories are blocked from direct web access.
- [ ] **PHP Security:** Set `display_errors = Off` and `log_errors = On` in php.ini.
- [ ] **Permissions:** 
    - `storage/uploads` and `storage/logs` should be writable by the web server (chmod 775).
    - All other files should be read-only for the web server.

## 🔐 Application Security
- [ ] **Input Validation:** All user inputs are handled via PDO prepared statements to prevent SQL Injection.
- [ ] **XSS Prevention:** All output variables are wrapped in `htmlspecialchars()` to prevent cross-site scripting.
- [ ] **Password Safety:** Using `password_hash()` with BCRYPT for all users.
- [ ] **Tenant Isolation:** Every database query is strictly filtered by `school_id`.
- [ ] **RBAC:** Middleware prevents unauthorized users from accessing admin-level endpoints.

## 🚀 Deployment Steps
1. **Database:** Run `schema.sql` on the production MySQL server.
2. **Configuration:** Update `config/database.php` with production credentials.
3. **Dependencies:** Ensure `pdo_mysql` and `mbstring` extensions are enabled in PHP.
4. **SSL:** Install an SSL certificate (Let's Encrypt) for `schl-mgmt.voapps.win`.
5. **Storage:** Create the `storage/uploads` and `storage/logs` directories.
