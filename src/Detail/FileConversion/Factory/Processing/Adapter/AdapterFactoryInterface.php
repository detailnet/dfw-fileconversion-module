<?php

namespace Application\Job\WebModule\Factory\JobProcessing\Adapter;

use Zend\ServiceManager\ServiceLocatorInterface;

interface AdapterFactoryInterface
{
    /**
     * Create adapter.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param array $config
     * @return \Application\Job\Application\JobProcessing\Adapter\AdapterInterface
     */
    public function createAdapter(ServiceLocatorInterface $serviceLocator, array $config);
} 
