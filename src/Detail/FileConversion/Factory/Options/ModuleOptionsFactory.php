<?php

namespace Detail\FileConversion\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Exception\ConfigException;
use Detail\FileConversion\Options\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['detail_fileconversion'])) {
            throw new ConfigException('Config for Detail\FileConversion is not set');
        }

        return new ModuleOptions($config['detail_fileconversion']);
    }
}
