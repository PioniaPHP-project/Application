# Release tooling (branch only)

This directory is **not** included in release tags. It exists on development branches
alongside the root `release` script.

## Baseline

`.release/template/` holds the canonical fresh-app snapshot applied when cutting a tag:

- `environment/settings.ini`, `.env`
- `switches/MainSwitch.php` (welcome service only)
- `services/WelcomeService.php`
- `storage/cache/.gitkeep`, `storage/logs/.gitkeep`

Update these files when the default template changes, then run `./release <version>`.

## Cut a release

```bash
./release 3.0.0          # clean, commit, tag, restore tooling
./release 3.0.0 --push   # same, then push branch and tags
```

The tagged commit contains only the distributable template. The branch keeps `release`
and `.release/` for the next version.
