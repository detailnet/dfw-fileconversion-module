<?php

namespace DetailTest\FileConversion\Factory\Client;

use PHPUnit\Framework\TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\FileConversion\Client;
use Detail\FileConversion\Factory\Client\FileConversionClientFactory;
use Detail\FileConversion\Options;

class FileConversionClientFactoryTest extends TestCase
{
    public function testCreateService(): void
    {
        $client = $this->createFileConversionClient();

        $this->assertInstanceOf(Client\FileConversionClient::CLASS, $client);
        $this->assertEquals('some-url', $client->getServiceUrl());
    }

    private function createFileConversionClient(): Client\FileConversionClient
    {
        $clientOptions = $this->getMockBuilder(Options\Client\FileConversionClientOptions::CLASS)->getMock();
        $clientOptions
            ->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue(['base_uri' => 'some-url']));

        $moduleOptions = $this->getMockBuilder(Options\ModuleOptions::CLASS)->getMock();
        $moduleOptions
            ->expects($this->any())
            ->method('getClient')
            ->will($this->returnValue($clientOptions));

        $jobBuilder = $this->getMockBuilder(Client\Job\JobBuilder::CLASS)->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService(Options\ModuleOptions::CLASS, $moduleOptions);
        $serviceManager->setService(Client\Job\JobBuilder::CLASS, $jobBuilder);

        $factory = new FileConversionClientFactory();

        return $factory->__invoke($serviceManager, Client\FileConversionClient::CLASS);
    }
}
