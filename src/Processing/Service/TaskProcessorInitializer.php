<?php

namespace Detail\FileConversion\Processing\Service;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Initializer\InitializerInterface;

use Detail\FileConversion\Processing\TaskProcessor;
use Detail\FileConversion\Processing\TaskProcessorAwareInterface;

class TaskProcessorInitializer implements
    InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof TaskProcessorAwareInterface) {
            /** @var TaskProcessor $taskProcessor */
            $taskProcessor = $container->get(TaskProcessor::CLASS);

            $instance->setTaskProcessor($taskProcessor);
        }
    }
}
