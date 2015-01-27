<?php

namespace Application\Job\WebModule\Factory\JobProcessing\Adapter;

use Zend\ServiceManager\ServiceLocatorInterface;

use Application\Job\Application\JobProcessing\Adapter\BlitlineAdapter as Adapter;
use Application\Job\WebModule\Options\JobProcessing\Adapter\BlitlineAdapterOptions as Options;

class BlitlineAdapterFactory implements
    AdapterFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createAdapter(ServiceLocatorInterface $serviceLocator, array $config)
    {
        $options = new Options($config);

        /** @var \Detail\Blitline\Client\BlitlineClient $blitlineClient */
        $blitlineClient = $serviceLocator->get($options->getBlitlineClient());

        $adapter = new Adapter(
            $blitlineClient,
            array(
                Adapter::OPTION_POSTBACK_URL => $options->getPostbackUrl(),
            )
        );

        return $adapter;
    }
}
