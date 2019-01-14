<?php

namespace Detail\FileConversion\Options\Processing\Adapter\Internal;

use Detail\FileConversion\Options\Processing\Adapter\GenericAdapterOptions;

class InternalAdapterOptions extends GenericAdapterOptions
{
    /**
     * @var InternalJobCreationOptions
     */
    protected $jobCreation;

    /**
     * @return InternalJobCreationOptions
     */
    public function getJobCreation()
    {
        return $this->jobCreation;
    }

    /**
     * @param array $jobCreation
     */
    public function setJobCreation(array $jobCreation)
    {
        $this->jobCreation = new InternalJobCreationOptions($jobCreation);
    }
}
