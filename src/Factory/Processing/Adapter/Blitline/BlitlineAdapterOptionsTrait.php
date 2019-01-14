<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Interop\Container\ContainerInterface;

use Detail\FileConversion\Options\ModuleOptions;
use Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions;

trait BlitlineAdapterOptionsTrait
{
    /**
     * @param ContainerInterface $container
     * @return BlitlineAdapterOptions
     */
    private function getAdapterOptions(ContainerInterface $container)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $taskProcessingOptions = $moduleOptions->getTaskProcessor();

        /** @var BlitlineAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter('blitline', BlitlineAdapterOptions::CLASS);

        return $adapterOptions;
    }
}
