# Composer template

[![Packagist](https://img.shields.io/packagist/dt/TFarla/changelog-parser.svg?style=flat-square)](https://packagist.org/packages/tfarla/changelog-parser)
[![Travis](https://img.shields.io/travis/TFarla/changelog-parser.svg?style=flat-square)](https://travis-ci.org/TFarla/changelog-parser)
[![Coveralls github](https://img.shields.io/coveralls/github/TFarla/changelog-parser.svg?style=flat-square)](https://coveralls.io/github/TFarla/changelog-parser)
[![Read the Docs](https://img.shields.io/readthedocs/changelog-parser.svg?style=flat-square)](http://changelog-parser.readthedocs.io/en/latest/index.html)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://opensource.org/licenses/MIT)

Making development of composer libraries easy with this cloneable template which includes:

- continuous integration ([travis ci](https://travis-ci.org/))
- code coverage ([coveralls](https://coveralls.io/))
- static analysis ([phpstan](https://github.com/phpstan/phpstan))
- mess detector ([phpmd](https://phpmd.org/))
- testing framework ([phpunit](https://phpunit.de/))
- php code sniffer which enforces the [psr-2 standard](https://www.php-fig.org/psr/psr-2/) ([phpcs](https://github.com/squizlabs/PHP_CodeSniffer))
- composer configuration with [psr-4 autoloading](https://www.php-fig.org/psr/psr-4/)
- [a changelog](https://keepachangelog.com/en/1.0.0/)
- MIT license (not sure about what license you need? https://choosealicense.com/)
- documentation using [sphinx](http://www.sphinx-doc.org/en/master/)
- issue and pull request template
- badges from http://shields.io/

## Requirements
- php 7.1 or greater ([supported versions](http://php.net/supported-versions.php))
- python & pip to create documentation
- composer

## Installation

The following command will clone this template and place it in the `my-library` directory

```bash
composer require tfarla/changelog-parser
```

## Usage

## Contributing
Thanks for reading this far into the README and considering contributing to this project.
If you have any questions or suggestions feel free to create an issue.

If you want to modify the code then please follow these steps:

1. Fork it (https://github.com/TFarla/changelog-parser)
2. Create your feature branch (git checkout -b feature/fooBar)
3. Commit your changes (git commit -am 'Add some fooBar')
4. Push to the branch (git push origin feature/fooBar)
5. Create a new Pull Request