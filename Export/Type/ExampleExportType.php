<?php

namespace Bluetea\ExportBundle\Export\Type;

use Bluetea\ExportBundle\Export\BaseExport;
use Bluetea\ExportBundle\Export\ExportInterface;

class ExampleExportType extends BaseExport implements ExportInterface
{
    /**
     * @return array
     */
    public function composeExportData()
    {
        $array = array();

        for ($i = 0; $i < 50; $i++) {
            $array[] = array(
                'First column',
                'Second column',
                'Third column',
                'Fourth column',
                'Fifth column'
            );
        }

        return $array;
    }
}