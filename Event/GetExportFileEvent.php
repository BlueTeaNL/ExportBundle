<?php

namespace Bluetea\ExportBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class GetExportFileEvent extends Event
{
    /**
     * @var string
     */
    protected $parsedData;

    /**
     * @var string
     */
    protected $filePath;

    public function __construct($parsedData)
    {
        $this->parsedData = $parsedData;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @return string
     */
    public function getParsedData()
    {
        return $this->parsedData;
    }
}