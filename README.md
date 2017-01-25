# YMCAssetBundle

Useful Symfony && gulp stuff

## `gulp-rev` support

Overrides Twig's `asset()` function to look up the versioned asset path in a `gulp-rev` manifest first. If the manifest file doesn't exists or if the asset is not in it, it leaves the asset path alone.

It also support multiple manifest files, by both using a Glob in the file path and/or specifing multiple manifest files.

### Configuration

```yaml
ymc_asset:
    gulp_rev:
        enabled: true
        manifest_files:
            - %kernel.root_dir%/../web/rev-manifest.json
```
