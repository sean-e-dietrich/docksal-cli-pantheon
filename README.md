# docksal-cli-pantheon

## What's Different?

Some features that are included in this image are:

* _Injection of mysql credentials into framework_: no longer worry about having to manually add database credentials
* _Redis Cacching Configuration_: Contains default configuration for Redis

## Installing

## Environmental Variables 

The following environmental variables are available to set:

* `FRAMEWORK`: Available options are (drupal7, drupal8, wordpress)
* `PANTHEON_SITE`
* `PANTHEON_SITE_ID`
* `PANTHEON_ENVIRONMENT`: 
* `PANTHEON_BINDING`
* `PANTHEON_DATABASE_HOST`
* `PANTHEON_DATABASE_PORT`
* `PANTHEON_DATABASE_USERNAME`
* `PANTHEON_DATABASE_PASSWORD`
* `PANTHEON_DATABASE_DATABASE`
* `DRUPAL_HASH_SALT`

### Redis
* `PANTHEON_REDIS_HOST`
* `PANTHEON_REDIS_PORT`
* `PANTHEON_REDIS_PASSWORD`

### Solr
* `PANTHEON_INDEX_HOST`
* `PANTHEON_INDEX_PORT`

### Terminus
* `TERMINUS_TOKEN`
