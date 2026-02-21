# Project structure overview

This document describes how the Garage Management System codebase is organized so it stays maintainable and easy to navigate.

## Layout at a glance

| Area | Purpose |
|------|--------|
| **Root `*.php`** | Page entry points (one file per main screen). Each loads `config.php`, then sidebar + header + page content + popups. |
| **`config.php`** | Single place for app config, base URL, and shared helpers (`renderHeader()`, `renderFooter()`, `getPageTitle()`, `isActiveMenu()`). |
| **`partials/`** | Reusable layout and widgets: `header.php`, `sidebar.php`, `footer.php`, plus widget partials for dashboard, invoices, job sheets, estimates, etc. |
| **`Popups/`** | Modal content grouped by feature (e.g. `Popups/calendar/`, `Popups/customers/`). Included only by the pages that need them. |
| **`Assets/`** | Static files: `CSS/` (base, layout, components, styles, plus admin/calendar-specific), `JS/` (core, script, plus feature-specific), `img/`. |
| **`docs/`** | Internal documentation (this file, README for popups, etc.). |

## Conventions

- **Page files** use kebab-case when multi-word (e.g. `job-sheets.php`).
- **Includes** are consistent: `require_once 'config.php'`, then `include 'partials/...'` and `include 'Popups/...'`.
- **Popups** are organized by feature to keep related modals together and avoid a single huge “popups” folder.
- **Backup/reference files** (e.g. `calendar_backup.php`) live in the root for now; you can move them to `docs/backups/` or exclude via `.gitignore` (`*_backup.php`) if you prefer.

## Is this “professional”?

Yes. The structure is:

- **Predictable** — Same pattern on every page; new developers can find things quickly.
- **Scalable** — New pages = new root file + optional Popups; new features don’t clutter existing files.
- **Deploy-friendly** — No build step; document root points at the project root and `.htaccess` handles caching and security.

For a PHP app of this size, this is a solid, professional layout. You can push to GitHub as-is; no structural re-arrangement is required.
