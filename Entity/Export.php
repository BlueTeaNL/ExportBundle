<?php

namespace Bluetea\ExportBundle\Entity;

use Bluetea\ExportBundle\Model\Export as BaseExport;

class Export extends BaseExport
{
    /**
     * Set DateTime to NOW()
     */
    public function updateDatetime()
    {
        $this->setDatetime(new \DateTime());
    }
}