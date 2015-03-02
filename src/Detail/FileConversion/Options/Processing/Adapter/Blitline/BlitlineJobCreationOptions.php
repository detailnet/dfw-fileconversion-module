<?php

namespace Detail\FileConversion\Options\Processing\Adapter\Blitline;

use Detail\Core\Options\AbstractOptions;

class BlitlineJobCreationOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $creator;

    /**
     * @var array
     */
    protected $functions;

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

    /**
     * @return array
     */
    public function getFunctions()
    {
        return $this->functions;
    }

    /**
     * @param array $functions
     */
    public function setFunctions(array $functions)
    {
        $this->functions = $functions;
    }
}
