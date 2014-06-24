<?php

namespace Bluetea\ExportBundle\Factory;

class CSVFactory extends ExportFactory implements FactoryInterface
{
    protected $options = [
        'delimiter' => ';',
        'enclosure' => '"',
        'escape' => '\\'
    ];

    /**
     * @var \SplFileObject
     */
    protected $fileObj;

    /**
     * @param $exportData
     * @return mixed|\SplFileObject|void
     */
    public function parse($exportData)
    {
        parent::parse($exportData);

        $memory = fopen('php://memory', 'r+');
        foreach ($exportData as $exportLine) {
            fputcsv($memory, $exportLine, $this->options['delimiter'], $this->options['enclosure']);
        }
        rewind($memory);

        return stream_get_contents($memory);
    }
}