<?php

use Detail\FileConversion;
use Detail\FileConversion\Factory;

$scriptsUrl = 'https://raw.githubusercontent.com/detailnet/imagemagick-scripts/master/';

return [
    'service_manager' => [
        'abstract_factories' => [],
        'aliases' => [],
        'invokables' => [],
        'factories' => [
            FileConversion\Client\FileConversionClient::CLASS => Factory\Client\FileConversionClientFactory::CLASS,
            FileConversion\Client\Job\JobBuilder::CLASS => Factory\Client\Job\JobBuilderFactory::CLASS,
            FileConversion\Options\ModuleOptions::CLASS => Factory\Options\ModuleOptionsFactory::CLASS,
            FileConversion\Processing\Adapter\Blitline\FunctionProvider::CLASS
                => Factory\Processing\Adapter\Blitline\FunctionProviderFactory::CLASS,
            FileConversion\Processing\TaskProcessor::CLASS =>Factory\Processing\TaskProcessorFactory::CLASS,
        ],
        'initializers' => [],
        'shared' => [],
    ],
    'detail_fileconversion' => [
        'client' => [
//            'base_uri' => null,
        ],
        'job_builder' => [
            'default_options' => [],
        ],
        'task_processor' => [
            'default_adapter' => 'internal',
            'adapter_factories' => [
                'blitline' => Factory\Processing\Adapter\Blitline\BlitlineAdapterFactory::CLASS,
                'internal' => Factory\Processing\Adapter\Internal\InternalAdapterFactory::CLASS,
            ],
            'adapters' => [
                'blitline' => [
                    'client' => Detail\Blitline\BlitlineClient::CLASS,
                    'options' => [
                    ],
                    'job_creation' => [
//                        'creator' => '',
                        // Function presets stored by action name
                        'functions' => [
                            'thumbnail' => [
                                'function' => FileConversion\Processing\Adapter\Blitline\Func\ScriptFunction::CLASS,
                                'options' => [
                                    'files' => [
                                        // The script
                                        'script' => $scriptsUrl . 'convert_image.sh',
                                        // The target color profile for the script
                                        'srgb_profile' => $scriptsUrl . 'profiles/sRGB.icm',
                                        // The default CMYK source color profile for the script
                                        'cmyk_profile' => $scriptsUrl . 'profiles/Apple_Generic_CMYK_Profile.icc',
                                    ],
                                    // See:
                                    // - http://www.blitline.com/docs/scripts
                                    //   For usage of the script function
                                    // - https://github.com/detailnet/imagemagick-scripts
                                    //   For usage of the conversion script
                                    'executable' => 'convert_image.sh',
                                    // Key is the option name; order is relevant for building the command
                                    'executable_options' => [
                                        // Input file
                                        'input_file' => [
                                            'argument' => 'i',
                                            'type' => 'value',
                                            'value' => 'input.png',
                                        ],
                                        // Target profile
                                        'target_profile_file' => [
                                            'argument' => 'pt',
                                            'type' => 'value',
                                            'value' => 'sRGB.icm', // Make sure it's available via "files"
                                        ],
                                        // Source profile for CMYK images without profile
                                        'cmyk_source_profile_file' => [
                                            'argument' => 'psc',
                                            'type' => 'value',
                                            'value' => 'Apple_Generic_CMYK_Profile.icc', // Make sure it's available via "files"
                                        ],
                                        // Page
                                        'page' => [
                                            'argument' => 'p',
                                            'type' => 'value',
                                            'value' => 0,
                                        ],
                                        // PostScript formats
                                        'postscript_formats' => [
                                            'argument' => 'fp',
                                            'type' => 'value',
                                            'value' => 'EPDF,EPI,EPS,EPSF,EPSI,PDF,PDFA,PS',
                                        ],
                                        // Vector formats
                                        'vector_formats' => [
                                            'argument' => 'fv',
                                            'type' => 'value',
                                            'value' => 'MSVG,SVG,SVGZ,AI,PCT,PICT',
                                        ],
                                        // Size
                                        'size' => [
                                            'argument' => 's',
                                            'type' => 'value',
                                            'value' => '300x300>',
                                        ],
                                        // Density (output)
                                        'density' => [
                                            'argument' => 'd',
                                            'type' => 'value',
                                            'value' => 72,
                                        ],
                                        // Quality
                                        'quality' => [
                                            'argument' => 'q',
                                            'type' => 'value',
                                            'value' => 80,
                                        ],
                                        // Background
                                        'background' => [
                                            'argument' => 'b',
                                            'type' => 'value',
                                            'value' => 'white',
                                        ],
                                        // Alpha
                                        'alpha' => [
                                            'argument' => 'a',
                                            'type' => 'value',
                                            'value' => 'remove',
                                        ],
                                        // Output file
                                        'output_file' => [
                                            'argument' => 'o',
                                            'type' => 'value',
                                            'value' => 'jpg:output.png',
                                        ],
                                        // The script convert_image.sh passes the additional options not handled by himself
                                        // to the underlying ImageMagick's conversion
                                        // Strip all profiles before output generation (hast to be the very last command)
                                        'strip' => [
                                            'argument' => 'strip',
                                            'type' => 'plain',
                                            'enabled' => false,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'internal' => [
                    'client' => FileConversion\Client\FileConversionClient::CLASS,
                    'options' => [
                    ],
                    'job_creation' => [
//                        'creator' => '',
                    ],
                ],
            ],
            'pause_on_incident' => false,
        ],
    ],
];
