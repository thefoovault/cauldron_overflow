# Cauldron Overflow

Symfony 5 workshop from Symfony casts (with `docker` and `decoupled Symfony`)

The goal is learning Symfony while building a StackOverflow-like app.

## Installation

Execute `make build` to download Docker container and install all composer dependencies.

## Basic usage

Once project is downloaded, we will execute:
- `make start` to start the container.
- `make stop` to stop the container.

For more actions, execute `make` without arguments.

## Useful tips

### Install and configure decoupled Symfony flex

````
 composer require symfony/flex
````

Then modify `composer.json` to add inside `extra` (replacing `newRoute` with the appropriate one):

````
 "extra": {
     "bin-dir": "newRoute/bin",
     "config-dir": "newRoute/config",
     "src-dir": "newRoute/src",
     "var-dir": "newRoute/var",
     "public-dir": "newRoute/public"
   },

````

**Disclaimer**: Extracted from https://symfony.com/doc/3.4/setup/flex.html:

> If you customize these paths, **some files copied from a recipe still may contain references to the original path**. In other words: you may need to update some things manually after a recipe is installed.

### Used recipes

#### Templates
````
 composer require template
````

It installs and configures:
- symfony/twig-bundle
- twig/extra-bundle
- twig/twig

**Disclaimer**: It creates a `templates` folder, but it creates in the `/` of the project instead of the appropriate folder, when using decoupled Symfony.  

#### Profiler

````
 composer require profiler --dev
````
It installs and configures the Symfony profiler bar. Only recommended in dev environments.

#### Debug
````
 composer require debug
````
It installs and configures all debug tools:
- symfony/debug-bundle
- symfony/monolog-bundle
- symfony/stopwatch
- symfony/web-profiler-bundle
- symfony/var-dumper
