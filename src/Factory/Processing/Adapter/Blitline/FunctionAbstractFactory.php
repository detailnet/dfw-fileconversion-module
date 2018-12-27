<?php

namespace Detail\FileConversion\Factory\Processing\Adapter\Blitline;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\AbstractFactoryInterface;

use Detail\FileConversion\Processing\Adapter\Blitline\Func;

class FunctionAbstractFactory implements
    AbstractFactoryInterface
{
    use BlitlineAdapterOptionsTrait;

    /**
     * @var array|null
     */
    private $functions;

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return $this->getFunction($container, $requestedName) !== null;
    }

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Func\FunctionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $functionOptions = $this->getFunction($container, $requestedName);
        /** @var Func\FunctionInterface $functionClass */
        $functionClass = isset($functionOptions['function']) ? $functionOptions['function'] : Func\StandardFunction::CLASS;

        /** @todo Check if function exists and is of the right type */

        $function = $functionClass::fromOptions(
            $requestedName,
            isset($functionOptions['options']) ? $functionOptions['options'] : []
        );

        return $function;
    }

    private function getFunction(ContainerInterface $container, string $action): array
    {
        $functions = $this->getFunctions($container);

        return isset($functions[$action]) ? $functions[$action] : null;
    }

    private function getFunctions(ContainerInterface $container): array
    {
        if ($this->functions === null) {
            $adapterOptions = $this->getAdapterOptions($container);
            $jobCreationOptions = $adapterOptions->getJobCreation();
            $this->functions = $jobCreationOptions->getFunctions();
        }

        return $this->functions;
    }
}
