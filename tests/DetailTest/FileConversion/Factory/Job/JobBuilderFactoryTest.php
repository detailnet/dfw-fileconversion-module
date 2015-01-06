<?php

namespace DetailTest\FileConversion\Factory\Job;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Factory\Job\JobBuilderFactory;

class JobBuilderFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $jobBuilder = $this->createJobBuilder();

        $this->assertInstanceOf('Detail\FileConversion\Job\JobBuilder', $jobBuilder);
        $this->assertEquals(array('key' => 'value'), $jobBuilder->getDefaultOptions());
        $this->assertEquals('SomeJobClass', $jobBuilder->getJobClass());
        $this->assertEquals('SomeActionClass', $jobBuilder->getActionClass());
    }

    protected function createJobBuilder()
    {
        $jobBuilderOptions = $this->getMock('Detail\FileConversion\Options\Job\JobBuilderOptions');
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

        $moduleOptions = $this->getMock('Detail\FileConversion\Options\ModuleOptions');
        $moduleOptions
            ->expects($this->any())
            ->method('getJobBuilder')
            ->will($this->returnValue($jobBuilderOptions));

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Detail\FileConversion\Options\ModuleOptions', $moduleOptions);

        $factory = new JobBuilderFactory();

        return $factory->createService($serviceManager);
    }
}
