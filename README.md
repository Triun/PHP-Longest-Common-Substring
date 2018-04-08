PHP - Longest Common Substring
==============================

PHP implementation of an algorithm to solve the `longest common substring` problem.

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Pre Release Version on Packagist][ico-pre-release]][link-packagist]
[![Latest Unstable Version][ico-unstable]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage status][ico-codecov]][link-codecov]
[![Total Downloads][ico-downloads]][link-downloads]
[![The most recent stable version is 2.0.0][ico-semver]][link-semver]
[![Software License][ico-license]](LICENSE.md)

# About

*PHP-Longest-Common-Subsequence* is a PHP implementation of an algorithm to solve the 'longest common substring' problem.

From [Wikipedia - Longest common substring problem](https://en.wikipedia.org/wiki/Longest_common_substring_problem):

> In computer science, the longest common substring problem is to find the longest string (or strings) that is a
> substring (or are substrings) of two or more strings.

# Installation

Require [triun/longest-common-substring package](https://packagist.org/packages/triun/longest-common-substring) with [composer](http://getcomposer.org/)
using the following command:

```bash
composer require triun/longest-common-substring
```

# Usage

## Solver

```php
use Triun\LongestCommonSubstring\Solver;

$solver = new Solver();

$stringA = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
$stringB = '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A';

// calculates the LCSubstring to be '123456789A'
$result = $solver->solve($stringA, $stringB);
```

## Matches solver

```php
use Triun\LongestCommonSubstring\Solver;

$solver = new Solver();

$stringA = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
$stringB = '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A';

$matches = $matchSolver->solve($stringA, $stringB);

// calculates the LCSubstring to be '123456789A'
$result = "$matches";
```


But also can give you the rest of the results which has the same length:

```php
var_dump($matches->values());
```

```
array:12 [
  0 => "123456789A"
  1 => "56789ABCDE"
  2 => "56789ABCDE"
  3 => "123456789A"
  4 => "56789ABCDE"
  5 => "56789ABCDE"
  6 => "123456789A"
  7 => "56789ABCDE"
  8 => "56789ABCDE"
  9 => "123456789A"
  10 => "56789ABCDE"
  11 => "56789ABCDE"
]
```

You can use `unique` to skip duplicated values:

```php
var_dump($matches->unique());
```

```
array:2 [
  0 => "123456789A"
  1 => "56789ABCDE"
]
```

Or even more information about the matches, like the input strings indexes:

```php
var_dump($matches->values());
```

```
array:12 [
  0 => array:3 [
    "value" => "123456789A"
    "length" => 10
    "indexes" => array:2 [
      0 => 1
      1 => 40
    ]
  ]
  1 => array:3 [
    "value" => "56789ABCDE"
    "length" => 10
    "indexes" => array:2 [
      0 => 5
      1 => 7
    ]
  ]
  2 => array:3 [
    "value" => "56789ABCDE"
    "length" => 10
    "indexes" => array:2 [
      0 => 5
      1 => 17
    ]
  ]
  ...
]
```

# Issues
   
Bug reports and feature requests can be submitted on the
[Github Issue Tracker](https://github.com/Triun/PHP-Longest-Common-Substring/issues).

# Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for information.

# License

This repository is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

<!-- References -->

[ico-version]: https://img.shields.io/packagist/v/triun/longest-common-substring.svg
[ico-pre-release]: https://img.shields.io/packagist/vpre/triun/longest-common-substring.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://travis-ci.org/Triun/PHP-Longest-Common-Substring.svg?branch=master
[ico-code-quality]: https://img.shields.io/scrutinizer/g/triun/longest-common-substring.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/triun/longest-common-substring.svg?style=flat-square
[ico-unstable]: https://poser.pugx.org/triun/longest-common-substring/v/unstable
[ico-coveralls]: https://coveralls.io/repos/github/Triun/PHP-Longest-Common-Substring/badge.svg?branch=master "Current test coverage for the develop branch"
[ico-codecov]: https://codecov.io/gh/Triun/PHP-Longest-Common-Substring/branch/master/graph/badge.svg
[ico-semver]: http://img.shields.io/:semver-2.0.0-brightgreen.svg "This project uses semantic versioning"

[link-packagist]: https://packagist.org/packages/triun/longest-common-substring
[link-travis]: https://travis-ci.org/Triun/PHP-Longest-Common-Substring
[link-downloads]: https://packagist.org/packages/triun/longest-common-substring
[link-author]: https://github.com/Triun
[link-coveralls]: https://coveralls.io/github/Triun/PHP-Longest-Common-Substring?branch=master
[link-codecov]: https://codecov.io/gh/Triun/PHP-Longest-Common-Substring
[link-semver]: http://semver.org/