# AgriAsset

Version: 1.0.0
Framework: Laravel 12
Language: PHP 8.4
Database: MySQL 8
Frontend: Livewire + Blade + Tailwind CSS
IDE: Visual Studio Code

---

## Project Purpose

AgriAsset is a showcase Laravel application demonstrating a modern asset management system for agricultural operations.

The primary objective is not to build a commercial product, but to demonstrate:

- Laravel best practices
- Clean software architecture
- Object-oriented programming
- Database design
- Secure development
- Maintainable code
- Professional engineering workflow

This project also serves as a learning platform to become proficient in Laravel and PHP while applying existing software engineering experience gained from Node.js and Angular development.

---

## Vision

Agricultural businesses manage thousands of physical assets including:

- Tractors
- Vehicles
- Trailers
- Workshop tools
- GPS equipment
- Tablets
- Laptops
- Pumps
- Irrigation equipment
- Barcode scanners
- Office equipment

AgriAsset provides a central platform to manage these assets throughout their lifecycle.

---

## MVP

Version 1 focuses only on the core business workflow:

- Dashboard
- Assets
- Categories
- Employees
- Asset Assignments
- Maintenance Records
- Reports
- Authentication

Not included in Version 1:

- Notifications
- Mobile application
- QR codes
- AI
- Inventory management

Build the foundation first.

---

## Core Workflow

1. Create Category
2. Create Asset
3. Assign Asset
4. Record Maintenance
5. Return Asset
6. Generate Reports

---

## Technology Stack

- Laravel
- PHP 8.4
- Blade
- Livewire
- Tailwind CSS
- MySQL
- Composer
- VS Code
- Git
- Laravel Artisan

---

## Engineering Principles

- Always favour readability over clever code.
- Follow Laravel conventions whenever possible.
- Keep controllers thin.
- Move business logic into services when complexity grows.
- Validate all user input.
- Never duplicate business logic.
- Prefer Eloquent relationships over manual joins.
- Use dependency injection.
- Keep methods small and focused.
- Build features vertically from database to UI.

---

## Database Philosophy

- Use proper foreign keys.
- Use cascading rules intentionally.
- Use indexes where appropriate.
- Use meaningful column names.
- Avoid nullable fields unless there is a business reason.
- Design for maintainability before optimisation.

---

## User Roles

- Administrator
  - Full access
- Asset Manager
  - Manage assets
  - Assign assets
  - View reports
- Employee
  - View assigned assets

---

## Coding Standards

- PSR-12
- Strict typing where appropriate.
- Descriptive method names.
- Descriptive variable names.
- Never abbreviate business terminology.
- Prefer expressive code over comments.

---

## User Experience

- Simple.
- Fast.
- Minimal.
- Business focused.
- Desktop first.
- Responsive.
- Accessible.

---

## Project Goals

- Learn Laravel deeply.
- Understand Eloquent relationships.
- Understand Laravel routing.
- Understand Controllers.
- Understand Middleware.
- Understand Authentication.
- Understand Validation.
- Understand Migrations.
- Understand Service Container.
- Understand Dependency Injection.
- Understand Testing.

---

## Long Term Roadmap

- Version 1: Core Asset Management
- Version 2: QR Code Tracking
- Version 3: Service Scheduling
- Version 4: Vehicle Maintenance
- Version 5: Document Management
- Version 6: Mobile Companion

---

## What Success Looks Like

A hiring manager should be able to review this project and conclude that the developer can:

- Learn new technologies quickly
- Build maintainable software
- Design relational databases
- Follow framework conventions
- Produce production-quality code
- Solve real business problems

---

## Important Reminder

This project is intentionally built to demonstrate engineering quality rather than feature quantity.

Every feature should be implemented as if it were destined for production.

---

## Learning Rule

Before implementing any feature:

1. Understand how Laravel recommends solving the problem.
2. Implement it using Laravel conventions.
3. Compare the solution with how it would have been implemented in Node.js.
4. Record any lessons learned.

The goal is not simply to finish the application.

The goal is to become a better software engineer by understanding why Laravel is designed the way it is.

---

## Localization (i18n)

AgriAsset must support multiple languages from the beginning.

Primary languages:

- Afrikaans
- English

English will be used as the internal development language.

All code, database objects, variables, classes, methods, comments, commits, and documentation must remain in English.

Only user-facing text should be translated.

Examples include:

- Navigation
- Buttons
- Labels
- Validation messages
- Notifications
- Emails
- Reports

No user-facing strings may be hardcoded directly inside Blade templates or Livewire components.

Always use Laravel's localization system.

Example:

```php
__('assets.create')
```

instead of:

```php
'Create Asset'
```

Translation files should be organised by feature.

Example:

```
lang/
    en/
        assets.php
        employees.php
        maintenance.php
    af/
        assets.php
        employees.php
        maintenance.php
```

The default language should be configurable through the application settings.

Every newly developed feature must include both English and Afrikaans translations before being considered complete.

---

## Development Rule

The database is always English.

Example:

- Table: assets
- Columns:
  - asset_number
  - purchase_date
  - serial_number
  - status

Never create database objects in Afrikaans.

Business terminology may be displayed in Afrikaans through translations only.

---

## Design Rule

- Tailwind CSS is the primary styling framework.
- Lucide is the standard icon library.
- Reuse components before creating new ones.
- Prioritise consistency over decoration.
- Build responsive interfaces by default.
- Every page should be clean, fast, and intuitive.

---
