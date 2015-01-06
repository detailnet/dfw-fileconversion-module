<?php

namespace Detail\FileConversion\Options\Job;

use Detail\Core\Options\AbstractOptions;

class JobBuilderOptions extends AbstractOptions
{
    /**
     * @var array
     */
    protected $defaultOptions = array();

    /**
     * @var string
     */
    protected $jobClass;

    /**
     * @var string
     */
    protected $actionClass;

    /**
     * @return array
     */
    public function getDefaultOptions()
    {
        return $this->defaultOptions;
    }

    /**
     * @param array $defaultOptions
     */
    public function setDefaultOptions(array $defaultOptions)
    {
        $this->defaultOptions = $defaultOptions;
    }

    /**
     * @return string
     */
    public function getJobClass()
    {
        return $this->jobClass;
    }

    /**
     * @param string $jobClass
     */
    public function setJobClass($jobClass)
    {
        $this->jobClass = $jobClass;
    }

    /**
     * @return string
     */
    public function getActionClass()
    {
        return $this->actionClass;
    }

    /**
     * @param string $actionClass
     */
    public function setActionClass($actionClass)
    {
        $this->actionClass = $actionClass;
    }
}
