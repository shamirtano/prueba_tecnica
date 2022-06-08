<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prueba Ténica de PHP

Un pequeño CRUD realizado en laravel con una base de datos relacional de empleados y roles de usuario compuetas por 4 tablas (empleado, roles, empleado_rol y areas), donde se aplican muchas técnicas de desarrollo y POO.

## Instalación

Para instalar de manera local inicialmente necesitaras composer y laravel, después de tener instalado ambos puedes realizar la copya del recopitorio desde la consola o descargando el archivo zip, creas una carpeta en htdocs si tienes Xampp, a esta carpeta le puedes colocar el nombre que desees, nombre que debes tener en cuenta para registrarlo en el archivo .env que debes generar a partir del .env-copia y modifcar su estensión para que quede solo (.env), dentro de este archivo modificas la APP_URL, estableciendo http://localhost/tu-carpeta-nueva donde copiaste el proyecto.

## Base de datos

La base de datos es necesrio crearla en Xampp, luego de creada importas el archivo: que está dentro de la carpeta database

### Ejecutando el proyecto

Cuando ya tengas todos los campos listos y la conexion correcta a la base de datos puedes ejecutar desde la consola el siguiente comando para ejecutar el proyecto: 

#### php artisan serve

Y listo tu proyecto ahora se ejecuta en el servidor localhost y por lo general en el puerto 8000
