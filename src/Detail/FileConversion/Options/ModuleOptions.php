<?php

namespace Detail\FileConversion\Options;

use Detail\Core\Options\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var Client\FileConversionClientOptions
     */
    protected $client;

    /**
     * @var Job\JobBuilderOptions
     */
    protected $jobBuilder;

    /**
     * @var Processing\TaskProcessorOptions
     */
    protected $taskProcessor;

    /**
     * @return Client\FileConversionClientOptions
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param array $client
     */
    public function setClient(array $client)
    {
        $this->client = new Client\FileConversionClientOptions($client);
    }

    /**
     * @return Job\JobBuilderOptions
     */
    public function getJobBuilder()
    {
        return $this->jobBuilder;
    }

    /**
     * @param array $jobBuilder
     */
    public function setJobBuilder(array $jobBuilder)
    {
        $this->jobBuilder = new Job\JobBuilderOptions($jobBuilder);
    }

    /**
     * @return Processing\TaskProcessorOptions
     */
    public function getTaskProcessor()
    {
        return $this->taskProcessor;
    }

    /**
     * @param array $taskProcessor
     */
    public function setTaskProcessor(array $taskProcessor)
    {
        $this->taskProcessor = new Processing\TaskProcessorOptions($taskProcessor);
    }
}
