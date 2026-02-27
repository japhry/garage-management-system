# Coding Standards

Brief conventions used in this project to keep code consistent and maintainable.

## PHP

- **Config:** All pages use `require_once 'config.php'` from the project root (include path is the script that runs).
- **Output:** Use the `e()` helper for any value output in HTML (e.g. `<?php echo e($var); ?>`) to prevent XSS.
- **Closing tag:** Omit `?>` at the end of PHP-only files (e.g. `config.php`) to avoid accidental whitespace.
- **Page structure:** `require_once 'config.php'` → `renderHeader()` → `include 'partials/sidebar.php'` → main content → `renderFooter()`.

## JavaScript

- **Indentation:** 2 spaces.
- **Semicolons:** Use them at the end of statements.
- **DOMContentLoaded:** Use for initialisation that depends on the DOM.

## CSS

- **Variables:** Prefer `var(--variable)` from `base.css` (e.g. `--white`, `--accent-solid`, `--gray-100`, `--spacing-*`, `--radius-*`, `--shadow-*`, `--transition-*`) instead of hardcoded colors or units where possible.
- **Dark mode:** Use the same variables so `[data-theme="dark"]` overrides in `base.css` apply.

## File naming

- **Pages:** `kebab-case.php` for multi-word names (e.g. `job-sheets.php`).
- **Partials:** `partials/` for layout and widgets; `Popups/<feature>/` for modals.
