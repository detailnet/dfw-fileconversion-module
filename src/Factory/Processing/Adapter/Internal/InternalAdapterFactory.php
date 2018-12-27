<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Internal;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\FileConversion\Options\ModuleOptions;
use Detail\FileConversion\Options\Processing\Adapter\Internal\InternalAdapterOptions;
use Detail\FileConversion\Processing\Adapter\Internal\InternalAdapter as Adapter;

class InternalAdapterFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Adapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);

        $taskProcessingOptions = $moduleOptions->getTaskProcessor();

        /** @var InternalAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter('internal', InternalAdapterOptions::CLASS);

        /** @var \Detail\FileConversion\Client\FileConversionClient $client */
        $client = $container->get($adapterOptions->getClient());

        $jobCreationOptions = $adapterOptions->getJobCreation();
        $jobCreatorClass = $jobCreationOptions->getCreator();

        if (!$jobCreatorClass) {
            throw new ServiceNotCreatedException('No DWS-FileConversion job creator class defined');
        }

        /** @var \Detail\FileConversion\Processing\Adapter\Internal\InternalJobCreatorInterface $jobCreator */
        $jobCreator = $container->get($jobCreatorClass);

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
