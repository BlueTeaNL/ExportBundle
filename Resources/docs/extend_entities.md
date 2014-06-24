Extend the entities
===================

Example:

```php
<?php
namespace Acme\ExportBundle\Entity;

use Bluetea\ExportBundle\Model\Export as BaseExport;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="export")
 */
class Export extends BaseExport
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
```


[Index](index.md)