# Zend Framework 2 Module for dfw-fileconversion

[![Build Status](https://travis-ci.org/detailnet/dfw-fileconversion-module.svg?branch=master)](https://travis-ci.org/detailnet/dfw-fileconversion-module)
[![Coverage Status](https://img.shields.io/coveralls/detailnet/dfw-fileconversion-module.svg)](https://coveralls.io/r/detailnet/dfw-fileconversion-module)
[![Latest Stable Version](https://poser.pugx.org/detailnet/dfw-fileconversion-module/v/stable.svg)](https://packagist.org/packages/detailnet/dfw-fileconversion-module)
[![Latest Unstable Version](https://poser.pugx.org/detailnet/dfw-fileconversion-module/v/unstable.svg)](https://packagist.org/packages/detailnet/dfw-fileconversion-module)

## Introduction
This module integrates the [DETAIL Framework library for file conversion](https://github.com/detailnet/dfw-fileconversion) with [Zend Framework 2](https://github.com/zendframework/zf2).

## Requirements
[Zend Framework 2 Skeleton Application](http://www.github.com/zendframework/ZendSkeletonApplication) (or compatible architecture)

## Installation
Install the module through [Composer](http://getcomposer.org/) using the following steps:

  1. `cd my/project/directory`
  
  2. Create a `composer.json` file with following contents (or update your existing file accordingly):

     ```json
     {
         "require": {
             "detailnet/dfw-fileconversion-module": "1.x-dev"
         }
     }
     ```
  3. Install Composer via `curl -s http://getcomposer.org/installer | php` (on Windows, download
     the [installer](http://getcomposer.org/installer) and execute it with PHP)
     
  4. Run `php composer.phar self-update`
     
  5. Run `php composer.phar install`
  
  6. Open `configs/application.config.php` and add following key to your `modules`:

     ```php
     'Detail\FileConversion',
     ```

  7. Copy `vendor/detailnet/dfw-fileconversion-module/config/detail_fileconversion.local.php.dist` into your application's
     `config/autoload` directory, rename it to `detail_fileconversion.local.php` and make the appropriate changes.

## Usage
tbd
