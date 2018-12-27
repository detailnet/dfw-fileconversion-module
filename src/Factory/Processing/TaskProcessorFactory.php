<?php

namespace Detail\FileConversion\Factory\Processing;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\FileConversion\Options\ModuleOptions;
use Detail\FileConversion\Processing;

class TaskProcessorFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Processing\TaskProcessor
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);

        $taskProcessorOptions = $moduleOptions->getTaskProcessor();

        $adapters = new Processing\AdapterManager($container);

        foreach ($taskProcessorOptions->getAdapterFactories() as $adapterType => $adapterFactory) {
            $adapters->setFactory($adapterType, $adapterFactory);
        }

        return new Processing\TaskProcessor(
            $adapters,
            $taskProcessorOptions->getDefaultAdapter(),
            $taskProcessorOptions->getPauseOnIncident()
        );
    }
}
