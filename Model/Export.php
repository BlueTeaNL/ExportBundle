<?php

namespace Bluetea\ExportBundle\Model;

abstract class Export implements ExportInterface
{
    const PENDING = "Pending";
    const QUEUE = "Queue";
    const RUNNING = "Running";
    const READY = "Ready";
    const ERROR = "Error";
    const WARNING = "Warning";

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var \Bluetea\ExportBundle\Export\ExportInterface
     */
    protected $exportType;

    /**
     * @var \DateTime
     */
    protected $datetime;

    /**
     * @var string
     */
    protected $status = self::PENDING;

    /**
     * @var float
     */
    protected $progress = 0;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @param string $exportType
     */
    public function setExportType($exportType)
    {
        $this->exportType = $exportType;
    }

    /**
     * @return string
     */
    public function getExportType()
    {
        return $this->exportType;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

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

    /**
     * @param float $progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
    }

    /**
     * @return float
     */
    public function getProgress()
    {
        return $this->progress;
    }
}
