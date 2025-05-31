# Guía de Configuración del Proyecto Laravel

Esta guía te ayudará a configurar y desplegar el proyecto Laravel desde cero.

## Requisitos Previos

- PHP 8.1 o superior
- Composer
- Node.js y NPM
- Servidor de base de datos (MySQL/MariaDB)
- Servidor web (Apache/Nginx) o PHP Built-in Server

## 1. Clonar el Repositorio

```bash
git clone [URL_DEL_REPOSITORIO]
cd sisogrsu
```

## 2. Instalar Dependencias de PHP

```bash
composer install
```

## 3. Configurar el Entorno

1. Copiar el archivo de entorno de ejemplo:
   ```bash
   cp .env.example .env
   ```

2. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

3. Configurar el archivo `.env` con los datos de tu entorno:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_base_de_datos
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

## 4. Configurar la Base de Datos

1. Crear una base de datos MySQL con el nombre especificado en el archivo `.env`
2. Ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```

## 5. Ejecutar los Seeders

Para poblar la base de datos con datos de prueba:

```bash
php artisan db:seed
```

Esto creará los siguientes usuarios de prueba:
- **Admin User**
  - Email: admin@example.com
  - Contraseña: password

- **Regular User 1**
  - Email: user1@example.com
  - Contraseña: password

- **Regular User 2**
  - Email: user2@example.com
  - Contraseña: password

## 6. Instalar Dependencias de Frontend

```bash
npm install
npm run build
```

## 7. Generar el Enlace de Almacenamiento

```bash
php artisan storage:link
```

## 8. Iniciar el Servidor de Desarrollo

```bash
php artisan serve
```

El proyecto estará disponible en: http://127.0.0.1:8000

## Comandos Útiles

- **Ver rutas disponibles:** `php artisan route:list`
- **Limpiar caché de configuración:** `php artisan config:clear`
- **Limpiar caché de rutas:** `php artisan route:clear`
- **Limpiar caché de vistas:** `php artisan view:clear`
- **Limpiar caché de la aplicación:** `php artisan cache:clear`

## Solución de Problemas Comunes

### Error de conexión a la base de datos
Asegúrate de que:
- El servidor de base de datos esté en ejecución
- Los datos de conexión en `.env` sean correctos
- El usuario de la base de datos tenga los permisos necesarios

### Error "No application encryption key has been specified"
Ejecuta:
```bash
php artisan key:generate
```

### Error de permisos en almacenamiento
En sistemas Linux/Mac:
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```
