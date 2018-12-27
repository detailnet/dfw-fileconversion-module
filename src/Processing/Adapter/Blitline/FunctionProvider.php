<?php

namespace Detail\FileConversion\Processing\Adapter\Blitline;

use Zend\ServiceManager\AbstractPluginManager;

//use Detail\FileConversion\Processing\Exception;

/**
 * Plugin manager implementation for functions.
 *
 * Enforces that functions retrieved are instances of Func\FunctionInterface.
 */
class FunctionProvider extends AbstractPluginManager implements
    FunctionProviderInterface
{
//    /**
//     * Create a new function every time one is requested
//     *
//     * @var bool
//     */
//    protected $sharedByDefault = false;

    /**
     * @var string
     */
    protected $instanceOf = Func\FunctionInterface::CLASS;

    public function hasFunction(string $action): bool
    {
        return $this->has($action);
    }

    public function getFunction(string $action): Func\FunctionInterface
    {
        return $this->get($action);
    }

//    /**
//     * {@inheritDoc}
//     */
//    public function validatePlugin($plugin)
//    {
//        if ($plugin instanceof Func\FunctionInterface) {
//            // We're okay
//            return;
//        }
//
//        throw new Exception\RuntimeException(
//            sprintf(
//                'Function of type %s is invalid; must implement %s',
//                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
//                Func\FunctionInterface::CLASS
//            )
//        );
//    }
}
