# SISGETHT - Sistema de Gestión de Tareas y Horas Trabajadas

## Objetivo

Desarrollar una aplicación web para el registro y seguimiento de horas trabajadas, actividades realizadas y generación de informes.

## Funcionalidades

- [x] Registro de Horas
- [ ] Generación de Informes
- [x] Supervisión del jefe
- [x] Gestión de Tareas por la secretaria

## Tecnologías
- PHP 8.2
- MySQL 5.2.1
- CodeIgniter ^4.0
- Shield (Security) ^1.0
- Bootstrap 5.3.2
- JavaScript Vanilla
- Docker

## Database

### Migrations and Seeders

```bash
php spark migrate
```

```bash
php spark db:seed
```

### Queries

- App\Database\Backup -> sisgetht_db.sql
