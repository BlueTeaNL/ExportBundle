<?php

namespace Bluetea\ExportBundle\Event;

class GetStatusEvent extends ExportEvent
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}