<?php

namespace Bluetea\ExportBundle;

use Bluetea\ExportBundle\DependencyInjection\Compiler\ExportCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BlueteaExportBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ExportCompilerPass());
    }
}
