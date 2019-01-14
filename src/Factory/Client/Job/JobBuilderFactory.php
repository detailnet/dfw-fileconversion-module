<?php

namespace Detail\FileConversion\Factory\Client\Job;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\FileConversion\Client\Job\JobBuilder;
use Detail\FileConversion\Options\ModuleOptions;

class JobBuilderFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return JobBuilder
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $jobBuilderOptions = $moduleOptions->getJobBuilder();

        $jobBuilder = new JobBuilder();
        $jobBuilder->setDefaultOptions($jobBuilderOptions->getDefaultOptions());

        $jobClass = $jobBuilderOptions->getJobClass();

        if ($jobClass !== null) {
            $jobBuilder->setJobClass($jobClass);
        }

        $actionClass = $jobBuilderOptions->getActionClass();

        if ($actionClass !== null) {
            $jobBuilder->setActionClass($actionClass);
        }

        return $jobBuilder;
    }
}
