# TOTS – Event Reservation Backend

Backend API para la aplicación de reserva de espacios para eventos.  
Este proyecto forma parte del desafío técnico Full Stack Developer de TOTS.

La API permite:
- Autenticación de usuarios mediante JWT
- Gestión de espacios (solo administradores)
- Gestión de reservas por usuario
- Validación de solapamiento de horarios
- Protección de rutas y control de permisos

---

## 🚀 Tecnologías utilizadas

- PHP ^8.2
- Laravel ^10
- MySQL / MariaDB
- JWT Authentication (tymon/jwt-auth)
- PHPUnit (Testing)
- Swagger (documentación – mejora planificada)

---

## 📦 Instalación del proyecto

### 1. Clonar el repositorio
```bash
git clone https://github.com/eacunamelo/tots-event-reservation-backend.git
cd tots-event-reservation-backend
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar el entorno
```bash
cp .env.example .env
php artisan key:generate
```

Configurar las credenciales de la base de datos en el archivo `.env`.

---

## 🔐 Autenticación JWT

Generar la clave JWT necesaria para la autenticación:
```bash
php artisan jwt:secret
```

---

## 🗄️ Base de datos

Ejecutar migraciones y seeders:
```bash
php artisan migrate:fresh --seed
```

Los seeders crean usuarios y datos de prueba necesarios para el funcionamiento del sistema.

---

## 👤 Usuarios de prueba

| Rol   | Email          | Password  |
|------|----------------|-----------|
| Admin | admin@tots.com | admin123  |
| User  | user@tots.com  | user123   |

---

## ▶️ Ejecutar el servidor

```bash
php artisan serve
```

La API estará disponible en:
```
http://localhost:8000
```

---

## 🧪 Tests

Para ejecutar la suite de pruebas:
```bash
php artisan test
```

Los tests cubren:
- Autenticación de usuarios
- Creación y gestión de reservas
- Validación de permisos y acceso

---

## 📚 Endpoints principales

### 🔑 Autenticación
- POST /api/auth/register
- POST /api/auth/login

### 🏢 Espacios (solo administradores)
- GET /api/spaces
- POST /api/spaces
- PUT /api/spaces/{id}
- DELETE /api/spaces/{id}

### 📅 Reservas (usuario autenticado)
- GET /api/reservations
- POST /api/reservations
- PUT /api/reservations/{id}
- DELETE /api/reservations/{id}

---

## 🔒 Seguridad y control de acceso

- Todas las rutas están protegidas mediante JWT
- Los usuarios solo pueden ver y modificar sus propias reservas
- El CRUD de espacios está restringido a usuarios con rol `admin`

---

## 🗂️ Almacenamiento de imágenes

Actualmente el sistema utiliza almacenamiento local (`storage/public`) para las imágenes de los espacios.  
Esta decisión se tomó para simplificar la configuración local.

En un entorno productivo o serverless, este almacenamiento puede migrarse fácilmente a servicios como Amazon S3 u otros compatibles con Laravel Filesystem.

---

## 📝 Notas finales

- La validación de solapamiento de reservas se realiza a nivel backend.
- La arquitectura prioriza claridad y separación de responsabilidades.
- Swagger será incorporado como mejora adicional para documentación interactiva de la API.

## 📚 API Documentation (Swagger)

Swagger fue implementado durante el desarrollo para documentar los endpoints.
Sin embargo, se detectó un problema de compatibilidad entre:

- Laravel 10.x
- PHP 8.2
- L5-Swagger 8.6.x (Windows environment)

El error corresponde a un bug conocido relacionado con la clave `proxy`
en el paquete `darkaonline/l5-swagger`, que ocurre antes del bootstrap
de la aplicación y no puede ser mitigado desde configuración o providers.

📌 **Decisión técnica**  
Para no comprometer la estabilidad de la aplicación, Swagger fue retirado
del runtime final, manteniendo la documentación de endpoints en este README.

La API puede ser probada completamente vía Postman o cualquier cliente HTTP.
