<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Exception;

class BlitlineJobCreatorFactory implements
    FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return \Detail\FileConversion\Processing\Adapter\Blitline\BlitlineJobCreatorInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        /** @var \Detail\FileConversion\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\FileConversion\Options\ModuleOptions');

        $taskProcessingOptions = $moduleOptions->getTaskProcessor();

        /** @var \Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions $adapterOptions */
        $adapterOptions = $taskProcessingOptions->getAdapter(
            'blitline',
            'Detail\FileConversion\Options\Processing\Adapter\Blitline\BlitlineAdapterOptions'
        );

        $jobCreationOptions = $adapterOptions->getJobCreation();
        $jobCreatorClass = $jobCreationOptions->getCreator();

        if (!class_exists($jobCreatorClass)) {
            throw new Exception\ConfigException(
                sprintf('Job creator class %s does not exist', $jobCreatorClass)
            );
        }

        /** @var \Detail\FileConversion\Processing\Adapter\Blitline\FunctionProvider $functionProvider */
        $functionProvider = $serviceLocator->get('Detail\FileConversion\Processing\Adapter\Blitline\FunctionProvider');

        /** @var \Detail\FileConversion\Processing\Adapter\Blitline\BlitlineJobCreatorInterface $jobCreator */
        $jobCreator = new $jobCreatorClass($functionProvider);

        return $jobCreator;
    }
}
