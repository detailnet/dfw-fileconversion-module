<?php

namespace Detail\FileConversion\Options\Processing\Adapter\Blitline;

use Detail\FileConversion\Options\Processing\Adapter\GenericAdapterOptions;

class BlitlineAdapterOptions extends GenericAdapterOptions
{
    /**
     * @var BlitlineJobCreationOptions
     */
    protected $jobCreation;

    /**
     * @return BlitlineJobCreationOptions
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
        $this->jobCreation = new BlitlineJobCreationOptions($jobCreation);
    }
}
