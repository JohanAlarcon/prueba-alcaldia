# Proyecto de Gestión de Empleados

Este proyecto es una aplicación de gestión de empleados desarrollada con Laravel 8.83.27. Proporciona funcionalidades para registrar, actualizar, consultar y eliminar empleados y departamentos.

## Requisitos

- PHP >= 7.3
- Composer
- MySQL

## Instalación

Sigue los pasos a continuación para clonar y configurar el proyecto:

### Clonación del Proyecto

1. Clona el repositorio:

    ```bash
    git clone https://github.com/JohanAlarcon/prueba-alcaldia.git
    cd prueba-alcaldia
    ```

### Instalación de Dependencias

2. Instala las dependencias de PHP con Composer:

    ```bash
    composer install
    ```

### Configuración del Entorno

3. Copia el archivo `.env.example` a `.env` y actualiza las variables de entorno según tu configuración local:

    ```bash
    cp .env.example .env
    ```

### Configuración de la Base de Datos

4. Crea una nueva base de datos MySQL llamada `prueba-alcaldia`.

5. Actualiza el archivo `.env` con las credenciales de tu base de datos:

    ```plaintext
    DB_DATABASE=prueba-alcaldia
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

### Migraciones y Seeders

6. Ejecuta las migraciones y los seeders para configurar la base de datos:

    ```bash
    php artisan migrate:fresh --seed
    ```


### Servidor de Desarrollo

7. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

Visita [http://localhost:8000](http://localhost:8000) en tu navegador para ver la aplicación en funcionamiento.

Usuario de autenticacion inicial :

email : johandarioalarcon@gmail.com
password : 12345678

## Comandos Útiles

- Ejecutar las migraciones y seeders:

    ```bash
    php artisan migrate:fresh --seed
    ```

- Ejecutar pruebas:

    ```bash
    php artisan test
    ```
