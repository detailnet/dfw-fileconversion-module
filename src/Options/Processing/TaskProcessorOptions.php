<?php

namespace Detail\FileConversion\Options\Processing;

use DateInterval;

use Zend\Stdlib\AbstractOptions;

use Detail\FileConversion\Exception;

class TaskProcessorOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $defaultAdapter;

    /**
     * @var array
     */
    protected $adapterFactories = [];

    /**
     * @var array
     */
    protected $adapters = [];

    /**
     * @var DateInterval|false
     */
    protected $pauseOnIncident = false;

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

    /**
     * @param string $type
     * @param string $optionsClass
     * @return array|AbstractOptions|null
     * @throws Exception\RuntimeException
     */
    public function getAdapter($type, $optionsClass = null)
    {
        $adapters = $this->getAdapters();
        $adapter = null;

        if (isset($adapters[$type])) {
            $adapter = $adapters[$type];

            if ($optionsClass !== null) {
                if (!class_exists($optionsClass)) {
                    throw new Exception\RuntimeException(
                        sprintf(
                            'Options class "%s" for adapter type "%s" does not exist',
                            $optionsClass,
                            $type
                        )
                    );
                }

                $adapter = new $optionsClass($adapter);
            }
        }

        return $adapter;
    }

    /**
     * @return array
     */
    public function getAdapters()
    {
        return $this->adapters;
    }

    /**
     * @param array $adapters
     */
    public function setAdapters(array $adapters)
    {
        $this->adapters = $adapters;
    }

    /**
     * @return DateInterval|false
     */
    public function getPauseOnIncident()
    {
        return $this->pauseOnIncident;
    }

    /**
     * @param DateInterval|false $pauseOnIncident
     */
    public function setPauseOnIncident($pauseOnIncident)
    {
        if (is_string($pauseOnIncident)) {
            $pauseOnIncident = DateInterval::createFromDateString($pauseOnIncident);
        } elseif (!$pauseOnIncident instanceof DateInterval && $pauseOnIncident !== false) {
            throw new Exception\RuntimeException(
                'Config options "pause_on_incident" must be false, a valid date string or DateInterval object'
            );
        }

        $this->pauseOnIncident = $pauseOnIncident;
    }
}
