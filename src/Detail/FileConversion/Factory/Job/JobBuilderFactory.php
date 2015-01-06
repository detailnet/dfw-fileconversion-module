<?php

namespace Detail\FileConversion\Factory\Job;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\FileConversion\Job\JobBuilder;

class JobBuilderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return JobBuilder
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

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
