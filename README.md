# EmailAddress

[Value Object](http://martinfowler.com/bliki/ValueObject.html) that represents an email address.

Originating from a client project that handled email addresses for their users, but needed to store local-part and domain in separate fields to full address.

Note that this is a dumb value object class. It performs no validation of email addresses. Use https://github.com/egulias/EmailValidator or similar to perform validation.

## Install

Simply add a dependency on `gamajo/email-address` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project.

Here is a minimal example of a `composer.json` file that just defines a dependency:

    {
        "require": {
            "gamajo/email-address": "0.1.*"
        }
    }

## Usage Examples

### Creating an EmailAddress object and accessing its parts

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
