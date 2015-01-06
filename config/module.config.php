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
            'Detail\FileConversion\Job\JobBuilder'              => 'Detail\FileConversion\Factory\Job\JobBuilderFactory',
            'Detail\FileConversion\Options\ModuleOptions'       => 'Detail\FileConversion\Factory\Options\ModuleOptionsFactory',
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
    ),
);
