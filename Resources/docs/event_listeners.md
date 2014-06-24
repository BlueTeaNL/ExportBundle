Event Listeners
===============

```php
namespace Acme\ExportBundle\EventListener;

use Bluetea\ExportBundle\BlueteaExportEvents;
use Bluetea\ExportBundle\Event\GetExportFileEvent;
use Knp\Bundle\GaufretteBundle\FilesystemMap;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SaveExportFileListener implements EventSubscriberInterface
{
    /**
     * @var FilesystemMap
     */
    protected $gaufretteFilesystemMap;

    public function __construct($fsMap)
    {
        $this->gaufretteFilesystemMap = $fsMap;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        echo "+";
        return array(
            BlueteaExportEvents::EXPORT_SAVE_FILE => 'saveFile',
        );
    }

    public function saveFile(GetExportFileEvent $event)
    {
        $parsedData = $event->getParsedData();

        /** @var $fsTest \Gaufrette\Filesystem */
        $fsTest = $this->gaufretteFilesystemMap->get('test');
        $fsTest->write('export.csv', $parsedData);

        $event->setFilePath('export.csv');
    }
}
```

Define the listener in your services

```yaml
services:
    acme_export.send_mail_after_export:
        class: Acme\ExportBundle\EventListener\SaveExportFileListener
        tags:
            - { name: kernel.event_subscriber }
```

[Index](index.md)