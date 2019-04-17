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
        $options = [
            'base_uri' => 'https://some.url',
            'dws_app_id' => 'some-app-id',
            'dws_app_key' => null,
            'http_options' => [
                'timeout' => 123,
                'verify' => false,
            ],
        ];

        $client = $this->createFileConversionClient($options);
        $httpClient = $client->getHttpClient();

        $this->assertEquals($options['base_uri'], $client->getServiceUrl());
        $this->assertEquals($options['dws_app_id'], $client->getServiceAppId());
        $this->assertNull($client->getServiceAppKey());
        $this->assertEquals($options['http_options']['timeout'], $httpClient->getConfig('timeout'));
        $this->assertEquals($options['http_options']['verify'], $httpClient->getConfig('verify'));
    }

    private function createFileConversionClient(array $clientOptions): Client\FileConversionClient
    {
        $clientOptions = new Options\Client\FileConversionClientOptions($clientOptions);
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
