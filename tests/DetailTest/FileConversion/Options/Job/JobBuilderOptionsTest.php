<?php

namespace DetailTest\FileConversion\Options\Job;

use DetailTest\FileConversion\Options\OptionsTestCase;

class JobBuilderOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\FileConversion\Options\Job\JobBuilderOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Detail\FileConversion\Options\Job\JobBuilderOptions',
            array(
                'getDefaultOptions',
                'setDefaultOptions',
                'getJobClass',
                'setJobClass',
                'getActionClass',
                'setActionClass',
            )
        );
    }

    public function testDefaultOptionsCanBeSet()
    {
        $defaultOptions = array('key' => 'value');

        $this->assertTrue(is_array($this->options->getDefaultOptions()));

        $this->options->setDefaultOptions($defaultOptions);

        $this->assertEquals($defaultOptions, $this->options->getDefaultOptions());
    }

    public function testJobClassCanBeSet()
    {
        $jobClass = 'SomeClass';

        $this->assertNull($this->options->getJobClass());

        $this->options->setJobClass($jobClass);

        $this->assertEquals($jobClass, $this->options->getJobClass());
    }

    public function testActionClassCanBeSet()
    {
        $actionClass = 'SomeClass';

        $this->assertNull($this->options->getActionClass());

        $this->options->setActionClass($actionClass);

        $this->assertEquals($actionClass, $this->options->getActionClass());
    }
}
