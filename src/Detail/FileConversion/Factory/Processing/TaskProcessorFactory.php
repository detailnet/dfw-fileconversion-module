<?php

namespace Detail\FileConversion\Factory\Processing;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Processing;

class TaskProcessorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return Processing\TaskProcessor
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

        $taskProcessorOptions = $moduleOptions->getTaskProcessor();

        $adapters = new Processing\AdapterManager();
        $adapters->setServiceLocator($serviceLocator);

        foreach ($taskProcessorOptions->getAdapterFactories() as $adapterType => $adapterFactory) {
            $adapters->setFactory($adapterType, $adapterFactory);
        }

        return new Processing\TaskProcessor($adapters, $taskProcessorOptions->getDefaultAdapter());
    }
}
