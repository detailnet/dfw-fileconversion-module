<?php

namespace DetailTest\FileConversion\Options\Client;

use DetailTest\FileConversion\Options\OptionsTestCase;

use Detail\FileConversion\Options\Client\FileConversionClientOptions;

class FileConversionClientOptionsTest extends OptionsTestCase
{
    public function testBaseUriCanBeSet(): void
    {
        $uri = 'https://some.url';

        $options = new FileConversionClientOptions(['base_uri' => $uri]);

        $this->assertEquals($uri, $options->getBaseUri());
    }

    public function testBaseUrlIsStillSupported(): void
    {
        $uri = 'https://some.url';

        $options = new FileConversionClientOptions(['base_url' => $uri]);

        $this->assertEquals($uri, $options->getBaseUri());
        $this->assertEquals($uri, $options->getBaseUrl());
    }

    public function testDwsAppIdCanBeSet(): void
    {
        $id = 'some-app-id';

        $options = new FileConversionClientOptions(['dws_app_id' => $id]);

        $this->assertEquals($id, $options->getDwsAppId());
    }

    public function testDwsAppKeyCanBeSet(): void
    {
        $id = 'some-app-key';

        $options = new FileConversionClientOptions(['dws_app_key' => $id]);

        $this->assertEquals($id, $options->getDwsAppKey());
    }
}
