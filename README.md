# 🍦 DIVE flavored Laravel stubs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dive-be/laravel-stubs.svg?style=flat-square)](https://packagist.org/packages/dive-be/laravel-stubs)

- We don't do `down` in migrations.
- Controllers do not extend a base `Controller`.
- Models are not `guarded` because we are mature developers.
- Add type hints wherever possible.
- Removed all of the docblocks.
- All files `declare(strict_types=1)`.
- Traits are defined one per line.
- Console commands return a `SUCCESS` by default.
- `Closures` are `static` wherever possible. Why not squeeze out every bit of performance?
- Fix some minor PSR-12 violations such as `(new MailMessage)` vs. `(new MailMessage())`.

## Installation

You can install the package via composer:

```bash
composer require --dev dive-be/laravel-stubs
```

## Usage

Publish the subs using:

```php
php artisan dive-stubs:publish
```

Add the following snippet to your `composer.json` file to keep your published stubs up-to-date:

```php
"scripts": {
    "post-update-cmd": [
        "@php artisan dive-stubs:publish --overwrite"
    ]
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email oss@dive.be instead of using the issue tracker.

## Credits

- [Muhammed Sari](https://github.com/mabdullahsari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
