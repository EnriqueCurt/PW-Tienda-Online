# PW-Tienda-Online

Proyecto Laravel con Docker (Laravel Sail) y un Dockerfile listo para Render. Por ahora sirve un hola mundo en la ruta raiz.

## Requisitos locales

- Docker Desktop
- PHP y Composer (solo para instalar dependencias y Sail)

## Hola mundo local con Sail

1) Instala dependencias y genera la clave de la app:

```bash
composer install
php artisan key:generate
```

2) Levanta el contenedor:

```bash
./vendor/bin/sail up -d
```

3) Abre el navegador en:

```
http://localhost
```

## Render (Dockerfile)

Este repo incluye un [Dockerfile](Dockerfile) sencillo que usa el servidor embebido de PHP.

Variables de entorno recomendadas en Render:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://tu-app.onrender.com`
- `APP_KEY=base64:...` (genera con `php artisan key:generate --show` en local)

Pasos en Render:

1) Crear un nuevo servicio Web y apuntar al repositorio.
2) Build: usar Dockerfile (Render lo detecta automaticamente).
3) Start: no es necesario, ya esta en el `CMD` del Dockerfile.
4) Configurar las variables de entorno anteriores.

## Notas

- Para base de datos Postgres en Render, se agregaran `DB_*` mas adelante.
- Sail esta configurado sin servicios extra por ahora.
