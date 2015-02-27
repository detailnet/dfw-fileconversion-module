<?php

namespace Detail\FileConversion\Processing\Adapter\Blitline;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\AbstractPluginManager;

use Detail\FileConversion\Factory\Processing\Adapter\Blitline\FunctionAbstractFactory;
use Detail\FileConversion\Processing\Exception;

/**
 * Plugin manager implementation for functions.
 *
 * Enforces that functions retrieved are instances of Func\FunctionInterface.
 */
class FunctionProvider extends AbstractPluginManager implements
    FunctionProviderInterface
{
    /**
     * @var AbstractFactoryInterface[]
     */
    protected $abstractFactories = array(
        FunctionAbstractFactory::CLASS,
    );

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
     * @param string $action
     * @return boolean
     */
    public function hasFunction($action)
    {
        return $this->has($action);
    }

    /**
     * {@inheritDoc}
     */
    public function get($name, $options = array(), $usePeeringServiceManagers = true)
    {
        return parent::get($name, $options, false); // Don't look in peering service managers
    }

    /**
     * @param string $action
     * @param array $params
     * @return Func\FunctionInterface
     */
    public function getFunction($action, array $params = array())
    {
        return $this->get($action, $params);
    }

    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof Func\FunctionInterface) {
            // We're okay
            return;
        }

        throw new Exception\RuntimeException(
            sprintf(
                'Function of type %s is invalid; must implement %s',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                Func\FunctionInterface::CLASS
            )
        );
    }
}
