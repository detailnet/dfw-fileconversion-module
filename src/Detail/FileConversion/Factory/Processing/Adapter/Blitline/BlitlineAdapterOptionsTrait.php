<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\ServiceLocatorInterface;

trait BlitlineAdapterOptionsTrait
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions
     */
    protected function getAdapterOptions(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

        $taskProcessingOptions = $moduleOptions->getTaskProcessor();

        /** @var \Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter(
            'blitline',
            'Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions'
        );

        return $adapterOptions;
    }
}
