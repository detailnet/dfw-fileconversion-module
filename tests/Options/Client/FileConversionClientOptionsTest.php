<?php

namespace DetailTest\FileConversion\Options\Client;

use DetailTest\FileConversion\Options\OptionsTestCase;

use Detail\FileConversion\Options\Client\FileConversionClientOptions;

class FileConversionClientOptionsTest extends OptionsTestCase
{
    /**
     * @var FileConversionClientOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            FileConversionClientOptions::CLASS,
            [
                'getBaseUrl',
                'setBaseUrl',
            ]
        );
    }

    public function testBaseUrlCanBeSet(): void
    {
        $baseUrl = 'some-url';

        $this->assertNull($this->options->getBaseUrl());

        $this->options->setBaseUrl($baseUrl);

        $this->assertEquals($baseUrl, $this->options->getBaseUrl());
    }
}
