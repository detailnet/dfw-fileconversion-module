<?php

namespace Detail\FileConversion\Processing;

use Zend\ServiceManager\AbstractPluginManager;

class AdapterManager extends AbstractPluginManager implements
    AdapterManagerInterface
{
    /**
     * @var string
     */
    protected $instanceOf = Adapter\AdapterInterface::CLASS;

    public function hasAdapter(string $name): bool
    {
        return $this->has($name);
    }

    public function getAdapter(string $name, array $options = []): Adapter\AdapterInterface
    {
        return $this->get($name, $options);
    }

//    /**
//     * {@inheritDoc}
//     */
//    public function validatePlugin($plugin)
//    {
//        if ($plugin instanceof Adapter\AdapterInterface) {
//            // We're okay
//            return;
//        }
//
//        throw new Exception\RuntimeException(
//            sprintf(
//                'Adapter of type %s is invalid; must implement %s\Adapter\AdapterInterface',
//                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
//                __NAMESPACE__
//            )
//        );
//    }
}
