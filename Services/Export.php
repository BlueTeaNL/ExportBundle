<?php

namespace Bluetea\ExportBundle\Services;

use Bluetea\ExportBundle\BlueteaExportEvents;
use Bluetea\ExportBundle\Event\GetStatusEvent;
use Bluetea\ExportBundle\Event\ExportEvent;
use Bluetea\ExportBundle\Exception\ExportException;
use Bluetea\ExportBundle\Factory\FactoryInterface;
use Bluetea\ExportBundle\Export\ExportInterface;
use Bluetea\ExportBundle\Model\ExportManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Export
{
    /**
     * @var \Bluetea\ExportBundle\Export\ExportInterface
     */
    protected $exportType;

    /**
     * @var \Bluetea\ExportBundle\Factory\FactoryInterface
     */
    protected $factory;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var \Bluetea\ExportBundle\Model\ExportManagerInterface
     */
    protected $exportManager;

    /**
     * Constructor
     *
     * @param FactoryInterface $factory
     * @param EventDispatcherInterface $eventDispatcher
     * @param ExportManagerInterface $exportManager
     */
    public function __construct(
        FactoryInterface $factory,
        EventDispatcherInterface $eventDispatcher,
        ExportManagerInterface $exportManager
    )
    {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
        $this->exportManager = $exportManager;
    }

    /**
     * Start the export process
     *
     * @return bool
     */
    public function startExport()
    {
        // Validate the given Export entity and export type
        $this->validateMandatoryProperties();

        // Set the given factory and logger
        $this->exportType->setFactory($this->factory);
        // Get export entity from factory
        $exportEntity = $this->factory->getExportEntity();

        // Dispatch EXPORT_INITIALIZE event
        $event = new ExportEvent($this->exportType);
        $this->eventDispatcher->dispatch(BlueteaExportEvents::EXPORT_INITIALIZE, $event);

        // Try to export
        try {
            $this->exportType->export();
        } catch (\Exception $exception) {
            $exportEntity->setStatus(\Bluetea\ExportBundle\Model\Export::ERROR);
        }

        // Dispatch EXPORT_SUCCESS event
        $event = new GetStatusEvent($this->exportType);
        $this->eventDispatcher->dispatch(BlueteaExportEvents::EXPORT_SUCCESS, $event);

        // Set the progress to 100 %
        $exportEntity->setProgress(100);
        // Handle the status of the export
        if (!is_null($event->getStatus())) {
            $exportEntity->setStatus($event->getStatus());
        } else {
            $exportEntity->setStatus(\Bluetea\ExportBundle\Model\Export::READY);
        }
        // Update the export entity
        $this->exportManager->updateExport($exportEntity);

        // Dispatch EXPORT_COMPLETED event
        $event = new ExportEvent($this->exportType);
        $this->eventDispatcher->dispatch(BlueteaExportEvents::EXPORT_COMPLETED, $event);

        return true;
    }

    /**
     * Validate the mandatory properties before starting the export
     *
     * @throws \Bluetea\ExportBundle\Exception\ExportException
     */
    protected function validateMandatoryProperties()
    {
        $exportEntity = $this->factory->getExportEntity();
        $exportType = $this->exportType;

        // Check if file path and export type are set
        if (empty($exportEntity) || empty($exportType)) {
            throw new ExportException("Export entity or export type aren't set");
        }

        // Check if module implements the ExportInterface
        if (!$this->exportType instanceof ExportInterface) {
            throw new ExportException("Export type does not implement the ExportInterface class");
        }
    }

    /**
     * Set options
     *
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->factory->setOptions($options);
    }

    /**
     * Set the export entity
     *
     * @param \Bluetea\ExportBundle\Model\Export $exportEntity
     */
    public function setExportEntity(\Bluetea\ExportBundle\Model\Export $exportEntity)
    {
        $this->factory->setExportEntity($exportEntity);
    }

    /**
     * @param \Bluetea\ExportBundle\Export\ExportInterface $exportType
     */
    public function setExportType($exportType)
    {
        $this->exportType = $exportType;
    }
}