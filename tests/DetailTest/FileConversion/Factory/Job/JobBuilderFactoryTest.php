<?php

namespace DetailTest\FileConversion\Factory\Job;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Client;
use Detail\FileConversion\Factory\Client\Job\JobBuilderFactory;
use Detail\FileConversion\Options;

class JobBuilderFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $jobBuilder = $this->createJobBuilder();

        $this->assertInstanceOf(Client\Job\JobBuilder::CLASS, $jobBuilder);
        $this->assertEquals(array('key' => 'value'), $jobBuilder->getDefaultOptions());
        $this->assertEquals('SomeJobClass', $jobBuilder->getJobClass());
        $this->assertEquals('SomeActionClass', $jobBuilder->getActionClass());
    }

    protected function createJobBuilder()
    {
        $jobBuilderOptions = $this->getMock(Options\Job\JobBuilderOptions::CLASS);
        $jobBuilderOptions
            ->expects($this->any())
            ->method('getDefaultOptions')
            ->will($this->returnValue(array('key' => 'value')));

        $jobBuilderOptions
            ->expects($this->any())
            ->method('getJobClass')
            ->will($this->returnValue('SomeJobClass'));

        $jobBuilderOptions
            ->expects($this->any())
            ->method('getActionClass')
            ->will($this->returnValue('SomeActionClass'));

        $moduleOptions = $this->getMock(Options\ModuleOptions::CLASS);
        $moduleOptions
            ->expects($this->any())
            ->method('getJobBuilder')
            ->will($this->returnValue($jobBuilderOptions));

        $serviceManager = new ServiceManager();
        $serviceManager->setService(Options\ModuleOptions::CLASS, $moduleOptions);

        $factory = new JobBuilderFactory();

        return $factory->createService($serviceManager);
    }
}
