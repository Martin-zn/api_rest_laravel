# API Laravel con Autenticación JWT

Este proyecto es una API RESTful construida con Laravel que incluye autenticación mediante JWT, manejo de CORS y configuraciones seguras para su despliegue en producción.

---

## Características principales

- **CRUD de Proveedores**: Operaciones para manejar proveedores.
- **Autenticación JWT**: Protege las rutas de la API con tokens JWT.
- **Manejo de CORS**: Configurado para permitir o restringir dominios según necesidad.
- **Variables de Entorno**: Uso de `.env` para configuraciones sensibles.
- **Seguridad**: Configuraciones optimizadas para producción.

---

## Requisitos previos

- PHP >= 8.0
- Composer
- Servidor de base de datos MySQL
- Node.js y npm (opcional, para herramientas como frontends integrados)

---

## Instalación

Sigue los pasos para instalar el proyecto localmente:

1. **Clonar el repositorio**:

2. **Instalar dependencias de PHP**:
   ```bash
   composer install
   ```

3. **Configurar el archivo `.env`**:
   - Copia el archivo `.env.example` a `.env`:
     ```bash
     cp .env.example .env
     ```
   - Edita el archivo `.env` con los valores correspondientes:
     ```env
     APP_NAME=API-Laravel
     APP_ENV=local
     APP_KEY=
     APP_DEBUG=true
     APP_URL=http://localhost

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=tu_base_de_datos
     DB_USERNAME=tu_usuario
     DB_PASSWORD=tu_contraseña

     JWT_SECRET=clave_secreta_jwt
     ```
   - Genera la clave de aplicación:
     ```bash
     php artisan key:generate
     ```
   - Genera la clave JWT:
     ```bash
     php artisan jwt:secret
     ```

4. **Ejecutar migraciones**:
   ```bash
   php artisan migrate
   ```

5. **Levantar el servidor local**:
   ```bash
   php artisan serve
   ```
   Accede a la API en `http://localhost:8000`.

---

## Rutas principales

### Autenticación

| Método | Ruta             | Descripción                  |
|--------|------------------|------------------------------|
| POST   | `/auth/register` | Registrar un nuevo usuario. |
| POST   | `/auth/login`    | Iniciar sesión.             |
| POST   | `/auth/logout`   | Cerrar sesión.             |
| POST   | `/auth/refresh`  | Refrescar el token JWT.     |
| GET    | `/auth/me`       | Obtener el usuario actual.  |

### CRUD de Proveedores (Rutas protegidas)

| Método | Ruta                  | Descripción                       |
|--------|-----------------------|-----------------------------------|
| GET    | `/api/proveedores`    | Listar todos los proveedores.    |
| POST   | `/api/proveedores`    | Crear un nuevo proveedor.        |
| GET    | `/api/proveedores/{id}` | Mostrar un proveedor por ID.    |
| PUT    | `/api/proveedores/{id}` | Actualizar un proveedor.        |
| DELETE | `/api/proveedores/{id}` | Eliminar un proveedor.          |

---

## Configuración de CORS

El manejo de CORS está configurado en `config/cors.php`. Por defecto, permite todas las solicitudes a rutas bajo el prefijo `api/`.

Si deseas restringir los dominios permitidos, edita el archivo:

```php
'allowed_origins' => ['https://mi-frontend.com'],
'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
'allowed_headers' => ['Content-Type', 'Authorization'],
```

---

## Seguridad en Producción

1. **Configurar el archivo `.env`**:
   - Establecer `APP_ENV=production` y `APP_DEBUG=false`.

2. **Usar HTTPS**:
   - Asegúrate de que tu API esté protegida con un certificado SSL.

3. **Proteger las claves sensibles**:
   - Nunca subas el archivo `.env` al repositorio.
   - Usa servicios como AWS Secrets Manager o variables de entorno del servidor.

4. **Limitar las solicitudes**:
   - Configura limitación de tasa (Rate Limiting) en `routes/api.php`:
     ```php
     Route::middleware('throttle:60,1')->group(function () {
         Route::apiResource('proveedores', ProveedorController::class);
     });
     ```

5. **Restringir CORS**:
   - Configura `allowed_origins` en `config/cors.php` para permitir solo dominios confiables.

---

## Pruebas

1. **Postman o Insomnia**:
   - Importa las rutas y realiza pruebas de cada endpoint.

2. **Solicitudes desde el navegador**:
   - Asegúrate de que no haya errores relacionados con CORS al consumir la API desde tu frontend.

3. **Logs**:
   - Revisa los errores en `storage/logs/laravel.log` si algo no funciona.

---

## Tecnologías utilizadas

- Laravel 10
- JWT-auth
- MySQL
- Postman (para pruebas de API)

---

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Puedes usarlo, modificarlo y distribuirlo libremente.

