<?php

namespace DetailTest\FileConversion\Factory\Options;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Factory\Client\FileConversionClientFactory;

class FileConversionClientFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $client = $this->createFileConversionClient();

        $this->assertInstanceOf('Detail\FileConversion\Client\FileConversionClient', $client);
    }

    protected function createFileConversionClient()
    {
        $moduleOptions = $this->getMock('Detail\FileConversion\Options\ModuleOptions');
        $moduleOptions
            ->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue(array('application_id' => 'test-id')));

        $jobBuilder = $this->getMock('Detail\FileConversion\Job\JobBuilder');

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Detail\FileConversion\Options\ModuleOptions', $moduleOptions);
        $serviceManager->setService('Detail\FileConversion\Job\JobBuilder', $jobBuilder);

        $factory = new FileConversionClientFactory();

        return $factory->createService($serviceManager);
    }
}
