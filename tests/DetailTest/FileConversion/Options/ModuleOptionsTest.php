<?php

namespace DetailTest\FileConversion\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\FileConversion\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Detail\FileConversion\Options\ModuleOptions',
            array(
                'getClient',
                'setClient',
                'getJobBuilder',
                'setJobBuilder',
            )
        );
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

    public function testJobBuilderCanBeSet()
    {
        $jobBuilderOptions = array('default_options' => array('key' => 'value'));

        $this->assertNull($this->options->getJobBuilder());

        $this->options->setJobBuilder($jobBuilderOptions);

        $jobBuilder = $this->options->getJobBuilder();

        $this->assertInstanceOf('Detail\FileConversion\Options\Job\JobBuilderOptions', $jobBuilder);
        $this->assertEquals($jobBuilderOptions['default_options'], $jobBuilder->getDefaultOptions());
    }
}
