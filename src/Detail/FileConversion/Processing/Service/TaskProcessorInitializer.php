<?php

namespace Detail\FileConversion\Processing\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class TaskProcessorInitializer implements
    InitializerInterface
{
    /**
     * Initialize
     *
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof TaskProcessorAwareInterface) {
            if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
                $serviceLocator = $serviceLocator->getServiceLocator();
            }

            /** @var \Detail\FileConversion\Processing\TaskProcessor $taskProcessor */
            $taskProcessor = $serviceLocator->get(
                'Detail\FileConversion\Processing\TaskProcessor'
            );

            $instance->setTaskProcessor($taskProcessor);
        }
    }
}
