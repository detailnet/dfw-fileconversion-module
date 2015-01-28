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
     * @var string
     */
    protected $jobCreator;

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

    /**
     * @return string
     */
    public function getJobCreator()
    {
        return $this->jobCreator;
    }

    /**
     * @param string $jobCreator
     */
    public function setJobCreator($jobCreator)
    {
        $this->jobCreator = $jobCreator;
    }
}
