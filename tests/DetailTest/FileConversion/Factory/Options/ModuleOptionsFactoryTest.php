<?php

namespace DetailTest\FileConversion\Factory\Options;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Exception;
use Detail\FileConversion\Factory\Options\ModuleOptionsFactory;
use Detail\FileConversion\Options;

class ModuleOptionsFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $moduleOptions = $this->createModuleOptions(array('detail_fileconversion' => array()));

        $this->assertInstanceOf(Options\ModuleOptions::CLASS, $moduleOptions);
    }

    public function testCreateServiceThrowsExceptionForInvalidConfiguration()
    {
        $this->setExpectedException(Exception\ConfigException::CLASS);
        $this->createModuleOptions();
    }

    protected function createModuleOptions(array $options = array())
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', $options);

        $factory = new ModuleOptionsFactory();

        return $factory->createService($serviceManager);
    }
}
