<?php

namespace Bluetea\ExportBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ExportCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('bluetea_export.chain')) {
            return;
        }

        $definition = $container->getDefinition(
            'bluetea_export.chain'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'bluetea_export.export_type'
        );

        // Add all export types to the export chain
        foreach ($taggedServices as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall(
                    'addExportType',
                    array(new Reference($id), $attributes['description'])
                );
            }
        }

        // Force export chain sorting
        $definition->addMethodCall(
            'sortExportChain'
        );
    }
}