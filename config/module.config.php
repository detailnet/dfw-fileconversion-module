<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'Detail\FileConversion\Client\FileConversionClient' => 'Detail\FileConversion\Factory\Client\FileConversionClientFactory',
            'Detail\FileConversion\Client\Job\JobBuilder'       => 'Detail\FileConversion\Factory\Client\Job\JobBuilderFactory',
            'Detail\FileConversion\Options\ModuleOptions'       => 'Detail\FileConversion\Factory\Options\ModuleOptionsFactory',
            'Detail\FileConversion\Processing\TaskProcessor'    => 'Detail\FileConversion\Factory\Processing\TaskProcessorFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'detail_fileconversion' => array(
        'client' => array(
            'base_url' => 'https://file-conversion.dws.detailnet.ch/api',
        ),
        'job_builder' => array(
            'default_options' => array(),
        ),
        'task_processor' => array(
            'default_adapter' => 'internal',
            'adapter_factories' => array(
                'blitline' => 'Detail\FileConversion\Factory\Processing\Adapter\BlitlineAdapterFactory',
                'internal' => 'Detail\FileConversion\Factory\Processing\Adapter\InternalAdapterFactory',
            ),
            'adapters' => array(
                'blitline' => array(
                    'client' => 'Detail\Blitline\Client\BlitlineClient',
                    'options' => array(
                    ),
//                    'job_creator' => '',
                ),
                'internal' => array(
                    'client' => 'Detail\FileConversion\Client\FileConversionClient',
                    'options' => array(
                    ),
//                    'job_creator' => '',
                ),
            ),
        ),
    ),
);
