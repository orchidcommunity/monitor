# Orchid Monitor
[![Build Status](https://travis-ci.org/TheOrchid/Monitor.svg?branch=master)](https://travis-ci.org/TheOrchid/Monitor)
[![Total Downloads](https://poser.pugx.org/orchid/monitor/d/total.svg)](https://packagist.org/packages/orchid/monitor)
[![Latest Stable Version](https://poser.pugx.org/orchid/monitor/v/stable.svg)](https://packagist.org/packages/orchid/monitor)
[![Latest Unstable Version](https://poser.pugx.org/orchid/monitor/v/unstable.svg)](https://packagist.org/packages/orchid/monitor)
[![License](https://poser.pugx.org/orchid/monitor/license.svg)](https://packagist.org/packages/orchid/monitor)

This is the monitor package for Orchid CMS.

 * Board temperature
 * Network status
 * Uptime
 * CPU Load
 * Memory allocation
 * Available storage

## Installation

Pull in the package through Composer.

Run `composer require orchid/monitor` to get the latest stable version of the package.

## Usage

```php
$monitor = new Monitor();

// uname,webserver,phpVersion,cpu
$monitor->info();

// temperature,uptime
$monitor->hardware();

// oneMin,fiveMins,fifteenMins
$monitor->loadAverage();

// total,used,buffers,cache
$monitor->memory();

// down,up
$monitor->network();

// array
$monitor->storage();
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
