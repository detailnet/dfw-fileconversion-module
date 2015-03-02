<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Detail\FileConversion\Exception;
use Detail\FileConversion\Processing\Adapter\Blitline\BlitlineAdapter as Adapter;

class BlitlineAdapterFactory implements FactoryInterface
{
    use BlitlineAdapterOptionsTrait;

    /**
     * {@inheritDoc}
     * @return Adapter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        $adapterOptions = $this->getAdapterOptions($serviceLocator);

        /** @var \Detail\Blitline\Client\BlitlineClient $client */
        $client = $serviceLocator->get($adapterOptions->getClient());

        $jobCreationOptions = $adapterOptions->getJobCreation();
        $jobCreatorClass = $jobCreationOptions->getCreator();

        if (!$jobCreatorClass) {
            throw new Exception\ConfigException('No Blitline job creator class defined');
        }

        /** @var \Detail\FileConversion\Processing\Adapter\Blitline\BlitlineJobCreatorInterface $jobCreator */
        $jobCreator = $serviceLocator->get($jobCreatorClass);

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
