<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Processing\Adapter\Blitline\BlitlineAdapter as Adapter;

class BlitlineAdapterFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return Adapter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

        $taskProcessingOptions = $moduleOptions->getTaskProcessor();

        /** @var \Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter(
            'blitline',
            'Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions'
        );

        /** @var \Detail\Blitline\Client\BlitlineClient $client */
        $client = $serviceLocator->get($adapterOptions->getClient());

        $jobCreationOptions = $adapterOptions->getJobCreation();

        /** @var \Detail\FileConversion\Processing\Adapter\Blitline\BlitlineJobCreatorInterface $jobCreator */
        $jobCreator = $serviceLocator->get($jobCreationOptions->getCreator()); /** @todo We should check if it is configured... */

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
