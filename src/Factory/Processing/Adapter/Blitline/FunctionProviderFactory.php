<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Interop\Container\ContainerInterface;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

use Detail\FileConversion\Processing\Adapter\Blitline\FunctionProvider;

class FunctionProviderFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = FunctionProvider::CLASS;

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FunctionProvider
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var FunctionProvider $functions */
        $functions = parent::__invoke($container, $requestedName, $options);
        $functions->addAbstractFactory(FunctionAbstractFactory::CLASS);

        return $functions;
    }
}
