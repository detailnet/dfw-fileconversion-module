<?php

namespace Detail\FileConversion\Options\Processing\Adapter;

use Detail\Core\Options\AbstractOptions;

class GenericAdapterOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $client;

    /**
     * @var array
     */
    protected $options = array();

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}
