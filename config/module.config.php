<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
            'Detail\FileConversion\Job\JobBuilder' => 'Detail\FileConversion\Job\JobBuilder',
        ),
        'factories' => array(
            'Detail\FileConversion\Client\FileConversionClient' => 'Detail\FileConversion\Factory\Client\FileConversionClientFactory',
            'Detail\FileConversion\Options\ModuleOptions' => 'Detail\FileConversion\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'detail_fileconversion' => array(
    ),
);
