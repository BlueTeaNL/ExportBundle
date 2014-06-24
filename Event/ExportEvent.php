<?php

namespace Bluetea\ExportBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ExportEvent extends Event
{
    protected $exportType;

    function __construct($exportType)
    {
        $this->exportType = $exportType;
    }

    /**
     * @return mixed
     */
    public function getExportType()
    {
        return $this->exportType;
    }
}