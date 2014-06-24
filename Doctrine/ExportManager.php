<?php

namespace Bluetea\ExportBundle\Doctrine;

use Bluetea\ExportBundle\Model\ExportInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bluetea\ExportBundle\Model\ExportManager as BaseExportManager;

class ExportManager extends BaseExportManager
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param ObjectManager $om
     * @param $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * Deletes an export
     *
     * @param ExportInterface $export
     */
    public function deleteExport(ExportInterface $export)
    {
        $this->objectManager->remove($export);
        $this->objectManager->flush();
    }

    /**
     * Find an export by id
     *
     * @param int $id
     * @return ExportInterface
     */
    public function findExport($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return ExportInterface
     */
    public function findExportBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Find exports by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return ExportInterface
     */
    public function findExportsBy(array $criteria, $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Returns a collection with all exports
     *
     * @return ExportInterface[]
     */
    public function findExports()
    {
        return $this->repository->findAll();
    }

    /**
     * Returns the export's fully qualified class name
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Updates an export
     *
     * @param ExportInterface $export
     * @param bool $andFlush
     * @return ExportInterface
     */
    public function updateExport(ExportInterface $export, $andFlush = true)
    {
        $this->objectManager->persist($export);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}