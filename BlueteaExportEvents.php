<?php

namespace Bluetea\ExportBundle;

/**
 * Contains all events thrown in the BlueteaExportBundle
 */
final class BlueteaExportEvents
{
    /**
     * The EXPORT_INITIALIZE event occurs when the run export process is initialized
     *
     * The event listener method receives a Bluetea\ExportBundle\Events\ExportEvent instance
     */
    const EXPORT_INITIALIZE = 'bluetea_export.export_initialize';

    /**
     * The EXPORT_SUCCESS event occurs when the run export process is finished
     *
     * This event allows you to modify the export entity before flushing
     * The event listener method receives a Bluetea\ExportBundle\Events\GetExportEvent instance
     */
    const EXPORT_SUCCESS = 'bluetea_export.export_success';

    /**
     * The EXPORT_COMPLETED event occurs when the run export process is finished
     *
     * The event listener method receives a Bluetea\ExportBundle\Events\ExportEvent instance
     */
    const EXPORT_COMPLETED = 'bluetea_export.export_completed';

    /**
     * The EXPORT_SAVE_FILE event occurs when the run export process is finished and the
     * parsed data is available.
     *
     * This event allows you to handle the storage of the export file
     * The event listener methods receives a Bluetea\Export\Events\GetExportFileEvent instance
     */
    const EXPORT_SAVE_FILE = 'bluetea_export.export_save_file';
}