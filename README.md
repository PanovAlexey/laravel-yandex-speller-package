# Yandex speller package

[![Build Status](https://travis-ci.org/PanovAlexey/laravel-yandex-speller-package.svg?branch=master)](https://travis-ci.org/PanovAlexey/laravel-yandex-speller-package) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PanovAlexey/laravel-yandex-speller-package/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PanovAlexey/laravel-yandex-speller-package/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/PanovAlexey/laravel-yandex-speller-package/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/PanovAlexey/laravel-yandex-speller-package/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/PanovAlexey/laravel-yandex-speller-package/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Total Downloads](https://poser.pugx.org/codeblog.pro/laravel-yandex-speller-package/downloads)](https://packagist.org/packages/codeblog.pro/laravel-yandex-speller-package)
[![Version](https://poser.pugx.org/codeblog.pro/laravel-yandex-speller-package/version)](https://packagist.org/packages/codeblog.pro/laravel-yandex-speller-package)

The package includes a tool for correcting typos of user-entered information using the Yandex.Speller service.

The package contains ready-made integration with the Laravel framework. However, this package can be used with any framework or without it at all.
## Install

Via Composer

``` bash
$ composer require codeblog.pro/laravel-yandex-speller-package
```

## Usage

``` php
// Consider the example of a typo in the word "temperature" (tempirature).

// First way: using a GET request at http://<our-domain>/api/yandex-speller/tempirature
// Result: {"source_string":"tempirature","corrected_array":["temperature"]}

// Second way:
$sourceString = 'tempirature';
$yandexSpellerService = new YandexSpellerService();
$yandexSpellerAnswer = $yandexSpellerService->getAnswerByString($sourceString);
var_dump($yandexSpellerAnswer);
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email panov@codeblog.pro instead of using the issue tracker.

## Credits

- [Panov Alexey](https://www.linkedin.com/in/codeblog/)

## License

The Apache License License. Please see [License File](LICENSE) for more information.
