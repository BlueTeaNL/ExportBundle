<?php

namespace Bluetea\ExportBundle\Export;

use Bluetea\ExportBundle\BlueteaExportEvents;
use Bluetea\ExportBundle\Event\GetExportFileEvent;
use Bluetea\ExportBundle\Factory\FactoryInterface;
use Doctrine\Common\Persistence\ObjectManager;

abstract class BaseExport implements ExportInterface
{
    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var \Bluetea\ExportBundle\Model\ExportManagerInterface
     */
    protected $exportManager;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $em;

    /**
     * Constructor
     *
     * @param $container
     * @param ObjectManager $om
     */
    public function __construct($container, ObjectManager $om)
    {
        $this->container = $container;
        $this->em = $om;
    }

    /**
     * Export
     *
     * @return bool
     */
    public function export()
    {
        // Retrieve the export data
        $exportData = $this->composeExportData();

        // Parse the export data by the factory
        $parsedData = $this->factory->parse($exportData);

        // Now save the parsed data to a file
        // We're using an event listener for this
        // Dispatch EXPORT_SAVE_FILE event
        $event = new GetExportFileEvent($parsedData);
        $this->container->get('event_dispatcher')->dispatch(BlueteaExportEvents::EXPORT_SAVE_FILE, $event);

        if (!is_null($event->getFilePath())) {
            $exportEntity = $this->factory->getExportEntity();
            $exportEntity->setFilePath($event->getFilePath());
            $this->container->get('bluetea_export.export_manager')->updateExport($exportEntity);
        }

        return true;
    }

    /**
     * Get the Export Factory
     *
     * @return FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Set factory
     *
     * @param FactoryInterface $factory
     */
    public function setFactory(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param \Bluetea\ExportBundle\Model\ExportManagerInterface $exportManager
     */
    public function setExportManager($exportManager)
    {
        $this->exportManager = $exportManager;
    }

    /**
     * @return \Bluetea\ExportBundle\Model\ExportManagerInterface
     */
    public function getExportManager()
    {
        return $this->exportManager;
    }
}