<?php

namespace Detail\FileConversion\Factory\Client;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Client\FileConversionClient;

class FileConversionClientFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return FileConversionClient
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

        $clientOptions = $moduleOptions->getClient();

        /** @var \Detail\FileConversion\Client\Job\JobBuilder $jobBuilder */
        $jobBuilder = $serviceLocator->get('Detail\FileConversion\Job\JobBuilder');

        return FileConversionClient::factory($clientOptions->toArray(), $jobBuilder);
    }
}
