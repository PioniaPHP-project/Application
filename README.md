# Pionia Application (`pionia/pionia-app`)

Official **Pionia v3** application template. Moonlight REST API on **PHP 8.5+** with `AppRealm` bootstrap, CLI, optional Vite frontend, and optional RoadRunner workers.

## Create a project

```bash
composer create-project pionia/pionia-app my-api
cd my-api
php pionia serve
```

Default URL: `http://127.0.0.1:8000/` (`environment/.env` → `PORT`; `[roadrunner]` in `settings.ini` uses the same default).

## API (Moonlight)

Register services in `switches/MainSwitch.php`. Dispatch with JSON:

```json
{ "service": "welcome", "action": "ping" }
```

| Endpoint | Method | Purpose |
|----------|--------|---------|
| `/api/v1/ping` | GET | Framework health check |
| `/api/v1/` | POST | Service actions |

```bash
curl -s http://127.0.0.1:8000/api/v1/ping
curl -s -X POST http://127.0.0.1:8000/api/v1/ \
  -H 'Content-Type: application/json' \
  -d '{"service":"welcome","action":"ping"}'
```

Use path helpers in code — not hard-coded strings: `apiVersionPath()`, `apiPingPath()`, `apiBase()`.

## Directory layout

```
bootstrap/          AppRealm + routes
environment/        .env, settings.ini
public/             Web root (index.php)
services/           Business logic (*Action methods)
switches/           ApiSwitch subclasses (service registry per API version)
storage/            cache, logs
worker.php          RoadRunner worker entry
.rr.yaml            RoadRunner config (HTTP + jobs)
pionia              CLI entry
```

`middlewares/`, `authentications/`, and `commands/` are created when you run `make:middleware`, `make:auth`, or `make:command`.

### Base classes (extend these)

| Kind | Class |
|------|-------|
| Switch | `Pionia\Http\Switches\ApiSwitch` |
| Service | `Pionia\Http\Services\Service` |
| Authentication | `Pionia\Auth\Authentication` |
| Middleware | `Pionia\Middlewares\Middleware` |
| Command | `Pionia\Console\Command` |

## Frontend (optional)

```bash
php pionia frontend:scaffold --framework=react-ts --yes
php pionia serve              # terminal 1 — API on PORT (8000)
php pionia frontend:dev       # terminal 2 — Vite on :5173, proxies /api
php pionia frontend:build     # production — copies dist/ → public/
```

CORS for `:5173` is preconfigured in `environment/settings.ini`.

## Background work

Post-response tasks (logging, webhooks) — **not a new thread**; runs after the client gets JSON:

```php
defer(function () use ($order) {
    logger()->info('Processed after response', ['id' => $order->id]);
});
```

Requires `composer require react/promise`. Durable jobs (email, reports) use RoadRunner Jobs — see [Background work](https://pionia.netlify.app/documentation/background-work/).

## RoadRunner (persistent workers)

RoadRunner packages ship in **require-dev**. After `composer install`:

```bash
php pionia rr:setup        # downloads ./rr binary (alias: composer rr:setup)
php pionia runserver       # foreground on http://127.0.0.1:8000
php pionia runserver --detach
php pionia runserver:logs
php pionia stopserver
```

Enable Moonlight jobs in `environment/settings.ini` (`[jobs] ENABLED=true`) when using the jobs pool.

Port resolution: CLI `--port` → `.env` `PORT` / `SERVER_PORT` → `[roadrunner]` in `settings.ini` → `.rr.yaml` → **8000**.

Production: switch `jobs.pipelines.moonlight` to **redis** in `.rr.yaml` and set `[jobs] ENABLED=true`.

## Production performance (OPcache, opt-in)

Performance files are **not** shipped in the default template. Run once on deploy:

```bash
composer install --no-dev -o
php pionia optimize
```

This installs `bootstrap/preload.php`, `environment/php.ini.production.example`, and `[performance]` in `settings.ini`, then generates `storage/bootstrap/preload.php`.

- Point `php.ini` `opcache.preload` at `bootstrap/preload.php`
- Restart RoadRunner or PHP-FPM after deploy
- `php pionia optimize:clear --scaffold` removes opt-in files

RoadRunner without global `php.ini`:

```yaml
server:
  command: "php -d opcache.enable_cli=1 -d opcache.preload=./bootstrap/preload.php worker.php"
```

## API documentation

Document actions with `@moonlight-*` PHPDoc on service classes:

```bash
php pionia api:docs --ui
open http://127.0.0.1:8000/docs    # when DEBUG or DOCS_ENABLED
```

Remove the path repository before publishing a Packagist release (consumers install core from Packagist).

## Documentation

| Resource | URL |
|----------|-----|
| User guides | [pionia.netlify.app](https://pionia.netlify.app) |
| Helpers (`defer`, Porm, cache, …) | [Helpers](https://pionia.netlify.app/documentation/helpers/) |
| Framework architecture | [PioniaCore AGENTS.md](https://github.com/PioniaPHP-project/PioniaCore/blob/main/AGENTS.md) |
| This app | `AGENTS.md` (short app notes) |

## Requirements

- PHP **8.5+**
- Composer
- `pionia/pionia-core` **^3.0**
- `ext-pdo` (SQLite default; configure other drivers in `settings.ini`)
