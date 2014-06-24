<?php

namespace Bluetea\ExportBundle\Model;

interface ExportManagerInterface
{
    /**
     * Creates an empty export instance
     *
     * @return ExportInterface
     */
    public function createExport();

    /**
     * Deletes an export
     *
     * @param ExportInterface $export
     */
    public function deleteExport(ExportInterface $export);

    /**
     * Find an export by id
     *
     * @param int $id
     * @return ExportInterface
     */
    public function findExport($id);

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return ExportInterface
     */
    public function findExportBy(array $criteria);

    /**
     * Find exports by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return ExportInterface
     */
    public function findExportsBy(array $criteria, $orderBy = null, $limit = null, $offset = null);

    /**
     * Returns a collection with all exports
     *
     * @return ExportInterface[]
     */
    public function findExports();

    /**
     * Returns the export's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Updates an export
     *
     * @param ExportInterface $export
     * @return ExportInterface
     */
    public function updateExport(ExportInterface $export);
}