<?php

namespace Detail\FileConversion\Options\Processing;

use Detail\Core\Options\AbstractOptions;

class TaskProcessorOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $defaultAdapter;

    /**
     * @var array
     */
    protected $adapterFactories = array();

    /**
     * @return string
     */
    public function getDefaultAdapter()
    {
        return $this->defaultAdapter;
    }

    /**
     * @param string $defaultAdapter
     */
    public function setDefaultAdapter($defaultAdapter)
    {
        $this->defaultAdapter = $defaultAdapter;
    }

    /**
     * @return array
     */
    public function getAdapterFactories()
    {
        return $this->adapterFactories;
    }

    /**
     * @param array $adapterFactories
     */
    public function setAdapterFactories(array $adapterFactories)
    {
        $this->adapterFactories = $adapterFactories;
    }
}
