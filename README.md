<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### PRUEBA TECNICA

Necesitamos una prueba piloto de un sistema de gestión de una colección de VHS para uno de nuestros productos. Lo queremos mantener separado, así que debemos empezar un nuevo proyecto.

Inicialmente sólo queremos poder dar de alta y listar películas. Vamos a necesitar acceder al contenido desde otras aplicaciones, lo que nos requiere exponer una API.
Para el desarrollo de la misma se hizo uso de:

- PHP 8
- Framework Laravel 9
- Tests 
- Request validate
- Middleware para permisos de acceso como Cors
- Seeder y factory que permite cargar información a la BD 
- Traits
- Resource y collections para la respuestas de datos Json
- Eloquent para interacción con la capa de datos


### PASOS PARA EL DESPLIEGUE DE LA API

Necesita requerimientos mínimos:
```requiere
PHP 8
Composer 2.*
```

Clonamos la api del Github:

`https://github.com/lili080916/emais-api-themoviedb`

Comandos para iniciar el proyecto:
```command
composer install
php artisan migrate
php artisan db:seed
```
En el **.env** incluir las variables de entorno:
`THEMOVIEDB_KEY=`
`THEMOVIEDB_URL=`

En la raíz del proyecto, la carpeta **client http** puede importarse una collection de **Postsman** para interactuar con los endpoints desarrollados. 

Para acceder a la documentación de la API:

https://documenter.getpostman.com/view/19798850/Uyxeonx7

### Gracias
