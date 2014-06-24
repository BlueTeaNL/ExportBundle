<?php

namespace Bluetea\ExportBundle\Factory;

use Bluetea\ExportBundle\Model\ExportInterface;

interface FactoryInterface
{
    /**
     * @param $exportData
     * @return mixed
     */
    public function parse($exportData);

    /**
     * Set the export entity
     *
     * @param ExportInterface $exportEntity
     */
    public function setExportEntity(ExportInterface $exportEntity);

    /**
     * Returns the export entity
     *
     * @return ExportInterface
     */
    public function getExportEntity();

    /**
     * Set options
     *
     * @var array $options
     */
    public function setOptions($options);

    /**
     * Returns the options
     *
     * @return array
     */
    public function getOptions();
}