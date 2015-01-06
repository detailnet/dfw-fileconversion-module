<?php

namespace DetailTest\FileConversion\Options\Client;

use DetailTest\FileConversion\Options\OptionsTestCase;

class FileConversionClientOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\FileConversion\Options\Client\FileConversionClientOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Detail\FileConversion\Options\Client\FileConversionClientOptions',
            array(
                'getBaseUrl',
                'setBaseUrl',
            )
        );
    }

    public function testBaseUrlCanBeSet()
    {
        $baseUrl = 'some-url';

        $this->assertNull($this->options->getBaseUrl());

        $this->options->setBaseUrl($baseUrl);

        $this->assertEquals($baseUrl, $this->options->getBaseUrl());
    }
}
