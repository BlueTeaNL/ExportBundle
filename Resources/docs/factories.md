Factories
=========

Example CSVFactory

```php
<?php

namespace Bluetea\ExportBundle\Factory;

class CSVFactory extends ExportFactory implements FactoryInterface
{
    protected $options = [
        'delimiter' => ';',
        'enclosure' => '"',
        'escape' => '\\'
    ];

    /**
     * Parser
     *
     * @throws \Exception
     * @return mixed
     */
    public function parse()
    {
        parent::parse();

        $fileObj = new \SplFileObject($this->exportEntity->getAbsolutePath());
        $fileObj->setFlags(\SplFileObject::READ_CSV);
        $fileObj->setCsvControl(
            $this->options['delimiter'],
            $this->options['enclosure'],
            $this->options['escape']
        );

        return $fileObj;
    }
}
```

Add them to the services configuration

```yaml
bluetea_export.factory.csv:
    class: Bluetea\ExportBundle\Factory\CSVFactory

bluetea_export.csv:
    class: Bluetea\ExportBundle\Services\Export
    arguments:
        - @bluetea_export.factory.csv
        - @event_dispatcher
        - @bluetea_export.export_manager
```


[Index](index.md)