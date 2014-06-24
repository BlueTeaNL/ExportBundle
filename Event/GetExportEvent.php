<?php

namespace Bluetea\ExportBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class GetExportEvent extends Event
{
    protected $exportEntity;

    function __construct($exportEntity)
    {
        $this->exportEntity = $exportEntity;
    }

    /**
     * @return mixed
     */
    public function getExportEntity()
    {
        return $this->exportEntity;
    }
}