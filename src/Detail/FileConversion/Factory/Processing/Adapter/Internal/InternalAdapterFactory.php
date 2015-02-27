<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Internal;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Exception;
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

        /** @var \Detail\FileConversion\Options\Processing\Adapter\Internal\InternalAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter(
            'internal',
            'Detail\FileConversion\Options\Processing\Adapter\Internal\InternalAdapterOptions'
        );

        /** @var \Detail\FileConversion\Client\FileConversionClient $client */
        $client = $serviceLocator->get($adapterOptions->getClient());

        $jobCreationOptions = $adapterOptions->getJobCreation();
        $jobCreatorClass = $jobCreationOptions->getCreator();

        if (!$jobCreatorClass) {
            throw new Exception\ConfigException('No Blitline job creator class defined');
        }

        /** @var \Detail\FileConversion\Processing\Adapter\Internal\InternalJobCreatorInterface $jobCreator */
        $jobCreator = $serviceLocator->get($jobCreatorClass);

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
