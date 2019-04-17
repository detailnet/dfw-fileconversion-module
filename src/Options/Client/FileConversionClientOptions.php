<?php

namespace Detail\FileConversion\Options\Client;

use Zend\Stdlib\AbstractOptions;

class FileConversionClientOptions extends AbstractOptions
{
    /** @var string|null */
    protected $baseUri;

    /**  @var string|null */
    protected $dwsAppId;

    /** @var string|null */
    protected $dwsAppKey;

    /** @var array */
    protected $httpOptions = [];

    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return string
     * @deprecated Use {@see getBaseUri()} instead
     */
    public function getBaseUrl(): ?string
    {
        return $this->getBaseUri();
    }

    /**
     * @param string $baseUrl
     * @deprecated Use {@see setBaseUri()} instead
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->setBaseUri($baseUrl);
    }

    public function getDwsAppId(): ?string
    {
        return $this->dwsAppId;
    }

    public function setDwsAppId(?string $dwsAppId): void
    {
        $this->dwsAppId = $dwsAppId;
    }

    public function getDwsAppKey(): ?string
    {
        return $this->dwsAppKey;
    }

    public function setDwsAppKey(?string $dwsAppKey): void
    {
        $this->dwsAppKey = $dwsAppKey;
    }

    public function getHttpOptions(): array
    {
        return $this->httpOptions;
    }

    public function setHttpOptions(array $options): void
    {
        $this->httpOptions = $options;
    }
}
