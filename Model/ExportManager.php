<?php

namespace Bluetea\ExportBundle\Model;

abstract class ExportManager implements ExportManagerInterface
{
    /**
     * Creates an empty export instance
     *
     * @return ExportInterface
     */
    public function createExport()
    {
        $class = $this->getClass();
        $export = new $class;

        return $export;
    }
}