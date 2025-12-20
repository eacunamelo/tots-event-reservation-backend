# Event Reservation API

Backend API para la gestión de reservas de espacios, desarrollada como parte del challenge técnico para la posición **Full Stack Developer**.

El sistema permite:
- Registro y login de usuarios
- Autenticación mediante JWT
- Creación y gestión de reservas asociadas a usuarios y espacios
- Ejecución de tests automatizados

---

## 🧠 Decisiones técnicas relevantes

- **Laravel 10**
- **Autenticación JWT** usando `tymon/jwt-auth`
- **MySQL** como base de datos
- **Feature & Unit Tests** con PHPUnit
- Uso de **Factories** para datos de prueba
- Normalización de fechas usando **Carbon** para compatibilidad con MySQL
- Arquitectura simple y clara, priorizando legibilidad y compatibilidad con tests

> Para los Feature Tests se utiliza el guard `auth` estándar para compatibilidad con `actingAs()`. JWT permanece activo para entornos productivos.

---

## ⚙️ Requisitos

- PHP >= 8.2
- Composer
- MySQL
- Node.js (opcional, solo si se desea extender)

---

## 🚀 Instalación

```bash
git clone https://github.com/eacunamelo/event-reservation-backend.git
cd event-reservation-backend
composer install
