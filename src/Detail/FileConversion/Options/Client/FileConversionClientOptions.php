<?php

namespace Detail\FileConversion\Options\Client;

use Detail\Core\Options\AbstractOptions;

class FileConversionClientOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
}
