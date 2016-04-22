<?php

namespace DetailTest\FileConversion\Factory\Client;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Client;
use Detail\FileConversion\Factory\Client\FileConversionClientFactory;
use Detail\FileConversion\Options;

class FileConversionClientFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $client = $this->createFileConversionClient();

        $this->assertInstanceOf(Client\FileConversionClient::CLASS, $client);
        $this->assertEquals('some-url', $client->getServiceUrl());
    }

    protected function createFileConversionClient()
    {
        $clientOptions = $this->getMock(Options\Client\FileConversionClientOptions::CLASS);
        $clientOptions
            ->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue(array('base_url' => 'some-url')));

        $moduleOptions = $this->getMock(Options\ModuleOptions::CLASS);
        $moduleOptions
            ->expects($this->any())
            ->method('getClient')
            ->will($this->returnValue($clientOptions));

        $jobBuilder = $this->getMock(Client\Job\JobBuilder::CLASS);

        $serviceManager = new ServiceManager();
        $serviceManager->setService(Options\ModuleOptions::CLASS, $moduleOptions);
        $serviceManager->setService(Client\Job\JobBuilder::CLASS, $jobBuilder);

        $factory = new FileConversionClientFactory();

        return $factory->createService($serviceManager);
    }
}
