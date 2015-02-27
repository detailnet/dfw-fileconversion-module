<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Exception;

class BlitlineJobCreatorAbstractFactory implements
    AbstractFactoryInterface
{
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
        var_dump($name, $requestedName);

        // TODO: Implement canCreateServiceWithName() method.
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
        // TODO: Implement createServiceWithName() method.
    }
}
