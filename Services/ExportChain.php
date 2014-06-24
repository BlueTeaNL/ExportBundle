<?php

namespace Bluetea\ExportBundle\Services;

use Bluetea\ExportBundle\Export\ExportInterface;

class ExportChain
{
    /**
     * Contains all export types
     *
     * @var array
     */
    private $exportTypes;

    /**
     * Construct the ExportChain class an initialize the exportTypes property as an array
     */
    public function __construct()
    {
        $this->exportTypes = array();
    }

    /**
     * Add an export type which implements the ExportInterface interface
     *
     * @param ExportInterface $exportType
     * @param string $name
     */
    public function addExportType(ExportInterface $exportType, $name)
    {
        $this->exportTypes[$name] = $exportType;
    }

    /**
     * Returns all export types
     *
     * @return ExportInterface[]
     */
    public function getExportTypes()
    {
        return $this->exportTypes;
    }

    /**
     * Get an export type by name
     *
     * @param string $exportType
     * @return ExportInterface
     */
    public function getExportType($exportType)
    {
        if (array_key_exists($exportType, $this->exportTypes))
            return $this->exportTypes[$exportType];
    }

    /**
     * Order the export types on name
     */
    public function sortExportChain()
    {
        // Sort keys
        ksort($this->exportTypes);
        // Create empty array
        $array = array();
        // Loop through exportTypes
        foreach ($this->exportTypes as $name => $exportType) {
            $array[$name] = $exportType;
        }
        // Set exportTypes property with consecutive keys
        $this->exportTypes = $array;
    }
}