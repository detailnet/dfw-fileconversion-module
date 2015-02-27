<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Internal;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Processing\Adapter\Internal\InternalAdapter as Adapter;

class InternalAdapterFactory implements FactoryInterface
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

        /** @var \Detail\FileConversion\Options\Processing\Adapter\GenericAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter(
            'internal',
            'Detail\FileConversion\Options\Processing\Adapter\GenericAdapterOptions'
        );

        /** @var \Detail\FileConversion\Client\FileConversionClient $client */
        $client = $serviceLocator->get($adapterOptions->getClient());

        /** @var \Detail\FileConversion\Processing\Adapter\Internal\InternalJobCreatorInterface $jobCreator */
        $jobCreator = $serviceLocator->get($adapterOptions->getJobCreator());

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
