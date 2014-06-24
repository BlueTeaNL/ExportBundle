Getting started with BlueteaExportBundle
========================================

The ExportBundle gives you the chance to export CSV files (or other
file types when implementing more factories) in your Symfony2 application.

## Prerequirements

This bundle requires Symfony 2.3+ and PHP 5.3.2+

## Installation

Installation is simple:

1. Download BlueteaExportBundle using composer
2. Enable the Bundle
3. Configure the BlueteaExportBundle
4. Update your database schema

### Step 1: Download BlueteaExportBundle using composer

Add BlueteaExportBundle by running the command:

```bash
$ php composer.phar require bluetea/export-bundle '~1.1'
```

Composer will install the bundle to your project's `vendor/bluetea` directory.

### Step 2: Enable the Bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Bluetea\ExportBundle\BlueteaExportBundle(),
    );
}
```

### Step 3: Configure the BlueteaExportBundle

Add the following configuration to your `config.yml` file.

``` yaml
# app/config/config.yml
bluetea_export:
    export_class: Bluetea\ExportBundle\Entity\Export
```

If you like to implement your own entities, read the [extend entities documentation](extend_entities.md).

If you haven't enabled doctrine auto mapping, add `BlueteaExportBundle` to your mappings.

### Step 4: Update your database schema

Now that the bundle is configures, the last thing you need to do is update your database schema
because the bundle adds the Export and ExportLog entity. If you're using your own entities you
should exclude the `BlueteaExportBundle` entities.

Run the following command.

``` bash
$ php app/console doctrine:schema:update --force
```

If you're using the Doctrine migration bundle, run:

``` bash
$ php app/console doctrine:migrations:diff
```

Now you're ready to use the BlueteaExportBundle!

### Next steps

* [Add export types](export_types.md)
* [Using the manager](manager.md)
* [Extend the entities](extend_entities.md)
* [Event listeners](event_listeners.md)
* [Add factories](factories.md)