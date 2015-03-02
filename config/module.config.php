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
            'Detail\FileConversion\Client\Job\JobBuilder' => 'Detail\FileConversion\Factory\Client\Job\JobBuilderFactory',
            'Detail\FileConversion\Options\ModuleOptions' => 'Detail\FileConversion\Factory\Options\ModuleOptionsFactory',
            'Detail\FileConversion\Processing\Adapter\Blitline\FunctionProvider' => 'Detail\FileConversion\Factory\Processing\Adapter\Blitline\FunctionProviderFactory',
            'Detail\FileConversion\Processing\TaskProcessor' => 'Detail\FileConversion\Factory\Processing\TaskProcessorFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'detail_fileconversion' => array(
        'client' => array(
            'base_url' => 'http://fileconversion.dws.detailnet.ch/api',
        ),
        'job_builder' => array(
            'default_options' => array(),
        ),
        'task_processor' => array(
            'default_adapter' => 'internal',
            'adapter_factories' => array(
                'blitline' => 'Detail\FileConversion\Factory\Processing\Adapter\Blitline\BlitlineAdapterFactory',
                'internal' => 'Detail\FileConversion\Factory\Processing\Adapter\Internal\InternalAdapterFactory',
            ),
            'adapters' => array(
                'blitline' => array(
                    'client' => 'Detail\Blitline\Client\BlitlineClient',
                    'options' => array(
                    ),
                    'job_creation' => array(
//                        'creator' => '',
                        // Function presets stored by action name
                        'functions' => array(
                            'thumbnail' => array(
                                'function' => 'Detail\FileConversion\Processing\Adapter\Blitline\Func\ScriptFunction',
                                'options' => array(
                                    'files' => array(
                                        // The script
                                        'script' => 'https://raw.githubusercontent.com/detailnet/imagemagick-scripts/master/convert_image.sh',
                                        // The target color profile for the script
                                        'srgb_profile' => 'https://raw.githubusercontent.com/detailnet/imagemagick-scripts/master/profiles/sRGB.icm',
                                    ),
                                    // See:
                                    // - http://www.blitline.com/docs/scripts
                                    //   For usage of the script function
                                    // - https://github.com/detailnet/imagemagick-scripts
                                    //   For usage of the conversion script
                                    'executable' => 'convert_image.sh',
                                    // Key is the option name; order is relevant for building the command
                                    'executable_options' => array(
                                        // Input file
                                        'input_file' => array(
                                            'argument' => 'i',
                                            'type' => 'value',
                                            'value' => 'input.png',
                                        ),
                                        // Target profile
                                        'target_profile_file' => array(
                                            'argument' => 't',
                                            'type' => 'value',
                                            'value' => 'sRGB.icm', // Make sure it's available via "files"
                                        ),
                                        // Page
                                        'page' => array(
                                            'argument' => 'p',
                                            'type' => 'value',
                                            'value' => 0,
                                        ),
                                        // Vector formats
                                        'vector_formats' => array(
                                            'argument' => 'fv',
                                            'type' => 'value',
                                            'value' => 'MSVG,SVG,SVGZ,AI,EPI,EPSF,EPSI,PCT,PDFA,PICT,PS',
                                        ),
                                        // Size
                                        'size' => array(
                                            'argument' => 's',
                                            'type' => 'value',
                                            'value' => '300x300>',
                                        ),
                                        // Density (output)
                                        'density' => array(
                                            'argument' => 'd',
                                            'type' => 'value',
                                            'value' => 72,
                                        ),
                                        // Quality
                                        'quality' => array(
                                            'argument' => 'q',
                                            'type' => 'value',
                                            'value' => 80,
                                        ),
                                        // Background
                                        'background' => array(
                                            'argument' => 'b',
                                            'type' => 'value',
                                            'value' => 'white',
                                        ),
                                        // Alpha
                                        'alpha' => array(
                                            'argument' => 'a',
                                            'type' => 'value',
                                            'value' => 'remove',
                                        ),
                                        // Output file
                                        'output_file' => array(
                                            'argument' => 'o',
                                            'type' => 'value',
                                            'value' => 'output.png',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'internal' => array(
                    'client' => 'Detail\FileConversion\Client\FileConversionClient',
                    'options' => array(
                    ),
                    'job_creation' => array(
//                        'creator' => '',
                    ),
                ),
            ),
            'pause_on_incident' => false,
        ),
    ),
);
