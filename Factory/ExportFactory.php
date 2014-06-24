<?php

namespace Bluetea\ExportBundle\Factory;

use Bluetea\ExportBundle\Exception\ExportException;
use Bluetea\ExportBundle\Model\ExportInterface;

class ExportFactory
{
    /**
     * Export entity
     *
     * @var ExportInterface
     */
    protected $exportEntity;

    /**
     * Contains options (optional)
     *
     * @var array
     */
    protected $options = array();

    /**
     * @param $exportData
     * @throws \Bluetea\ExportBundle\Exception\ExportException
     */
    public function parse($exportData)
    {
        if (!is_array($exportData)) {
            throw new ExportException("Export data isn't an array");
        }

        if (empty($this->exportEntity) || !$this->exportEntity instanceof ExportInterface) {
            throw new ExportException("Export entity not found or not an instance of the Export model");
        }
    }

    /**
     * @param ExportInterface $exportEntity
     */
    public function setExportEntity(ExportInterface $exportEntity)
    {
        $this->exportEntity = $exportEntity;
    }

    /**
     * @return ExportInterface
     */
    public function getExportEntity()
    {
        return $this->exportEntity;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}