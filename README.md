# Laravel JSON API Response to Object Mapper

[![Stable Version](https://img.shields.io/packagist/v/porifa/jarason.svg?style=flat)](https://packagist.org/packages/porifa/jarason)
[![GitHub Tests Action Status](<https://img.shields.io/github/actions/workflow/status/porifa/jarason/pest.yml?label=Tests%20(Pest)>)](https://github.com/porifa/jarason/actions?query=workflow%3Apest+branch%3Amain)
[![GitHub Code Style Action Status](<https://img.shields.io/github/actions/workflow/status/porifa/jarason/pint.yml?label=Code%20Style%20(Pint)>)](https://github.com/porifa/jarason/actions?query=workflow%3A"Pint"+branch%3Amain)

<!-- [![StyleCI](https://github.styleci.io/repos/556416263/shield?style=flat&branch=main)](https://github.styleci.io/repos/556416263?branch=main) -->
<!-- [![Quality Score](https://img.shields.io/scrutinizer/g/porifa/jarason.svg?style=flat)](https://scrutinizer-ci.com/g/porifa/jarason) -->

[![Downloads](https://img.shields.io/packagist/dt/porifa/jarason.svg?style=flat)](https://packagist.org/packages/porifa/jarason)
[![License](https://img.shields.io/packagist/l/porifa/jarason.svg?style=flat)](https://packagist.org/packages/porifa/jarason)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require porifa/jarason
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="jarason-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$jarason = new Porifa\Jarason();
echo $jarason->echoPhrase('Hello, Porifa!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/porifa/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Aamir Sohail KmAs](https://github.com/AamirSohailKmAs)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
