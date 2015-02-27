<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Processing\Adapter\Blitline\Func;

class FunctionAbstractFactory implements
    AbstractFactoryInterface
{
    use BlitlineAdapterOptionsTrait;

    /**
     * @var array
     */
    protected $functions;

    /**
     * Determine if we can create a service with name.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return $this->getFunction($serviceLocator, $requestedName) !== null;
    }

    /**
     * Create service with name.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $functionOptions = $this->getFunction($serviceLocator, $requestedName);
        /** @var Func\FunctionInterface $functionClass */
        $functionClass = isset($functionOptions['function']) ? $functionOptions['function'] : Func\StandardFunction::CLASS;

        /** @todo Check if function exists and is of the right type */

        $function = $functionClass::fromOptions(
            $requestedName,
            isset($functionOptions['options']) ? $functionOptions['options'] : array()
        );

        return $function;
    }

    protected function getFunction(ServiceLocatorInterface $serviceLocator, $action)
    {
        $functions = $this->getFunctions($serviceLocator);

        return isset($functions[$action]) ? $functions[$action] : null;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return array
     */
    protected function getFunctions(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        if ($this->functions === null) {
            $adapterOptions = $this->getAdapterOptions($serviceLocator);
            $jobCreationOptions = $adapterOptions->getJobCreation();
            $this->functions = $jobCreationOptions->getFunctions();
        }

        return $this->functions;
    }
}
