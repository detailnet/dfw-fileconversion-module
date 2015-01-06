<?php

namespace DetailTest\FileConversion\Options;

use PHPUnit_Framework_TestCase as TestCase;

class ModuleOptionsTest extends TestCase
{
    /**
     * @var \Detail\FileConversion\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $mockedMethods = array_diff(
            $this->getMethods('Detail\FileConversion\Options\ModuleOptions'),
            array('getApplicationId', 'setApplicationId')
        );

        $this->options = $this->getMock('Detail\FileConversion\Options\ModuleOptions', $mockedMethods);
    }

    public function testApplicationIdCanBeSet()
    {
        $applicationId = 'test-id';

        $this->assertNull($this->options->getApplicationId());

        $this->options->setApplicationId($applicationId);

        $this->assertEquals($applicationId, $this->options->getApplicationId());
    }

    /**
     * Helper to get all public and abstract methods of a class.
     *
     * This includes methods of parent classes.
     *
     * @param string $class
     * @param bool $autoload
     * @return array
     */
    protected function getMethods($class, $autoload = true)
    {
        $methods = array();

        if (class_exists($class, $autoload) || interface_exists($class, $autoload)) {
            $reflector = new \ReflectionClass($class);

            foreach ($reflector->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_ABSTRACT) as $method) {
                $methods[] = $method->getName();
            }
        }

        return $methods;
    }
}
