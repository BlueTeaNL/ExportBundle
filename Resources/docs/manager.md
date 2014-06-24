Using the managers
==================

You can use the managers to manage the export and export log entities which you have
configures in your `app/config/config.yaml` file.

## Usage

Export manager:

```php
$this->get('bluetea_export.export_manager')->findExport($yourId);
```


[Index](index.md)