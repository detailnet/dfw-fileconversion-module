<?php

namespace Detail\FileConversion\Options\Client;

use Zend\Stdlib\AbstractOptions;

class FileConversionClientOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $dwsAppId;

    /**
     * @var string
     */
    protected $dwsAppKey;

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

    /**
     * @return string
     */
    public function getDwsAppId()
    {
        return $this->dwsAppId;
    }

    /**
     * @param string $dwsAppId
     */
    public function setDwsAppId($dwsAppId)
    {
        $this->dwsAppId = $dwsAppId;
    }

    /**
     * @return string
     */
    public function getDwsAppKey()
    {
        return $this->dwsAppKey;
    }

    /**
     * @param string $dwsAppKey
     */
    public function setDwsAppKey($dwsAppKey)
    {
        $this->dwsAppKey = $dwsAppKey;
    }
}
