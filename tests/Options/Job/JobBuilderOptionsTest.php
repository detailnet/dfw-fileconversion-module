<?php

namespace DetailTest\FileConversion\Options\Job;

use DetailTest\FileConversion\Options\OptionsTestCase;

use Detail\FileConversion\Options\Job\JobBuilderOptions;

class JobBuilderOptionsTest extends OptionsTestCase
{
    /**
     * @var JobBuilderOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            JobBuilderOptions::CLASS,
            [
                'getDefaultOptions',
                'setDefaultOptions',
                'getJobClass',
                'setJobClass',
                'getActionClass',
                'setActionClass',
            ]
        );
    }

    public function testDefaultOptionsCanBeSet(): void
    {
        $defaultOptions = ['key' => 'value'];

        $this->assertTrue(is_array($this->options->getDefaultOptions()));

        $this->options->setDefaultOptions($defaultOptions);

        $this->assertEquals($defaultOptions, $this->options->getDefaultOptions());
    }

    public function testJobClassCanBeSet(): void
    {
        $jobClass = 'SomeClass';

        $this->assertNull($this->options->getJobClass());

        $this->options->setJobClass($jobClass);

        $this->assertEquals($jobClass, $this->options->getJobClass());
    }

    public function testActionClassCanBeSet(): void
    {
        $actionClass = 'SomeClass';

        $this->assertNull($this->options->getActionClass());

        $this->options->setActionClass($actionClass);

        $this->assertEquals($actionClass, $this->options->getActionClass());
    }
}
