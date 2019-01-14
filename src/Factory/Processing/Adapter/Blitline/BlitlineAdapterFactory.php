<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\FileConversion\Processing\Adapter\Blitline\BlitlineAdapter as Adapter;

class BlitlineAdapterFactory implements
    FactoryInterface
{
    use BlitlineAdapterOptionsTrait;

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Adapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapterOptions = $this->getAdapterOptions($container);

        /** @var \Detail\Blitline\BlitlineClient $client */
        $client = $container->get($adapterOptions->getClient());

        $jobCreationOptions = $adapterOptions->getJobCreation();
        $jobCreatorClass = $jobCreationOptions->getCreator();

        if (!$jobCreatorClass) {
            throw new ServiceNotCreatedException('No Blitline job creator class defined');
        }

        /** @var \Detail\FileConversion\Processing\Adapter\Blitline\BlitlineJobCreatorInterface $jobCreator */
        $jobCreator = $container->get($jobCreatorClass);

        $adapter = new Adapter($client, $jobCreator, $adapterOptions->getOptions());

        return $adapter;
    }
}
