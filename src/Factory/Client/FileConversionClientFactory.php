<?php

namespace Detail\FileConversion\Factory\Client;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\FileConversion\Client\FileConversionClient;
use Detail\FileConversion\Client\Job\JobBuilder;
use Detail\FileConversion\Options\ModuleOptions;

class FileConversionClientFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FileConversionClient
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $clientOptions = $moduleOptions->getClient();

        /** @var JobBuilder $jobBuilder */
        $jobBuilder = $container->get(JobBuilder::CLASS);

        return FileConversionClient::factory($clientOptions->toArray(), $jobBuilder);
    }
}
