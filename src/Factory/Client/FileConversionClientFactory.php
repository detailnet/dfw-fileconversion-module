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

        $options = array_merge(
            $clientOptions->getHttpOptions(),
            // Only pass along options which are actually set
            array_filter(
                [
                    'base_uri' => $clientOptions->getBaseUri(),
                    FileConversionClient::OPTION_APP_ID => $clientOptions->getDwsAppId(),
                    FileConversionClient::OPTION_APP_KEY => $clientOptions->getDwsAppKey(),
                ],
                function ($value) {
                    return $value !== null;
                }
            )
        );

        return FileConversionClient::factory($options, $jobBuilder);
    }
}
