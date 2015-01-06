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
            array('getClient', 'setClient', 'getJobBuilder', 'setJobBuilder')
        );

        $this->options = $this->getMock('Detail\FileConversion\Options\ModuleOptions', $mockedMethods);
    }

    public function testClientCanBeSet()
    {
        $clientOptions = array('base_url' => 'some-url');

        $this->assertNull($this->options->getClient());

        $this->options->setClient($clientOptions);

        $client = $this->options->getClient();

        $this->assertInstanceOf('Detail\FileConversion\Options\Client\FileConversionClientOptions', $client);
        $this->assertEquals($clientOptions['base_url'], $client->getBaseUrl());
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
