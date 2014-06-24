<?php

namespace Bluetea\ExportBundle\Model;

interface ExportInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath);

    /**
     * @return string
     */
    public function getFilePath();

    /**
     * @param string $exportType
     */
    public function setExportType($exportType);

    /**
     * @return string
     */
    public function getExportType();

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime($datetime);

    /**
     * @return \DateTime
     */
    public function getDatetime();

    /**
     * @param string $status
     */
    public function setStatus($status);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param float $progress
     */
    public function setProgress($progress);

    /**
     * @return float
     */
    public function getProgress();
}