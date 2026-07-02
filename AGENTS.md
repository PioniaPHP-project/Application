# AGENTS.md — Pionia application template

Minimal Moonlight app (`pionia/pionia-app`). For framework internals see [PioniaCore AGENTS.md](https://github.com/PioniaPHP-project/PioniaCore/blob/main/AGENTS.md).

## Layout

| Path | Purpose |
|------|---------|
| `bootstrap/application.php` | `AppRealm::create()` |
| `services/` | `*Action` methods; document with `@moonlight-*` |
| `switches/` | Service alias → class map (`MainSwitch` registered in `settings.ini` → `[app_switches]`) |
| `environment/` | `.env` + `settings.ini` |
| `public/index.php` | HTTP entry → `bootHttp()` |
| `worker.php` | RoadRunner worker (`RR_MODE` → HTTP, jobs) |
| `.rr.yaml` | RoadRunner config (HTTP + jobs + RPC) |
| `php pionia optimize` | Opt-in production performance (installs preload files + generates caches) |
| `php pionia rr:setup` | `composer rr:setup` — downloads `./rr` |

`middlewares/`, `authentications/`, and `commands/` are created by `make:middleware`, `make:auth`, and `make:command` — not shipped empty in the template.

## Extend these (v3 naming)

| Kind | Base class | Example |
|------|------------|---------|
| Switch | `Pionia\Http\Switches\ApiSwitch` | `MainSwitch` |
| Service | `Pionia\Http\Services\Service` | `WelcomeService` |
| Authentication | `Pionia\Auth\Authentication` | `JwtAuthentication` |
| Middleware | `Pionia\Middlewares\Middleware` | `RequestIdMiddleware` |
| Command | `Pionia\Console\Command` | `SyncOrdersCommand` |

`ApiSwitch` — not `Switch` — because `switch` is a PHP reserved keyword.

## API

- Versioned prefix: `/api/v1/` — use `apiVersionPath()`, not bare `/api/`.
- POST body: `{ "service", "action", ...params }`.
- Default port **8000** (`PORT` in `.env`, `[roadrunner] PORT` in settings).

## Common tasks

```bash
php pionia serve
php pionia list
php pionia make:service Reports
php pionia make:switch Admin
php pionia make:middleware RequestId
php pionia make:auth Jwt
php pionia make:command SyncOrders
php pionia api:docs --ui
php pionia frontend:scaffold --framework=react-ts --yes
php pionia rr:setup    # or: composer rr:setup — downloads ./rr once
php pionia optimize    # opt-in: installs preload.php, php.ini snippet, then optimizes
php pionia runserver   # RoadRunner
```

## Background work in services

`react/promise` is a required dependency — use `defer()` for post-response work:

```php
defer(fn () => logger()->info('After client got response'));
```

Not multithreaded — same PHP worker. Heavy work → `async('service', 'action', $payload)` + `[jobs] ENABLED` + RoadRunner.

## Local core development

Path-link to monorepo core: `composer config repositories.pionia-core path ../PioniaCore && composer require pionia/pionia-core:@dev`

## Releasing the template

Branch-only tooling (`release`, `.release/`) is removed from tagged commits.

```bash
./release 3.0.0              # clean, tag locally, restore tooling
./release 3.0.0 --push       # same + push branch/tags + GitHub Release
./release --publish v3.0.0   # publish an existing local tag to GitHub
```

Requires [GitHub CLI](https://cli.github.com/) (`gh auth login`) for `--push` / `--publish`.

Update `.release/template/` when default app files change.
