<?php

namespace DetailTest\FileConversion\Factory\Job;

use PHPUnit\Framework\TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Client;
use Detail\FileConversion\Factory\Client\Job\JobBuilderFactory;
use Detail\FileConversion\Options;

class JobBuilderFactoryTest extends TestCase
{
    public function testCreateService(): void
    {
        $jobBuilder = $this->createJobBuilder();

        $this->assertInstanceOf(Client\Job\JobBuilder::CLASS, $jobBuilder);
        $this->assertEquals(['key' => 'value'], $jobBuilder->getDefaultOptions());
        $this->assertEquals('SomeJobClass', $jobBuilder->getJobClass());
        $this->assertEquals('SomeActionClass', $jobBuilder->getActionClass());
    }

    private function createJobBuilder(): Client\Job\JobBuilder
    {
        $jobBuilderOptions = $this->getMockBuilder(Options\Job\JobBuilderOptions::CLASS)->getMock();
        $jobBuilderOptions
            ->expects($this->any())
            ->method('getDefaultOptions')
            ->will($this->returnValue(['key' => 'value']));

        $jobBuilderOptions
            ->expects($this->any())
            ->method('getJobClass')
            ->will($this->returnValue('SomeJobClass'));

        $jobBuilderOptions
            ->expects($this->any())
            ->method('getActionClass')
            ->will($this->returnValue('SomeActionClass'));

        $moduleOptions = $this->getMockBuilder(Options\ModuleOptions::CLASS)->getMock();
        $moduleOptions
            ->expects($this->any())
            ->method('getJobBuilder')
            ->will($this->returnValue($jobBuilderOptions));

        $serviceManager = new ServiceManager();
        $serviceManager->setService(Options\ModuleOptions::CLASS, $moduleOptions);

        $factory = new JobBuilderFactory();

        return $factory->__invoke($serviceManager, Client\Job\JobBuilder::CLASS);
    }
}
