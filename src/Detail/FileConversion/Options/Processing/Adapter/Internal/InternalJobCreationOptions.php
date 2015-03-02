<?php

namespace Detail\FileConversion\Options\Processing\Adapter\Internal;

use Detail\Core\Options\AbstractOptions;

class InternalJobCreationOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $creator;

    /**
     * @return string
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param string $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }
}
