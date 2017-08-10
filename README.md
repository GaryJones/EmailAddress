# EmailAddress

[![Build Status](https://travis-ci.org/GaryJones/EmailAddress.svg?branch=develop)](https://travis-ci.org/GaryJones/EmailAddress) [![GitHub version](https://badge.fury.io/gh/GaryJones%2FEmailAddress.svg)](https://badge.fury.io/gh/GaryJones%2FEmailAddress)

## Why? [![start with why](https://img.shields.io/badge/start%20with-why%3F-brightgreen.svg?style=flat)](http://www.ted.com/talks/simon_sinek_how_great_leaders_inspire_action)

According to Martin Fowler, a [Value Object](http://martinfowler.com/bliki/ValueObject.html) is:

> A small simple object, like money or a date range, whose equality isn't based on identity

Kacper Gunia [explains](https://kacper.gunia.me/ddd-building-blocks-in-php-value-object/) further:

> The most important thing is that these objects reflect the language you talk to other developers - when you say Location everyone knows what it means.
>
> Second thing is that VO can validate values passed and forbid to construct such object with incorrect data.
>
> Third benefit is fact that you can rely on type - you know that if such VO was passed as an argument it will be always in valid state and you don't need to worry about that.
>
> Also VO can contain some specialised methods that only make sense in context of this value and can be attached to this object (no need to create weird Util classes).

This package originated from a client project that handled email addresses for their users, but needed to store the local-part and domain in separate fields to the full address.
  
## What?

This package contains a value object class that represents an email address.

Note that this is a dumb value object class. It performs no validation of email addresses. Use https://github.com/egulias/EmailValidator or similar to perform validation.

## How?

### Install

Add a dependency of `gamajo/email-address` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project.

```sh
composer require gamajo/email-address
```

Here is a minimal example of a `composer.json` file that just defines a dependency:

    {
        "require": {
            "gamajo/email-address": "0.1.*"
        }
    }

### Usage Examples

#### Creating an EmailAddress object and accessing its parts

```php
use Gamajo\EmailAddress\EmailAddress;

// Create EmailAddress object
$emailAddress = new EmailAddress('me@example.com');

// Access the EmailAddress object's local-part and domain
echo $emailAddress->getLocalPart() . PHP_EOL;
echo $emailAddress->getDomain() . PHP_EOL;
echo $emailAddress . PHP_EOL;
```

The code above produces the output shown below:

    me
    example.com
    me@example.com

## Changes

See the [change log](CHANGELOG.md).

## Contributing

See the [contributing document](.github/CONTRIBUTING.md).

## Support

See the [support document](.github/SUPPORT.md).

## Licensing

The code in this project is licensed under [MIT license](LICENSE).

## Credits

Built by [Gary Jones](https://twitter.com/GaryJ).  
Copyright 2015 [Gamajo](http://gamajo.com/).
