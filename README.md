<div align="center">

# 🚗 Garage Management System

**A modern, full-featured garage & workshop management platform for automotive repair shops and service centers.**

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-blue?style=flat-square)](./README.md)

*Dashboard • Estimates • Job Sheets • Invoices • Customers • Vehicles • Stock • Calendar*

</div>

---

## 📸 Screenshots

| | | |
|:-------------------------:|:-------------------------:|:-------------------------:|
| ![Dashboard](Assets/img/01.png) | ![Calendar](Assets/img/02.png) | ![Estimates](Assets/img/03.png) |
| **Dashboard** | **Calendar** | **Estimates** |
| ![Job Sheets / Invoices](Assets/img/04.png) | ![Customers & Vehicles](Assets/img/05.png) | |
| **Job Sheets & Invoices** | **Customers & Vehicles** | |

---

## ✨ Features

- **Dashboard** — Real-time stats, recent customers, and quick actions  
- **Calendar** — Appointments, documents, and scheduling  
- **Estimates** — Create and manage repair estimates  
- **Job Sheets** — Work orders and job tracking  
- **Invoices** — Billing, unpaid tracking, and archives  
- **Customers** — CRM with search and filtering  
- **Vehicles** — Vehicle registry and service history  
- **Suppliers & Stock** — Inventory and supplier management  
- **Reminders** — Follow-ups and notifications  
- **Admin** — System and user management  

**UI/UX:** Responsive layout, clean components, optional dark mode, and print/export support.

---

## 🛠 Tech Stack

- **Backend:** PHP  
- **Frontend:** HTML, CSS, JavaScript  
- **Assets:** Font Awesome, modular CSS (base, layout, components, styles)  
- **Structure:** PHP includes, config-driven titles and navigation  

---

## 📁 Project Structure

The repo uses a **clear, include-based layout**: page entry points in the root, shared layout in `partials/`, feature modals in `Popups/` (grouped by area), and static assets in `Assets/`. No framework lock-in—just PHP, CSS, and JS that are easy to deploy and navigate.

```
├── Assets/
│   ├── CSS/          # base, layout, components, styles, admin, calendar
│   ├── JS/           # core, script, admin, calendar, database
│   └── img/          # screenshots (01–05) and other assets
├── partials/         # layout: header, sidebar, footer + reusable widgets
├── Popups/           # modals by feature (calendar, customers, estimates, invoices, job-sheets, stock, suppliers, admin)
├── docs/             # internal docs (README, popup structure)
├── config.php        # app config, base URL, header/footer helpers
├── index.php         # dashboard
├── calendar.php      # calendar & scheduling
├── estimates.php     # estimates
├── job-sheets.php    # job sheets
├── invoices.php      # invoices
├── unpaid.php        # unpaid tracking
├── archives.php      # archives
├── customers.php     # customers
├── vehicles.php      # vehicles
├── suppliers.php     # suppliers
├── stock.php         # stock
├── reminders.php     # reminders
├── admin.php         # admin
├── signout.php       # sign out
├── calendar_backup.php   # reference backup (optional; can exclude via .gitignore)
└── .htaccess         # Apache: compression, cache, security headers
```

---

## 🚀 Getting Started

1. **Requirements:** PHP 7.4+ and a web server (Apache with mod_rewrite, or PHP built-in server).
2. **Clone the repo** (see [Push to GitHub](#-push-to-github) below).
3. **Point your document root** to this folder (or run `php -S localhost:8000` for quick testing).
4. **Open** `index.php` in the browser (e.g. `http://localhost:8000/`).

No database is required for the current UI; add `.env` and config as needed for future backend integration (see [Credentials](#-keeping-credentials-safe)).

---

## 📤 Push to GitHub

Use these steps to push this project to your existing repo **without committing credentials**.

### 1. Initialize Git (if not already)

```bash
cd "c:\Users\Japhry\Herd\Garage-mrc"
git init
```

### 2. Add the remote

```bash
git remote add origin https://github.com/japhry/garage-management-system.git
```

### 3. Stage and commit (`.gitignore` already excludes `.env` and sensitive files)

```bash
git add .
git status   # Double-check: no .env or config with secrets listed
git commit -m "Initial commit: Garage Management System"
```

### 4. Push to GitHub

**Option A — HTTPS (GitHub will prompt for credentials):**

```bash
git branch -M main
git push -u origin main
```

When prompted:
- **Username:** your GitHub username  
- **Password:** use a **Personal Access Token (PAT)**, not your account password.  
  Create one: [GitHub → Settings → Developer settings → Personal access tokens](https://github.com/settings/tokens).

**Option B — SSH (recommended once set up):**

```bash
git remote set-url origin git@github.com:japhry/garage-management-system.git
git push -u origin main
```

### 5. Keep credentials safe

- **Never commit** `.env`, `config.local.php`, or any file containing passwords, API keys, or secrets.  
- This repo’s **`.gitignore`** already excludes `.env`, `*.env`, and common credential file names.  
- If you later add database or API config, keep secrets in `.env` and add `config.example.php` (without real values) for other developers.

---

## 📫 Connect

| | |
|:---|:---|
| 🌍 **Portfolio** | [https://pixellinx.co.tz](https://pixellinx.co.tz) |
| 📧 **Email** | [info@pixellinx.co.tz](mailto:info@pixellinx.co.tz) |

---

<div align="center">

**Garage Management System** — *Built for workshops that mean business.*

</div>
