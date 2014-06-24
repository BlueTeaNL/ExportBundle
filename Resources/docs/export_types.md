Add export types
================

The export types implement the ExportInterface and extend the BaseExport class.
The BaseExport class implement default export logic. The export type has only one
mandatory method: composeExportData.

The composeExportData method should return a multi-dimensional array.

You can find an example of an export type [here](../../Export/Type/ExampleExportType.php).

Then, add the export type as a service:

```yaml
acme_export.your_export_type:
    class: Acme\ExportBundle\Export\Type\YourExportType
    arguments:
        - @service_container
        - @bluetea_export.entity_manager
    tags:
        - { name: bluetea_export.export_type, description: 'your export type' }
```


[Index](index.md)