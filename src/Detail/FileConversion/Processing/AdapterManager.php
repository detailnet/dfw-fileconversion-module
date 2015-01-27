<?php

namespace Detail\FileConversion\Processing;

use Zend\ServiceManager\AbstractPluginManager;

/**
 * Plugin manager implementation for processing adapters.
 *
 * Enforces that adapters retrieved are instances of AdapterInterface.
 */
class AdapterManager extends AbstractPluginManager
    implements AdapterManagerInterface
{
    /**
     * Whether or not to share by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * {@inheritDoc}
     */
    public function has($name, $checkAbstractFactories = true, $usePeeringServiceManagers = true)
    {
        return parent::has($name, $checkAbstractFactories, false); // Don't look in peering service managers
    }

    /**
     * {@inheritDoc}
     */
    public function hasAdapter($name)
    {
        return $this->has($name);
    }

    /**
     * {@inheritDoc}
     */
    public function get($name, $options = array(), $usePeeringServiceManagers = true)
    {
        return parent::get($name, $options, false); // Don't look in peering service managers
    }

    /**
     * {@inheritDoc}
     */
    public function getAdapter($name, $options = array())
    {
        return $this->get($name, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof Adapter\AdapterInterface) {
            // We're okay
            return;
        }

        throw new Exception\RuntimeException(
            sprintf(
                'Sender of type %s is invalid; must implement %s\Adapter\AdapterInterface',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                __NAMESPACE__
            )
        );
    }
}
