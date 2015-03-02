<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\Mvc\Service\AbstractPluginManagerFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Processing\Adapter\Blitline\FunctionProvider;

class FunctionProviderFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = FunctionProvider::CLASS;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return FunctionProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $functions = parent::createService($serviceLocator);
        $functions->addAbstractFactory(FunctionAbstractFactory::CLASS);

        return $functions;
    }
}
